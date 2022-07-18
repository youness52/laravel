<?php

namespace App\Http\Controllers\Backend\Employe;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
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
            'employees'=>Employe::where('CIN','like','%'.$name.'%')->paginate(10),
        ];
        return view('pages.hr.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            //  'Employees'=>Employe::paginate(10),
        ];
        return view('pages.hr.add',compact('data'));
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
            $image='';
            $card='';
            if($request->image){
                $request->validate([
                    'image' => 'mimes:jpg,png,jpeg',
                ]);
                $image = time() . '.' . $request->image->extension();
                $request->image->move(public_path("images"), $image);
               }
            if($request->card){
                $request->validate([
                    'card' => 'mimes:jpg,png,jpeg',
                ]);
                $card = time() . 'c.' . $request->card->extension();
                $request->card->move(public_path("images"), $card);
            }
            Employe::create([
                'CIN' => $request->CIN,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'date_naissance' => $request->date_naissance,
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'image' => $image,
                'card' => $card,
                'fonction' => $request->fonction,
                'tel' => $request->tel,
                'email' => $request->email,
                'cnss' => $request->cnss,
                'situation_familiale' => $request->situation_familiale,
            ]);
            $notification['status']='success';
            $notification['title']='success';
            $notification['message']='Added successfully !';
            DB::commit();
            return redirect()->route('employees.index')->with('notification',$notification);
        }
        catch (Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $notification['status']='warning';
            $notification['title']='attention';
            $notification['message']='the employe is not added ';
            return redirect()->route('employees.index')->with('notificationError',$notification);
        }
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
    public function edit($id)
    {
        //
          $data = [
             'employe'=>Employe::findorfail($id),
        ];
        return view('pages.hr.edit',compact('data'));
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
        DB::beginTransaction();
        $employe=Employe::findorfail($id);
        $image='';
        $card='';
        if($request->image){
            $request->validate([
                'image' => 'mimes:jpg,png,jpeg',
            ]);
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path("images"), $image);
        }
        if($request->card){
            $request->validate([
                'card' => 'mimes:jpg,png,jpeg',
            ]);
            $card = time() . 'c.' . $request->card->extension();
            $request->card->move(public_path("images"), $card);
        }
        $employe->update([
            'CIN' => $request->CIN,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'image' => $image,
            'card' => $card,
            'fonction' => $request->fonction,
            'tel' => $request->tel,
            'email' => $request->email,
            'cnss' => $request->cnss,
            'situation_familiale' => $request->situation_familiale,
        ]);

        DB::commit();
        $response['status']     = 'success';
        $response['title']      = 'Succès';
        $response['message']    = 'Employe a été Modifer avec succès! ...';
        return redirect()->route('employees.index')->with('notification',$response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try{
            DB::beginTransaction();
            $employe = Employe::findOrfail($id);
            $employe->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Employe a été Suppression avec succès! ...';
            DB::commit();
            return redirect()->route('employees.index')->with('notification',$response);
        }catch (\Exception $e){
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Employe Ne peux pas Suppression  ! ...';
            return redirect()->route('employees.index')->with('notificationError',$response);
        }
    }
}