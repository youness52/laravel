<?php

namespace App\Http\Controllers\Backend\Propertie;

use App\Http\Controllers\Controller;
use App\Models\Propertie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $name = $request->input('id');
        $data = [
            'propertie'=>Propertie::where('name','like','%'.$name.'%')->paginate(10),
        ];
        return view('pages.items.properties.index',compact('data'));
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
        try {
            DB::beginTransaction();
            Propertie::create([
                'name'=>$request->name,
            ]);
            DB::commit();
            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message']    = 'Propertie a été Ajouter avec succès! ...';
            return response()->json($response,200);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            DB::rollBack();
            $response['status']='warning';
            $response['title']='attention';
            $response['message']    ='Ne peux pas Ajouter le Propertie ! ...\n';
            $response['error']=$e->getMessage();
            return response()->json($response,501);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Propertie  $propertie
     * @return \Illuminate\Http\Response
     */
    public function show(Propertie $propertie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Propertie  $propertie
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        //
        try {
            DB::beginTransaction();
            $propertie=Propertie::findorfail($id);
            DB::commit();
            return response()->json($propertie,200);
        }
        catch (\Exception $e){
            \Log::error($e->getMessage());
            DB::rollBack();
            $response['status']='warning';
            $response['title']='attention';
            $response['message']=' ! ...';
            return response()->json($response,501);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Propertie  $propertie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            //
            $propertie=Propertie::findorfail($id);
            $propertie->update([
                'name' => $request->name,
            ]);
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Propertie a été Modifer avec succès! ...';
            DB::commit();
            return response()->json($response,200);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            DB::rollBack();
            $response['status']='warning';
            $response['title']='attention';
            $response['message']    = 'Propertie Ne peux pas Modifer  ! ...';
            return response()->json($response,501);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Propertie  $propertie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        try{
            DB::beginTransaction();
            $propertie = Propertie::findOrfail($id);
            $propertie->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Propertie a été Suppression avec succès! ...';
            DB::commit();
            return redirect()->route('propertie.index')->with('notification',$response);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            DB::rollBack();
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Propertie Ne peux pas Suppression  ! ...';
            return redirect()->route('propertie.index')->with('notificationError',$response);

        }
    }
}
