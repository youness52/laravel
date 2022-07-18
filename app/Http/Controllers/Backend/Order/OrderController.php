<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $name =$request->input('id');
        $status=$request->input('status');
         if(!isset($status)){
           $data = [
                'orders'=>Order::with("table",'items','propertie','variation','user:id,name')->where('id','like','%'.$name.'%')->paginate(10) 
        ]; 
         }else{
            
            if($status=='any'){
                $data = [
                     'orders'=>Order::with("table",'items','propertie','variation','user:id,name')->where('id','like','%'.$name.'%')->paginate(10) 
             ]; 
              }else{
                 
                 $data = [
                     'orders'=>Order::with("table",'items','propertie','variation','user:id,name')->where('id','like','%'.$name.'%')->where('status',$status)->paginate(10) 
             ]; 
              }
        
         }
        
        return  view('pages.orders.index',compact('data'));

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
        try {
            DB::beginTransaction();
            $order = Order::create([
                'user_id' => $request->user_id,
                'table_id' => $request->table_id,
                'comment' => $request->comment,
                'amount' => $request->amount,
            ]);
            if (isset($request->items)){
                $ItemsArray=null;
                $amount = 0;
                foreach ($request->items as $item){
                    //
                    $amount+= $item['price']*$item['quantity'];
                    //
                    $ItemsArray[]=[
                        "item_id"        => $item['item_id'],
                     //   "variation_id"   => $item['variation_id'],
                        "propertie_id"   => $item['propertie_id'],
                        "status"         => 'pending',
                        "quantity"       => $item['quantity'],
                        "price"          => $item['price'],
                      //  "comment"        =>$item['comment'],
                        'created_at'     => Carbon::now(),
                    ];
                }


                $order->items()->sync($ItemsArray);
                $order->update(["amount"=>$amount]);

            }
            $response['status'] = 'success';
            $response['title'] = 'Succès';
            $response['message'] = 'commande a été ajouté avec succès';
            DB::commit();
            return response()->json($response, 200);
        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']  = 'warning';
            $response['title']  = 'Attention';
            $response['message'] = 'commande n\'a pas pu être ajouter ';
            return response()->json($e->getMessage(), 501);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $order=Order::with(['items','items.propertie','items.variation','user','table'])->findOrFail($id);
            return response()->json($order,200);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'commande n\'existe pas ! ...';
            return response()->json($response, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function edit( $id)
    {
        try{
            DB::beginTransaction();
            $order=Order::with('items','user')->findOrFail($id);
            DB::commit();
            return response()->json($order,200);
        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'commande n\'existe pas ! ...';
            return response()->json($response, 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try{
            DB::beginTransaction();
            $order = order::findOrfail($id);
            $order->update([
                'user_id' => $request->user_id,
                'table_id' => $request->table_id,
                'comment' => $request->comment,
                'amount' => $request->amount,
            ]);
            if (isset($request->items)){
                $ItemsArray=null;
                $amount = 0;
                foreach ($request->items as $item){
                    //
                    $amount+= $item['price']*$item['quantity'];
                    //
                    $ItemsArray[]=[
                        "item_id"        => $item['item_id'],
                        "order_id"       => $order->id,
                        "status"         => $item['status'],
                        "quantity"       => $item['quantity'],
                        "price"          => $item['price'],
                        "comment"        => $item['comment'],
                        'created_at'     => Carbon::now(),
                    ];
                }

                Order::update($ItemsArray);
                $order->update(["amount"=>$amount]);

            }
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'commande a été Modifer avec succès! ...';
            DB::commit();
            return response()->json($response, 200);

        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Table Ne peux pas Modifer  ! ...';
            $response['error']    = $e->getMessage();
            return  redirect()->route('tables.index')->with('notification',$response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $Order = Order::findOrfail($id);
            $Order->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Order a été Suppression avec succès! ...';
            DB::commit();
            return  redirect()->route('orders.index')->with('notification',$response);


        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Order Ne peux pas Suppression  ! ...';
            return  redirect()->route('orders.index')->with('notificationError',$response);
        }
    }

    public function status($id,$status){
        try{
            DB::beginTransaction();
            $order = order::findOrfail($id);
            $order->update([
                'status' => $status,
            ]);

            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'status a été Modifer avec succès! ...';
            DB::commit();
            return response()->json($response, 200);

        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'status Ne peux pas Modifer  ! ...';
            return response()->json($response, 501);
        }
    }
}
