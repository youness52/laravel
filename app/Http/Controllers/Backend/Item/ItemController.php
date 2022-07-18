<?php

namespace App\Http\Controllers\Backend\Item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Propertie;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
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
            'items'=>Item::where('name','like','%'.$name.'%')->paginate(10),
            'itemCategory'  => ItemCategory::all(),
            'properties'    => Propertie::all(),
            'variations'    => Variation::all(),
        ];
        return  view('pages.items.items.index',compact('data'));

    }

    /**
     * Display a listing of the resource Of DATATABLE.
     *
     */
    public function getcategorie($category_id)
    {
        //
        return  view('pages.items.index',['Categories'=>ItemCategory::get(),'Items'=>Item::with('category')->where('category_id',$category_id)->get()]);

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
        try{

            DB::beginTransaction();

            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $item =Item::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'image'=>$imageName,
                'status'=>$request->status,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'item_category_id'=>$request->category_id
            ]);

            if (isset($request->propertie)){
                $item->propertie()->attach($request->propertie);
            }

            if (isset($request->variation)){
                $variation=[];
                $item->price=0;
                foreach ($request->variation as $key => $value) {
                    $variation[]= [
                        'variation_id' => $key,
                        'price' => $value,
                    ];
                }

                $item->variation()->attach($variation);
            }

            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message']    = 'Plate a été Ajouter avec succès! ...';
            DB::commit();
            return response()->json($response,200);
        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']  = 'warning';
            $response['title']  = 'Attention';
            $response['message'] = 'Ne peux pas Ajouter  ! ...\n';
            return response()->json($response,501);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Circuit  $circuit
     * @return \Illuminate\Http\Response
     */
    public function show(Item $Item)
    {
        //
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
            $Item = Item::with(['propertie','variation'])->findOrfail($id);
            DB::commit();
            return response()->json($Item, 200);

        }catch (\Exception $e){
            DB::rollBack();
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Circuit n\'existe pas ! ...';
            return response()->json($response, 200);
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
        try {
            $imageName="";
            if (isset($request->image))
            {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);

            }




            $Item = Item::findOrfail($id);
            $Item->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'image'=>$imageName,
                'status'=>$request->status,
                'price'=>($request->variante=='on')?'':$request->price,
                'quantity'=>$request->quantity,
                'item_category_id'=>$request->category_id
            ]);

            if (isset($request->propertie)){
                $Item->propertie()->attach($request->propertie);
            }

            if (isset($request->variation)){
                $variation=[];
                $Item->price=0;
                foreach ($request->variation as $key => $value) {
                    $variation[]= [
                        'variation_id' => $key,
                        'price' => $value,
                    ];
                }
                $Item->variation()->attach($variation);
            }

            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message']    = 'Plate a été Modifer avec succès! ...';
            DB::commit();
            return response()->json($response,200);

        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']  = 'warning';
            $response['title']  = 'Attention';
            $response['message'] = 'Ne peux pas Modifer  ! ...\n';
            $response['error']    = $e->getMessage();

            return response()->json($response,501);
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
            $Item = Item::findOrfail($id);
            $Item->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'items a été Suppression avec succès! ...';
            DB::commit();
            return  redirect()->route('item.index')->with('notification',$response);


        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'items Ne peux pas Suppression  ! ...';
            return  redirect()->route('item.index')->with('notificationError',$response);
        }
    }
}
