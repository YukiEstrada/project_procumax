<?php

namespace App\Http\Controllers;

use App\Models\PoApproval;
use App\Models\Position;
use App\Models\PurchaseOrder;
use App\Models\Product;

use App\Models\User;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class AdminAccController extends Controller
{

    public function index(Request $request)
    {
        $user = session('user');

        //$level = $user->positions()->orderBy('level')->first()->id;
        $query = PoApproval::with('order')->where('verifier_id', $user->id)
            ->orderBy('position_id');

        $param_status = $request->status ?? ['PENDING'];
        if ($param_status != null) {
            $query->whereIn('status', $param_status);
        }

        $po_approvals = $query->paginate(10);

        return view('approval.listApp', compact('po_approvals', 'param_status'));
    }

    public function detailapproval($id)
    {
        $po_approval = PoApproval::find($id);
        $inv = $po_approval->order;

        $total_price = 0;
        foreach ($inv->products as $purchased_item) {
            $total_price += $purchased_item->pivot->price * $purchased_item->pivot->quantity;
        }

        $rejected = PoApproval::where('status','REJECTED')
        ->get();

        $approved = PoApproval::where('status','APPROVED')
        ->get();

        $position = $po_approval->position;
        $next_level = $position->next_level;

        $next_verifiers = null;
        if ($next_level) {
            $next_verifiers = User::whereHas('positions', function ($query) use ($next_level) {
                $query->where('positions.id', $next_level->id);
                $query->where('users.is_active', 1 );
            })->get();
        }


        return view('approval.detailApp', compact('po_approval','inv', 'next_verifiers' , 'rejected','approved'));
    }



    public function submit(Request $request, $id)
    {
        $max_level = Position::max('level');
        $po_approval = PoApproval::find($id);
        $position = $po_approval->position;
        if($max_level == $position->level){
            $request['next_verifier_id'] = null;
        }else{

           
            $rules = [
                'next_verifier_id' => 'required|numeric|min:0',
            ];
    
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return redirect()->back()
                ->withInput()
                ->withErrors($validator);
            }
    
        }
        

        // Approve in another controller
        $approval = PoApproval::find($id);
        $approval->approve();

        // Check if still need approval from next level
        $level = $approval->position->level;
        $next_level = Position::where('level', '>', $level)->first();
        if ($next_level) {
            if (!$request->next_verifier_id) {
                Alert::error('Failed', 'Next verifier id required for next level!');
                return redirect()->back();
            } else {
                $approval->createNextLevel($request->next_verifier_id);
            }

            Alert::success('Success', 'Purchase Order has been successfully approved!');
            return redirect()->route('App_form_show');
        } else {
            //Deem PO as completed 
            $order = $approval->order;
            $order->status = PurchaseOrder::STATUS_APPROVED;
            $order->save();

            Alert::success('Success', 'Purchase Order has been successfully completed!');
            return redirect()->route('App_form_show');

        }
    }

    public function reject(Request $request, $id)
    {
        // Approve in another controller
        $approval = PoApproval::find($id);
        $approval->reject();
    
            $order = $approval->order;
            $order->status = PurchaseOrder::STATUS_REJECTED;
            $order->save();

            return redirect()->route('App_form_show')
            ->with('success','Purchase Order has been successfully rejected');

        
    }
}
