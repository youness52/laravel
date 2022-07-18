<?php

namespace App\Http\Controllers\Backend\Revenu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RevenuController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //     $data = [
    //         'revenu'=>Order::with('user')->where('user_id',1)->sum('amount') 
    // ]; 

    $from=$request->input('startdate');
    $to=$request->input('enddate');
    if (isset($from) && isset($to)) {
      $data = Order::with('user')->groupBy('user_id')->selectRaw('sum(amount) as sum, user_id')->whereBetween('created_at',[$from, $to])->paginate(10);  
    }else
    $data = Order::with('user')->groupBy('user_id')->selectRaw('sum(amount) as sum, user_id')->paginate(10);  
        return view('pages.revenu.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }



    public function search(Request $request){
        return $request;
    }
}
