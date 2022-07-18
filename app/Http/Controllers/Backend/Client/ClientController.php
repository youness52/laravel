<?php

namespace App\Http\Controllers\Backend\Client;

use App\Models\Account;
use App\Models\Country;
use App\Models\Currency;
use App\Models\ActivityArea;
use Illuminate\Http\Request;
use App\Models\PayementMethod;
use App\Models\PayementPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $name = $request->input('id');
        $data['accounts'] = Account::where('name', 'like', '%' . $name . '%')->where("account_types_id", 1)->paginate(10);

        return View('pages.clients.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create(Request $request)
    {
        //
        $data = [
            'activity_areas'    => ActivityArea::all(),
            'currencies'        => Currency::all(),
            'payment_periods'   => PayementPeriod::all(),
            'payment_methods'   => PayementMethod::all(),
            'countries'         => Country::all(),
        ];
        return View('pages.clients.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'taille' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'discount' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required',

        ]);
        try {
            DB::beginTransaction();
            Account::create([
                'name'                  => mb_strtoupper($request->raison_sociale),
                'ref'                   => mb_strtoupper($request->ref),
                'rc'                    => $request->rc,
                'ice'                   => $request->ice,
                'iftax'                 => $request->iftax,
                'country_id'            => $request->country_id,
                'country_id_delivery'   => $request->country_id_delivery,
                'currency_id'           => 1,
                'city'                  => $request->city,
                'city_delivery'         => $request->city_delivery,
                'zipcode'               => $request->zipcode,
                'zipcode_delivery'      => $request->zipcode_delivery,
                'address'               => $request->address,
                'address_delivery'      => $request->address_delivery,
                'phone'                 => $request->phone,
                'mobile'                => $request->mobile,
                'fax'                   => $request->fax,
                'email'                 => $request->email,
                'website'               => $request->website,
                'discount'              => $request->discount,
                'activity_area_id'      => $request->activity_area_id,
                'payement_method_id'    => $request->payment_method_id,
                'payement_period_id'    => $request->payement_period_id,
                'account_types_id'      => 1,
                'note'                  => $request->note,
                'created_by'            => auth()->id(),
            ]);
            DB::commit();
            $response['status']     =   'success';
            $response['title']      =    'Succès';
            $response['message']    =    'Le Client a été Ajouetr avec succès! ...';
            return redirect()->route('client.index')->with('notification', $response);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            DB::rollBack();
            $response['status']     =      'warning';
            $response['title']      =      'Attention';
            $response['message']    =      'Ne peux pas Ajouter le client ! ...';
            return redirect()->route('client.index')->with('notificationError', $response);
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
     * @return RedirectResponse
     */
    public function edit($id)
    {
        //
        try {

            $data = [
                'activity_areas'    => ActivityArea::all(),
                'currencies'        => Currency::all(),
                'payment_periods'   => PayementPeriod::all(),
                'payment_methods'   => PayementMethod::all(),
                'countries'         => Country::all(),
                "account"           => Account::findOrfail($id),
            ];
            return View('pages.clients.edit', compact('data'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'le client n\'existe pas ! ...';
            return redirect()->route('client.index')->with('notification', $response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'taille' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'discount' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'city' => 'required',

        ]);

        try {
            $account = Account::findOrfail($id);
            DB::beginTransaction();
            $account->update([
                'name'                  => mb_strtoupper($request->raison_sociale),
                'ref'                   => mb_strtoupper($request->ref),
                'rc'                    => $request->rc,
                'ice'                   => $request->ice,
                'iftax'                 => $request->iftax,
                'country_id'            => $request->country_id,
                'country_id_delivery'   => $request->country_id_delivery,
                'currency_id'           => 1,
                'city'                  => $request->city,
                'city_delivery'         => $request->city_delivery,
                'zipcode'               => $request->zipcode,
                'zipcode_delivery'      => $request->zipcode_delivery,
                'address'               => $request->address,
                'address_delivery'      => $request->address_delivery,
                'phone'                 => $request->phone,
                'mobile'                => $request->mobile,
                'fax'                   => $request->fax,
                'email'                 => $request->email,
                'website'               => $request->website,
                'discount'              => $request->discount,
                'activity_area_id'      => $request->activity_area_id,
                'payement_method_id'    => $request->payement_method_id,
                'payement_period_id'    => $request->payement_period_id,
                'account_types_id'      => 1,
                'note'                  => $request->note,
                'updated_by'                => auth()->id()
            ]);
            $response['status']     =    'success';
            $response['title']      =    'Succès';
            $response['message']    =    'Le Client a été modifer avec succès! ...';
            DB::commit();
            return redirect()->route('client.index', $account->id)->with('notification', $response);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            DB::rollBack();
            $response['status']     =      'warning';
            $response['title']      =      'Attention';
            $response['message']    =      'Ne peux pas Modifer le client ! ...';
            return redirect()->route('client.index')->with('notificationError', $response);
        }
    }

    /**update the customer image **/
    public function setimage(Request $request, $id)
    {

        try {
            $account = Account::find($id);
            $image = $account->image;
            if ($request->hasFile('photo')) {
                $this->validate($request, [
                    'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                ]);

                $photo              = $request->file('photo');
                $input['imagename'] = time() . '.' . $photo->getClientOriginalExtension();
                $destinationPath    = public_path('/diy/uploads/customer');
                $photo->move($destinationPath, $input['imagename']);

                if ($image != '') {
                    if (file_exists(public_path('/diy/uploads/client/' . $image)))
                        unlink(public_path('/diy/uploads/client/' . $image));
                }

                $image = $input['imagename'];
                $account->update([
                    'image'         => $image,
                    'updated_at'    => auth()->id(),
                ]);
                $response['status']     = 'success';
                $response['title']      = 'Succès';
                $response['message']    = 'Le Client a été modifer avec succès! ...';
                return redirect()->route("client.edit", $id)->with('notification', $response);
            }
        } catch (Exception $ex) {
            \Log::error($ex->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Ne peux pas Ajouter image  ! ...';
            return redirect()->route('client.index')->with('notificationError', $response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        //
        try {
            $account = Account::findOrfail($id);
            $account->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Le Client a été Supprimer avec succès! ...';
            return redirect()->route('client.index')->with('notification', $response);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Ne peux pas Supprimer le client ! ...';
            return redirect()->route('client.index')->with('notificationError', $response);
        }
    }
}
