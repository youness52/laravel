<?php

namespace App\Http\Controllers\Backend\Table;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
                $name = $request->input('id');
                $data = [
                    'tables'=>Table::where('name','like','%'.$name.'%')->orWhere('capacity','like','%'.$name.'%')->paginate(10)
                ];
                return  view('pages.tables.index',compact('data'));

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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            Table::create([
                'name'  =>  $request->name,
                'capacity' =>  $request->capacity,
            ]);
            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message'] = 'Table a été ajoutée avec succès! ...';
            DB::commit();

            return response()->json($response, 200);

        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']  = 'warning';
            $response['title']  = 'Attention';
            $response['message'] = 'Table Ne peux pas Ajouter  ! ...';
            $response['error'] = $e->getMessage();
            return response()->json($response, 501);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Circuit  $circuit
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Circuit  $circuit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            DB::beginTransaction();
            $Table = Table::findOrfail($id);
            DB::commit();
            return response()->json($Table, 200);
            
        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Table n\'existe pas ! ...';
            $response['error']      = $e->getMessage();
            return response()->json($response, 501);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Circuit  $circuit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $Table = Table::findOrfail($id);
            $Table->update([
                'name'  =>  $request->name,
                'capacity' =>  $request->capacity,
            ]);
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Table a été Modifer avec succès! ...';
            DB::commit();
            return response()->json($response, 200);

        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Table Ne peux pas Modifer  ! ...';
            $response['error']      = $e->getMessage();
            return response()->json($response, 501);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Circuit  $circuit
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try{
            DB::beginTransaction();
            $Table = Table::findOrfail($id);
            $Table->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Table a été Suppression avec succès! ...';
            DB::commit();
            return redirect()->route('table.index')->with('notification',$response);
        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Table Ne peux pas Supprimer  ! ...';
            $response['error']      = $e->getMessage();
            return redirect()->route('table.index')->with('notificationError',$response);

        }
    }
}
