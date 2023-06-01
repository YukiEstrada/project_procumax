<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\Vendor;
use App\Models\Cart;
use App\Models\PoApproval;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPoController extends Controller
{
    public function index(Request $request)
    {

        $orders = new PurchaseOrder;

        $orders = $orders->paginate(10);

        $sequence = $orders->firstItem();


        return view('po.list', compact('orders', 'sequence'));
    }

    public function product(Request $request)
    {

        $products = new Product;


        $products = $products->withTrashed()->paginate(10);
        $sequence = $products->firstItem();


        return view('po.product', compact('products', 'sequence'));
    }

    public function productcreate(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'uom' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:1000"|max:2147483647',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $save = new Product();

        $save->name = $request->input('name');
        $save->uom = $request->input('uom');
        $save->unit_price = $request->input('unit_price');

        $save->save();

        Alert::success('Success', 'Product was sucessfully made!');
        return redirect()->route('Po_product_show');            
    }

    public function productUpdate($id)
    {
        // mengambil data menu berdasarkan id yang dipilih 
        $products = Product::find($id);
        // passing data menu yang didapat ke view edit.blade.php
        return view('po.productUpdate', compact('products'));
    }

    public function save(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'uom' => 'required|string|max:255',
            'unit_price' => 'required|numeric|min:1000|max:2147483647',
        ]);

        $products = Product::find($id);


        $products->name = $request->input('name');
        $products->uom = $request->input('uom');
        $products->unit_price = $request->input('unit_price');

        $products->save();

        Alert::success('Success', 'Product was sucessfully updated!');
        return redirect()->route('Po_product_show');
    }

    public function productDelete($id)
    {
        $products = Product::find($id);

        $products->delete();

        Alert::success('Success', 'Product deleted successfully!');

        return redirect()->route('Po_product_show');
    }

    public function productRestore($id)
    {
        $Product = Product::withTrashed()->find($id);

        $Product->restore();

        Alert::success('Success', 'Product restored successfully!');
        return redirect()->route('Po_product_show');
    }

    public function addItemToCart(Request $request)
    {
        $data = $request->all();

        $validation = Validator::make($data, [
            'product_id' => 'required',
            'quantity' => 'required|numeric|min:1|max:99999',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors()->first());
        }

        $item_exists = Cart::where('product_id', $request->product_id)->first();
        if ($item_exists) {
            $cart_item = $item_exists;
            $cart_item->quantity += $request->quantity;
            $cart_item->save();
        } else {
            $cart_item = new Cart();
            $cart_item->product_id = $request->product_id;
            $cart_item->quantity = $request->quantity;
            $cart_item->save();
        }
        Alert::success('Success', 'Product has been added to cart!');
        return redirect()->back();
    }

    public function showCart(Request $request)
    {
        $carts = Cart::with('product')->get();
        $vendors = Vendor::select('id', 'name')->get();
        $next_acc = User::select('users.id', 'users.name')
            ->join('user_positions', 'users.id', '=', 'user_positions.user_id')
            ->join('positions', 'user_positions.position_id', '=', 'positions.id')
            ->where('users.role', 'Admin Approval')
            ->where('positions.id', 2)
            ->get();


        $total_price = 0;
        foreach ($carts as $cart) {
            $total_price += $cart->quantity * $cart->product->unit_price;
        }

        return view('po.cart', compact('carts', 'total_price', 'vendors', 'next_acc'));
    }

    public function deleteMenuCart(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        Alert::success('Success', 'Product has been deleted from cart!');
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        $data = $request->all();
        $validation = Validator::make($data, [
            'id' => 'required|array',
            'quantity' => 'required|array|max:99999',
            'mrv' => 'required|numeric|min:1',
            'vendor' => 'required|numeric|min:1',
            'total_price' => 'required|numeric|min:1|max:2147483647',
            'verifier_id' => 'required|numeric|min:1',


        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation->errors()->first());
        }



        $submitted_cart_id = $request->id;
        $submitted_quantity = $request->quantity;
        foreach ($submitted_cart_id as $index => $id) {
            $cart = Cart::find($id);
            $cart->quantity = $submitted_quantity[$index];
            $cart->save();
        }

        $carts = Cart::get();

        DB::beginTransaction();

        // Create Purchase Order
        $date = date('Ymd');
        $generate_id = $date;

        $order_sequence = PurchaseOrder::whereDate('Created_At', date('Y-m-d'))->count() + 1;
        $generate_id .= '-' . $order_sequence;

        $order = new PurchaseOrder();
        $order->mrv_id = $request->input('mrv');
        $order->vendor_id = $request->input('vendor');
        $order->total_price = $request->input('total_price');
        $order->ref_no = $generate_id;
        $order->status = PurchaseOrder::STATUS_PENDING;

        $order->requester_id = $request->session()->get('user_id');
        $order->save();

        // Create PO Detail
        foreach ($carts as $cart) {
            $order->products()->attach(
                $cart->product_id,
                [
                    'unit_price' => $cart->product->unit_price,
                    'quantity' => $cart->quantity,
                ]
            );
        }
        $delete = Cart::truncate();

        // Create PO Approval
        $approval = new PoApproval();
        $approval->po_id = $order->id;
        $approval->verifier_id = $request->verifier_id;
        $approval->status = PoApproval::STATUS_PENDING;
        $approval->position_id = Position::where('level', 1)->first()->id;
        $approval->save();

        DB::commit();

        Alert::success('Success', 'Order has been successfully created!');
        return redirect()->route('Po_form_show');
    }

    public function Order($id)
    {
        $inv = PurchaseOrder::find($id);


        $total_price = 0;
        foreach($inv->products as $purchased_item) {
            $total_price += $purchased_item->pivot->price * $purchased_item->pivot->quantity;
        }

        

        return view('po.printorder',compact('inv'));
    }

    

    public function vendor(Request $request)
    {

        $vendors = new Vendor();


        $vendors = $vendors->withTrashed()->paginate(10);
        $sequence = $vendors->firstItem();


        return view('po.vendor', compact('vendors', 'sequence'));
    }

    public function vendorCreate(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }

        $save = new Vendor();

        $save->name = $request->input('name');
        $save->address = $request->input('address');

        $save->save();

        Alert::success('Success', 'Vendor was sucessfully made!');
        return redirect()->route('Po_vendor_show');    
    }

    public function vendorUpdate($id)
    {
        // mengambil data menu berdasarkan id yang dipilih 
        $vendors = Vendor::find($id);
        // passing data menu yang didapat ke view edit.blade.php
        return view('po.vendorUpdate', compact('vendors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $vendors = Vendor::find($id);


        $vendors->name = $request->input('name');
        $vendors->address = $request->input('address');


        $vendors->save();

        Alert::success('Success', 'Vendor updated successfully!');
        return redirect()->route('Po_vendor_show');
    }

    public function vendorDelete($id)
    {
        $vendors = Vendor::find($id);

        $vendors->delete();

        Alert::success('Success', 'Vendor deleted successfully!');
        return redirect()->route('Po_vendor_show');
    }

    public function vendorRestore($id)
    {
        $vendors = Vendor::withTrashed()->find($id);

        $vendors->restore();

        Alert::success('Success', 'Vendor restored successfully!');
        return redirect()->route('Po_vendor_show');
    }
}
