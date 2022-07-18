<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {  
        $from=$request->input('startdate');
        $to=$request->input('enddate');
        if(isset($to)){
            $data = [
            'revenuTotal'=>Order::with('user')->whereBetween('created_at',[$from, $to])->groupBy('user_id')->selectRaw('sum(amount) as sum, user_id')->orderBy('sum', 'DESC')->paginate(10),
            'revenusum'=>Order::whereBetween('created_at',[$from, $to])->sum('amount'),
            'clientnbr'=>Account::where('account_types_id',1)->whereBetween('created_at',[$from, $to])->count(),
            'ordersnbr'=>Order::whereBetween('created_at',[$from, $to])->count(),
            'orders'=>Order::with("table",'items','propertie','variation','user:id,name')->where('status','pending')->paginate(10) 
        ]; 
        }else{
            $data = [
                'revenuTotal'=>Order::with('user')->whereMonth('created_at', Carbon::now()->month)->groupBy('user_id')->selectRaw('sum(amount) as sum, user_id')->orderBy('sum', 'DESC')->paginate(10),
                'revenusum'=>Order::whereMonth('created_at', Carbon::now()->month)->sum('amount'),
                'clientnbr'=>Account::where('account_types_id',1)->count(),
                'ordersnbr'=>Order::count(),
                'orders'=>Order::with("table",'items','propertie','variation','user:id,name')->where('status','pending')->paginate(10) 
            ];  
        }
                  
        
        //return  view('pages.orders.index',compact('data'));
        return view('home',compact('data'));
        //return $data;
    }

    public function getData(Request $request)
    {
        return $request;
    }
}
