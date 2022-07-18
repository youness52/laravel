<?php

namespace App\Http\Controllers\Backend\Invoice;

use Carbon\Carbon;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\Country;
use App\Models\Currency;
use App\Models\ActivityArea;
use Illuminate\Http\Request;
use App\Models\PayementMethod;
use App\Models\Unit;
use App\Models\Status;
use App\Models\Product;
use App\Models\InvoiceItem;
use App\Models\PayementPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name =$request->input('id');
        $request = request()->route()->getName();
        if ($request == 'bcmd.index') {
            $data['invoice'] = Invoice::with('account', 'status', 'type')->where("invoice_type_id", 1)->where('code','like','%'.$name.'%')->paginate(10);;
            return View('pages.invoice.bcmd.index', compact('data'));
        } elseif ($request == 'breception.index') {
            $data['invoice'] = Invoice::with('account', 'status', 'type')->where("invoice_type_id", 3)->where('code','like','%'.$name.'%')->paginate(10);;
            return View('pages.invoice.breception.index', compact('data'));
        } else {
            $data['invoice'] = Invoice::with('account', 'status', 'type')->where("invoice_type_id", 9)->where('code','like','%'.$name.'%')->paginate(10);;
            return View('pages.invoice.facture.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'currencies'        => Currency::all(),
            'payment_periods'   => PayementPeriod::all(),
            'payment_methods'   => PayementMethod::all(),
            'unit'              => Unit::all(),
            'products'          => Product::orderBy(DB::raw('physical_quantity - qte_min'), 'asc')->get(),
            'account'           => Account::where('account_types_id', 2)->get(),
        ];
        $request = request()->route()->getName();
        if ($request == 'bcmd.create') {
            return view('pages.invoice.bcmd.add', compact('data'));
        } elseif ($request == 'breception.create') {
            return view('pages.invoice.breception.add', compact('data'));
        } else {
            return view('pages.invoice.facture.add', compact('data'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rt = request()->route()->getName();
        //return $request;

        if ($rt == "bcmd.store") {
            $invoice_type_id = 1;
            $msg = "Le bon de commande ";
            $red = "bcmd.index";
        } elseif ($rt == "breception.store") {
            $invoice_type_id = 3;
            $msg = "Le Récéption de commande ";
            $red = "breception.index";
        } elseif ($rt == "facture.store") {
            $invoice_type_id = 9;
            $msg = "La facture ";
            $red = "facture.index";
        }
        //return $rt;
        try {
            $image='';
            if($request->image){
                $request->validate([
                    'image' => 'mimes:jpg,png,jpeg,pdf',
                ]);
                $image = time() . '.' . $request->image->extension();
                $request->image->move(public_path("factures"), $image);
               }
            DB::beginTransaction();
            $invoice = Invoice::create([
                //'code' => 'RC-',
                
                'commande_date' => $request->datecmd,
                'account_id' => $request->fournisseur,
                'remarks' => $request->description,
                'payement_method_id'=>$request->modepay,
                'is_valid' => 'en Cours',
                'amount' => $request->total,
                'paid' => 0,
                'status_id' => 15,
                'invoice_type_id' => $invoice_type_id,
                'currency_id' => 1,
                'object' => $image,
                'created_by' => auth()->id()
            ]);

            $variation = [];
            foreach ($request->row as $value) {
                $variation[] = [
                    'description' => $value['product'],
                    'product_id' => $value['product'],
                    'quantity' => $value['quantite'],
                    'price' => $value['prix'],
                    'unit_id' => $value['unit'],
                    'created_by' => auth()->id(),
                    // 'invoice_id'=>32
                ];
            }
            $invoice->items2()->attach($variation);
            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message']    = $msg . 'a été Ajouter avec succès! ...';
            DB::commit();
            return redirect()->route($red)->with('notification', $response);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']  = 'warning';
            $response['title']  = 'Attention';
            $response['message'] = $msg . 'Ne peux pas Ajouter  ! ...\n';
            return redirect()->route($red)->with('notificationError', $response);
        }
        // return  $variation;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = request()->route()->getName();

        $data = [
            'currencies'        => Currency::all(),
            'payment_periods'   => PayementPeriod::all(),
            'payment_methods'   => PayementMethod::all(),
            'unit'              => Unit::all(),
            'status'            => Status::all(),
            'products'          => Product::all(),
            'account'           => Account::where('account_types_id',2)->get(),
            'invoice'           => Invoice::with('account')->findOrFail($id),
            'invoice_items'     => InvoiceItem::with('product')->where('invoice_id',$id)->get(),
        ];
        if($request=='bcmd.show'){
          return view('pages.invoice.bcmd.show', compact('data'));  
        }
       
       elseif($request=='breception.show'){
 return view('pages.invoice.breception.show', compact('data'));
       }
      
       else{
 return view('pages.invoice.facture.show', compact('data'));
       }
      

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = [
            'currencies'        => Currency::all(),
            'payment_periods'   => PayementPeriod::all(),
            'payment_methods'   => PayementMethod::all(),
            'unit'              => Unit::all(),
            'status'            => Status::all(),
            'products'          => Product::all(),
            'account'           => Account::where('account_types_id',2)->get(),
            'invoice'           => Invoice::with('account')->findOrFail($id),
            'invoice_items'     => InvoiceItem::where('invoice_id',$id)->get(),
        ];
        //return $data;
        $request = request()->route()->getName();
        if ($request == 'bcmd.edit') {
            return view('pages.invoice.bcmd.edit', compact('data'));
        } elseif ($request == 'breception.edit') {
            return view('pages.invoice.breception.edit', compact('data'));
        } else {
            return view('pages.invoice.facture.edit', compact('data'));
        }

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
       if(isset($request->transfer)){
        try {
            DB::beginTransaction();
            $invoice = Invoice::create([
                //'code' => 'RC-',
                'commande_date' => $request->datecmd,
                'account_id' => $request->fournisseur,
                'remarks' => $request->description,
                'payement_method_id'=>$request->modepay,
                'is_valid' => 'en Cours',
                'amount' => $request->total,
                'paid' => 0,
                'status_id' => 15,
                'invoice_type_id' => 3,
                'currency_id' => 1,
                'created_by' => auth()->id()
            ]);

            $variation = [];
            foreach ($request->row as $value) {
                $variation[] = [
                    'description' => $value['product'],
                    'product_id' => $value['product'],
                    'quantity' => $value['quantite'],
                    'price' => $value['prix'],
                    'unit_id' => $value['unit'],
                    'created_by' => auth()->id(),
                    // 'invoice_id'=>32
                ];
            }
            $invoice->items2()->attach($variation);
            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message']    = 'breception a été transfer avec succès! ...';
            DB::commit();
            return redirect()->route('breception.index')->with('notification', $response);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']  = 'warning';
            $response['title']  = 'Attention';
            $response['message'] =  ' breception Ne peux pas transfer  ! ...\n';
            return redirect()->route('breception.index')->with('notificationError', $response);
        }
       }else{

       
        $rt = request()->route()->getName();
        //return $request;
      //  if(isset($request->transfer))
        if ($rt == "bcmd.update") {
            $invoice_type_id = 1;
            $msg = "Le bon de commande ";
            $red = "bcmd.index";
        } elseif ($rt == "breception.update") {
            $invoice_type_id = 3;
            $msg = "Le Récéption de commande ";
            $red = "breception.index";
        } elseif ($rt == "facture.update") {
            $invoice_type_id = 9;
            $msg = "La facture ";
            $red = "facture.index";
        }
       // return $rt;
        try {
            InvoiceItem::where('invoice_id',$id)->delete();
            $invoice = Invoice::findOrfail($id);
            $image='';
            if($request->image){
                $request->validate([
                    'image' => 'mimes:jpg,png,jpeg,pdf',
                ]);
                $image = time() . '.' . $request->image->extension();
                $request->image->move(public_path("factures"), $image);
               }
            $invoice->update([
                'commande_date' => $request->datecmd,
                'account_id' => $request->fournisseur,
                'remarks' => $request->description,
                'payement_method_id'=>$request->modepay,
                'is_valid' => 'en Cours',
                'amount' => $request->total,
                'paid' => 0,
                'object' => $image,
                'status_id' => $request->status,
                'invoice_type_id' => $invoice_type_id,
                'currency_id' => 1,
            ]);

            $variation = [];
            foreach ($request->row as $value) {
                $variation[] = [
                    'description' => $value['product'],
                    'product_id' => $value['product'],
                    'quantity' => $value['quantite'],
                    'price' => $value['prix'],
                    'unit_id' => $value['unit'],
                    'created_by' => auth()->id(),
                    // 'invoice_id'=>32
                ];
            }
            $invoice->items2()->attach($variation);
            $response['status']  = 'success';
            $response['title']  = 'Succès';
            $response['message']    = $msg . 'a été modifier avec succès! ...';
            DB::commit();
            return redirect()->route($red)->with('notification', $response);

        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']  = 'warning';
            $response['title']  = 'Attention';
            $response['message'] = $msg . 'Ne peux pas modifier  ! ...\n';
            return redirect()->route($red)->with('notificationError', $response);
        }
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $request = request()->route()->getName();
        try {
            $account = Invoice::findOrfail($id);
            $account->delete();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            if ($request == "bcmd.destroy") {
                $response['message']    = 'Le bon de commande a été Supprimer avec succès! ...';
                return redirect()->route('bcmd.index')->with('notification', $response);
            } elseif ($request == "breception.destroy") {
                $response['message']    = 'Le récéption de commande a été Supprimer avec succès! ...';
                return redirect()->route('breception.index')->with('notification', $response);
            } elseif ($request == "facture.destroy") {
                $response['message']    = 'La facture a été Supprimer avec succès! ...';
                return redirect()->route('facture.index')->with('notification', $response);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Ne peux pas Supprimer la  ! ...';
            if ($request == "bcmd.destroy") {
                $response['message']    = 'Le bon de commande Ne peux pas Supprimer ! ...';
                return redirect()->route('bcmd.index')->with('notificationError', $response);
            } elseif ($request == "breception.destroy") {
                $response['message']    = 'Le récéption de commande Ne peux pas Supprimer ! ...';
                return redirect()->route('breception.index')->with('notificationError', $response);
            } elseif ($request == "facture.destroy") {
                $response['message']    = 'La facture Ne peux pas Supprimer ! ...';
                return redirect()->route('facture.index')->with('notificationError', $response);
            }
            //return redirect()->route('facture.index')->with('notificationError',$response);
        }
    }
}
