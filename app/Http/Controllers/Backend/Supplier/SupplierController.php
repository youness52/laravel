<?php

namespace App\Http\Controllers\Backend\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\ActivityArea;
use App\Models\Country;
use App\Models\Currency;
use App\Models\PayementMethod;
use App\Models\PayementPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */

    public function index(Request $request)
    {
            $name = $request->input('id');
            $data['accounts'] =Account::where('name','like','%'.$name.'%')->where("account_types_id",2)->paginate(10);

            return View('pages.suppliers.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        //
        $data = [
            'activity_areas'    =>ActivityArea::all(),
            'currencies'        =>Currency::all(),
            'payment_periods'   =>PayementPeriod::all(),
            'payment_methods'   =>PayementMethod::all(),
            'countries'         =>Country::all(),
        ];
        return View('pages.suppliers.add',compact('data'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        
        try {
            DB::beginTransaction();
        Account::create([
            'name'                  =>mb_strtoupper($request->raison_sociale),
            'ref'                   =>mb_strtoupper($request->ref),
            'rc'                    =>$request->rc,
            'ice'                   =>$request->ice,
            'iftax'                 =>$request->iftax,
            'country_id'            =>$request->country_id,
            'country_id_delivery'   =>$request->country_id_delivery,
            'currency_id'           =>1,
            'city'                  =>$request->city,
            'city_delivery'         =>$request->city_delivery,
            'zipcode'               =>$request->zipcode,
            'zipcode_delivery'      =>$request->zipcode_delivery,
            'address'               =>$request->address,
            'address_delivery'      =>$request->address_delivery,
            'phone'                 =>$request->phone,
            'mobile'                =>$request->mobile,
            'fax'                   =>$request->fax,
            'email'                 =>$request->email,
            'website'               =>$request->website,
            'discount'              =>$request->discount,
            'activity_area_id'      =>$request->activity_area_id,
            'payement_method_id'    =>$request->payment_method_id,
            'payement_period_id'    =>$request->payement_period_id,
            'account_types_id'      =>2,
            'note'                  =>$request->note,
            'created_by'            =>auth()->id(),
        ]);
        DB::commit();
        $response['status']     =    'success';
        $response['title']      =    'Succès';
        $response['message']    =    ' Fournisseur a été Ajouetr avec succès! ...';
        return redirect()->route('supplier.index')->with('notification',$response);


        }catch (\Exception $e){
            \Log::error($e->getMessage());
            DB::rollBack();
            $response['status']     =      'warning';
            $response['title']      =      'Attention';
            $response['message']    =      'Ne peux pas Ajouter le Fournisseur ! ...';
            return redirect()->route('supplier.index')->with('notificationError',$response);
        }


    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit($id)
    {
        //
        try {
            $data =[
                'activity_areas'    =>ActivityArea::all(),
                'currencies'        =>Currency::all(),
                'payment_periods'   => PayementPeriod::all(),
                'payment_methods'   =>PayementMethod::all(),
                'countries'         => Country::all(),
                "account"           =>Account::findOrfail($id),
            ];
            return View('pages.suppliers.edit',compact('data'));
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'le Fournisseur n\'existe pas ! ...';
            return redirect()->route('supplier.index')->with('notification',$response);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return Response
     */
    public function update(Request $request, $id)
    {

        
        try{
     $account=Account::findOrfail($id);
        DB::beginTransaction();
        $account->update([
            'name'                  =>mb_strtoupper($request->raison_sociale),
            'ref'                   =>mb_strtoupper($request->ref),
            'rc'                    =>$request->rc,
            'ice'                   =>$request->ice,
            'iftax'                 =>$request->iftax,
            'country_id'            =>$request->country_id,
            'country_id_delivery'   =>$request->country_id_delivery,
            'currency_id'           =>1,
            'city'                  =>$request->city,
            'city_delivery'         =>$request->city_delivery,
            'zipcode'               =>$request->zipcode,
            'zipcode_delivery'      =>$request->zipcode_delivery,
            'address'               =>$request->address,
            'address_delivery'      =>$request->address_delivery,
            'phone'                 =>$request->phone,
            'mobile'                =>$request->mobile,
            'fax'                   =>$request->fax,
            'email'                 =>$request->email,
            'website'               =>$request->website,
            'discount'              =>$request->discount,
            'activity_area_id'      =>$request->activity_area_id,
            'payement_method_id'    =>$request->payement_method_id,
            'payement_period_id'    =>$request->payement_period_id,
            'account_types_id'      =>2,
            'note'                  =>$request->note,
            'updated_by'                =>auth()->id()
        ]);

        $response['status']     =   'success';
        $response['title']      =    'Succès';
        $response['message']    =    'Fournisseur a été Modifer avec succès';
        DB::commit();
        return redirect()->route('supplier.index',$account->id)->with('notification',$response);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            DB::rollBack();
            $response['status']     =      'warning';
            $response['title']      =      'Attention';
            $response['message']    =      'Ne peux pas Modifer  Fournisseur';
            return redirect()->route('supplier.index')->with('notification',$response);
        }

    }

    /**update the customer image **/
    public function setimage(Request $request,$id){

        try {
            $account = Account::find($id);
            $image=$account->image;
            if($request->hasFile('photo'))
            {
                $this->validate($request, [
                    'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                ]);
                $photo              = $request->file('photo');
                $input['imagename'] = time().'.'.$photo->getClientOriginalExtension();
                $destinationPath    = public_path('/diy/uploads/supplier');
                $photo->move($destinationPath, $input['imagename']);
                if($image != '')
                {
                    if(file_exists(public_path('/diy/uploads/supplier/'.$image)))
                        unlink(public_path('/diy/uploads/supplier/'.$image));
                }
                $image  = $input['imagename'];
                $account->update([
                    'image'      =>  $image,
                    'updated_by' =>  auth()->id(),
                ]);
                $response['status']     = 'success';
                $response['title']      = 'Succès';
                $response['message']    = 'Le Fournisseur a été modifer avec succès! ...';
                return redirect()->route("supplier.edit",$id)->with('notification',$response);
            }
        }catch (Exception $ex){
            \Log::error($ex->getMessage());
            $response['status']         = 'warning';
            $response['title']          = 'Attention';
            $response['message']        = 'Ne peux pas Ajouter image  ! ...';
            return redirect()->route('supplier.index')->with('notification',$response);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return Response
     */
    public function destroy($id)
    {
        //
        try {
            $account                =   Account::findOrfail($id);
            $account->delete();
            $response['status']     =   'success';
            $response['title']      =   'Succès';
            $response['message']    =   'Le Fournisseur a été Supprimer avec succès! ...';
            return redirect()->route('supplier.index')->with('notification',$response);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $response['status']     =   'warning';
            $response['title']      =   'Attention';
            $response['message']    =   'Ne peux pas Supprimer le Fournisseur ! ...';
            return redirect()->route('supplier.index')->with('notification',$response);
        }
    }
}