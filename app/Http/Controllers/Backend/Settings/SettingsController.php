<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'settings'=>Setting::all()
        ];

        return view('pages.settings.index',compact('data'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {

            if (isset($request->comp_name)) Setting::where('key','comp_name')->first()->update(['value' => $request->comp_name]);
            if (isset($request->comp_email)) Setting::where('key','comp_email')->first()->update(['value' => $request->comp_email]);
            if (isset($request->comp_copyright)) Setting::where('key','comp_copyright')->first()->update(['value' => $request->comp_copyright]);
            if (isset($request->site_name)) Setting::where('key','site_name')->first()->update(['value' => $request->site_name]);

            if (isset($request->print_name_1)) Setting::where('key','print_name_1')->first()->update(['value' => $request->print_name_1]);
            if (isset($request->print_ip_1)) Setting::where('key','print_ip_1')->first()->update(['value' => $request->print_ip_1]);
            if (isset($request->print_name_2)) Setting::where('key','print_name_2')->first()->update(['value' => $request->print_name_2]);
            if (isset($request->print_ip_2)) Setting::where('key','print_ip_2')->first()->update(['value' => $request->print_ip_2]);
            if (isset($request->print_name_3)) Setting::where('key','print_name_3')->first()->update(['value' => $request->print_name_3]);
            if (isset($request->print_ip_3)) Setting::where('key','print_ip_3')->first()->update(['value' => $request->print_ip_3]);

            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message']    = 'Settings a été modifer avec succès! ...';
            return redirect()->route('settings.index')->with('notification',$response);

        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $response['status']='warning';
            $response['title']='attention';
            $response['message']    = 'Settings Ne peux pas Suppression  ! ...';

            return redirect()->route('settings.index')->with('notificationError',$response);
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
        //
    }
}