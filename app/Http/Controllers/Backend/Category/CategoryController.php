<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'itemCategory'=> ItemCategory::all(),
        ];
        return  view('pages.categories.index',compact('data'));
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
            $imageName=null;
            if(isset($request->image)) {

                $imageName = time() . '.' . $request->image->extension();

                $request->image->move(public_path('images'), $imageName);
            }
            ItemCategory::create([
                'name'  =>  $request->name,
                'image' =>  $imageName,
            ]);

            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message']    = 'Catégorie a été Ajouter avec succès! ...';

            DB::commit();
            return response()->json($response,200);

        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']  = 'warning';
            $response['title']  = 'Attention';
            $response['message'] = 'Catégorie pas pu être ajouter! ... ';
            return response()->json($response,501);
        }
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ItemCategory $itemCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            DB::beginTransaction();
            $Category = ItemCategory::findOrfail($id);
            DB::commit();
            return response()->json($Category, 200);
        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Catégorie N pas existe ! ';
            return response()->json($response, 501);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $Category = ItemCategory::findOrfail($id);
            if ($request->image){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $Category->update([
                    'name'  =>  $request->name,
                    'image' =>  $imageName,
                ]);
                DB::commit();
                $response['status']  = 'success';
                $response['title']  = 'Succès';
                $response['message']    = 'Catégorie a été Ajouter avec succès! ...';

                DB::commit();
                return response()->json($response,200);
            }
            else{
                $Category = ItemCategory::findOrfail($id);
                $Category->update([
                    'name'  =>  $request->name,
                ]);
                DB::commit();
            }
            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message']    = 'Catégorie a été Modifer avec succès! ...';

            DB::commit();
            return response()->json($response,200);


        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Catégorie \'a pas pu être modifier! ...' ;
            $response['error']    = $e->getMessage();
            return response()->json($response, 501);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $Category = ItemCategory::findOrfail($id);
            $Category->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Le Catégorie a été Suppression avec succès! ...';
            DB::commit();
            return  redirect()->route('category.index')->with('notification',$response);


        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Catégorie Ne peux pas Suppression  ! ...';
            return  redirect()->route('category.index')->with('notificationError',$response);
        }
    }
}