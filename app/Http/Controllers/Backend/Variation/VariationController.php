<?php

namespace App\Http\Controllers\Backend\Variation;

use App\Http\Controllers\Controller;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request-> input('id');
        $data = [
            'variations'=> Variation::where('name','like','%'.$name.'%')->paginate(10),
        ];
        return view('pages.items.variations.index', compact('data'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            DB::beginTransaction();
            Variation::create([
                'name' => $request->name,
            ]);
            DB::commit();
            $response['status']     =   'success';
            $response['title']      =    'Succès';
            $response['message']    =    'Variation a été Ajouetr avec succès! ...';
            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     =      'warning';
            $response['title']      =      'Attention';
            $response['message']    =      'Variation Ne peux pas Ajouter ! ...\n';
            $response['error']    =       $e->getMessage();
            return response()->json($response, 501);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Variation $variation
     * @return \Illuminate\Http\Response
     */
    public function show(Variation $variation)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Variation $variation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try {
            DB::beginTransaction();
            $variation = Variation::findorfail($id);
            DB::commit();
            return response()->json($variation, 200);
        } catch (Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status'] = 'warning';
            $response['title'] = 'Attention';
            $response['message'] = 'Variation n\'existe pas ! ...';
            return response()->json($response, 501);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Variation $variation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $variation = Variation::findorfail($id);
            $variation->update([
                'name' => $request->name,
            ]);
            DB::commit();
            $response['status'] = 'success';
            $response['title'] = 'Succès';
            $response['message'] = 'Variation was updated successfully! ...';
            return response()->json($response, 200);
        } catch (Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status'] = 'warning';
            $response['title'] = 'Attention';
            $response['message'] = 'Variation n\'existe pas ! ...';
            return response()->json($response, 501);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Variation $variation
     * @return \Illuminate\Http\Response
     */
    public function destroy($îd)
    {
        try {
            DB::beginTransaction();
            $variation = Variation::findorfail($îd);
            $variation->delete();
            DB::commit();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Propertie a été Suppression avec succès! ...';
            return redirect()->route('variation.index')->with('notification',$response);

        } catch (Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Variation Ne peux pas Suppression  ! ...';
            return redirect()->route('variation.index')->with('notificationError',$response);

        }
    }
}
