<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $name =$request->input('id');
        $data = [
            'users'=>User::where('name','like','%'.$name.'%')->paginate(10),
        ];
        return view('pages.user.index',compact('data'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $from = $request->input('startdate');
        $to = $request->input('enddate');
        $status = $request->input('status');
        if (!isset($status)) {
            if (!isset($from)) {
                $data = [
                    'orders' => Order::with("table", 'items', 'propertie', 'variation', 'user:id,name')->where('user_id', $id)->paginate(10)
                ];
            } else {
                $data = [
                    'orders' => Order::with("table", 'items', 'propertie', 'variation', 'user:id,name')->where('user_id', $id)->whereBetween('created_at', [$from, $to])->paginate(10)
                ];
            }
        } else {

            if ($status == 'any') {
                $data = [
                    'orders' => Order::with("table", 'items', 'propertie', 'variation', 'user:id,name')->where('user_id', $id)->paginate(10)
                ];
            } else {

                $data = [
                    'orders' => Order::with("table", 'items', 'propertie', 'variation', 'user:id,name')->where('user_id', $id)->where('status', $status)->paginate(10)
                ];
            }
        }

        return view('pages.user.show', compact('data'));
        // return $data;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $Category = User::findOrfail($id);
            $Category->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'L utilisateur a été Suppression avec succès! ...';
            DB::commit();
            return  redirect()->route('user.index')->with('notification', $response);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'L utilisateur Ne peux pas Suppression  ! ...';
            return  redirect()->route('user.index')->with('notificationError', $response);
        }
    }

    public function search(Request $request)
    {
        return $request;
    }
}
