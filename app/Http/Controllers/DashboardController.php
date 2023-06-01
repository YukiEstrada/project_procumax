<?php

namespace App\Http\Controllers;

use App\Charts\ProVenChart;
use App\Charts\DeptChart;
use App\Charts\UserChart;
use App\Charts\ActiveChart;
use App\Charts\ProductChart;
use App\Charts\StatusFormChart;

use App\Charts\FormChart;
use App\Models\PoApproval;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\PurchaseOrder;
use App\Models\User;


use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $chart = new UserChart;

        $admin_root = User::where('role', 'Admin Root')->count();

        $admin_po = User::where('role', 'Admin Po')->count();

        $admin_approval = User::where('role', 'Admin Approval')->count();
      

        
        $colors = ['#4169e1', '#ed7625' , '#FF1F6A'];


        $chart->labels(['Admin Root','Admin Po', 'Admin Approval']);
        $chart->dataset('My dataset', 'bar', [$admin_root,$admin_po, $admin_approval])->backgroundColor($colors);
        
        $active = User::where('is_active', '1')->count();

        $inactive = User::where('is_active', '0')->count();
    


        
        $piechart = new DeptChart;

        $gen = User::where('dept_id', '1')->count();

        $purchase = User::where('dept_id', '2')->count();

        $finance = User::where('dept_id', '3')->count();



        $colors = ['#d93e28', '#36b9cc', '#309365'];


        $piechart->labels(['General Users','Purchase Users', 'Finance Users']);
        $piechart->dataset('My dataset', 'pie', [$gen,$purchase, $finance])->backgroundColor($colors);

        
        
        return view ('purchase.users.dashboard', compact('chart','piechart','active' ,'inactive'));

    }

    public function indexacc(){

        $chart = new FormChart;
        $user = session('user');


        $this_month = PoApproval::where('verifier_id', $user->id)
            ->whereMonth('created_at', today()->month)->count();
        $last_month = PoApproval::where('verifier_id', $user->id)
            ->whereMonth('created_at', today()->subMonth(1)->month)->count();
        $two_months_ago = PoApproval::where('verifier_id', $user->id)
            ->whereMonth('created_at', today()->subMonth(2)->month)->count();
        $three_months_ago = PoApproval::where('verifier_id', $user->id)
            ->whereMonth('created_at', today()->subMonth(3)->month)->count();
        
        $colors = ['#3355FF','#ff8000' , '#00f00' , '#cc00cc' ];

        $chart->labels(['Three Months Ago','Two Months Ago', 'One Month Ago', 'This Month']);
        $chart->dataset('My dataset', 'bar', [$three_months_ago,$two_months_ago, $last_month, $this_month])->backgroundColor($colors);
        
      
        $piechart = new StatusFormChart;

        $pending = PoApproval::where('verifier_id', $user->id)
            ->where('status', 'PENDING')->count();
        $rejected = PoApproval::where('verifier_id', $user->id)
            ->where('status', 'REJECTED')->count();
        $acc = PoApproval::where('verifier_id', $user->id)
            ->where('status', 'APPROVED')->count();


        $colors = ['#d93e28', '#36b9cc', '#4169e1'];


        $piechart->labels(['Pending', 'Rejected','Approved']);
        $piechart->dataset('My dataset', 'pie', [$pending,$rejected,$acc])->backgroundColor($colors);



        return view ('approval.dashboard', compact('chart','piechart'));


    }

    public function indexpo(){

        $chart = new FormChart;

        $this_month = PurchaseOrder::whereMonth('created_at', today()->month)->count();
        $last_month = PurchaseOrder::whereMonth('created_at', today()->subMonth(1)->month)->count();
        $two_months_ago = PurchaseOrder::whereMonth('created_at', today()->subMonth(2)->month)->count();
        $three_months_ago = PurchaseOrder::whereMonth('created_at', today()->subMonth(3)->month)->count();
      

        
        $colors = ['#3355FF','#ff8000' , '#00f00' , '#cc00cc' ];

        $chart->labels(['Three Months Ago','Two Months Ago', 'One Month Ago', 'This Month']);
        $chart->dataset('My dataset', 'bar', [$three_months_ago,$two_months_ago, $last_month, $this_month])->backgroundColor($colors);
        
        $vendors = Vendor::count();
        $products = Product::count();
            
        $piechart = new StatusFormChart;

        $pending = PurchaseOrder::where('status', 'PENDING')->count();
        $rejected = PurchaseOrder::where('status', 'REJECTED')->count();
        $acc = PurchaseOrder::where('status', 'COMPLETED')->count();


        $colors = ['#d93e28', '#36b9cc', '#4169e1'];


        $piechart->labels(['Pending', 'Rejected','Completed']);
        $piechart->dataset('My dataset', 'pie', [$pending,$rejected,$acc])->backgroundColor($colors);



        return view ('po.dashboard', compact('chart','piechart','vendors','products'));


    }
}
