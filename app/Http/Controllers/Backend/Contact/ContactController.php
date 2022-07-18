<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\ActivityArea;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
         $name = $request->input('id');
        $data['contacts'] =Contact::with('account')->where('fname','like','%'.$name.'%')->orWhere('lname','like','%'.$name.'%')->paginate(10);
        return View('pages.contacts.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data = [
            'accounts'=>Account::all(),
            'activity_areas'    =>ActivityArea::all(),
        ];
        return View('pages.contacts.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        try {
            Contact::create([
                'fname'     =>mb_strtoupper($request->fname),
                'lname'     =>mb_strtoupper($request->lname),
                'phone'     =>$request->phone,
                'fax'       =>$request->fax,
                'mobile'    =>$request->mobile,
                'email'     =>$request->email,
                'job_title' =>$request->job_title,
                'activity_area_id' =>$request->activity_area_id,
                'note'      =>$request->note,
                'account_id'=>$request->account_id,
                'created_by'=>auth()->id(),
            ]);
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Le Contact a été Ajouetr avec succès! ...';
            return redirect()->route('contact.index')->with('notification',$response);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'le Contact Ne peux pas Ajouter  ! ...';
            return redirect()->route('contact.index')->with('notificationError',$response);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $contact    = Contact::where('account_id',$id)->get();
            return $contact->toJson();
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      =  'Attention';
            $response['message']    = 'le contact n\'existe pas ! ...';
            return redirect()->route('contact.index')->with('notificationError',$response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function edit($id)
    {
        //
        try {
            $data = [
                'accounts'          =>Account::all(),
                'activity_areas'    =>ActivityArea::all(),
                'contact'           =>Contact::findOrfail($id),
            ];
            return View('pages.contacts.edit',compact('data'));
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'le contact n\'existe pas ! ...';
            return redirect()->route('contact.index')->with('notificationError',$response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $contact= Contact::findOrfail($id);
            $contact->update([
                'fname'             =>mb_strtoupper($request->fname),
                'lname'             =>mb_strtoupper($request->lname),
                'phone'             =>$request->phone,
                'fax'               =>$request->fax,
                'mobile'            =>$request->mobile,
                'email'             =>$request->email,
                'job_title'         =>$request->job_title,
                'activity_area_id'  =>$request->activity_area_id,
                'note'              =>$request->note,
                'account_id'        =>$request->account_id,
                'updated_by'        =>auth()->id(),
            ]);
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Le Contact a été Modifer avec succès! ...';
            return redirect()->route('contact.index',$contact->id)->with('notification',$response);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'le contact Ne peux pas modifier ! ...\n';
            return redirect()->route('contact.index')->with('notificationError',$response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        try {
            $contact                = Contact::findOrfail($id);
            $contact->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'Le contact a été Supprimer avec succès! ...';
            return redirect()->route('contact.index')->with('notification',$response);
        }catch (\Exception $e){
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'le contact n\'existe pas ! ...';
            return redirect()->route('contact.index')->with('notificationError',$response);
        }
    }
}
