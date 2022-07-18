<?php

namespace App\Http\Controllers\Backend\Stock;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFamily;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        $name = $request->input('id');
        $type = $request->input('type');
        if (isset($type)) {
            $data = [
                "units"             => Unit::get(),
                "productfamilies"   => ProductFamily::get(),
                "categories"        => Category::all(),
                "products"        => Product::Where('name','like','%'.$name.'%')->where('category_id', $type)->orderBy(DB::raw('physical_quantity - qte_min'), 'asc')->paginate(10)
            ];
        } else {
            $data = [
                "units"             => Unit::get(),
                "productfamilies"   => ProductFamily::get(),
                "categories"        => Category::all(),
                "products"        => Product::where('name','like','%'.$name.'%')->orWhere('reference','like','%'.$name.'%')->orderBy(DB::raw('physical_quantity - qte_min'), 'asc')->paginate(10)
            ];
        }
        return view('pages.stock.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data = [
            "units"             => Unit::get(),
            "productfamilies"   => ProductFamily::get(),
            "categories"        => Category::get(),
        ];
        return view('pages.stock.add', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            Product::create([
                "name"              => $request->designation,
                "reference"         => $request->reference,
                "designation"       => $request->designation,
                "description"       => $request->description,
                "product_family_id" => $request->product_family_id,
                "category_id"       => $request->category_id,
                "unit_id"           => $request->unit_id,
                "poids"             => $request->poids,
                "physical_quantity" => $request->poids,
                "qte_min"           => $request->qte_min,
                "tva"               => $request->tva,
                "price"               => $request->price,
                "created_by"        => auth()->id(),
            ]);
            DB::commit();
            $response['status']     = 'success';
            $response['title']      = 'Succès';
            $response['message']    = 'a été Ajouter avec succès! ! ...';
            return redirect()->route('product.index')->with('notification', $response);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Ne peux pas créer article ! ...';
            return redirect()->route('product.index')->with('notificationError', $response);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
    }

    public function autocomplete($request)
    {
        try {
            $product = Product::select('id', 'designation as label', 'selling_price', 'description', 'unit_id')->with(['unit' => function ($q) {
                return $q->select('id', 'symbol');
            }, 'account' => function ($q) {
                return $q->select('id', 'name');
            }])
                ->where('designation', "like", '%' . $request . '%')->get();
            return response()->json($product, 200);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            $response['status']     = 'warning';
            $response['title']      = 'Attention';
            $response['message']    = 'Ne peux pas créer article ! ...';
            return response()->json($response, 500);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            "units"             => Unit::get(),
            "productfamilies"   => ProductFamily::get(),
            "categories"        => Category::get(),
            "product"           => Product::findOrfail($id),
        ];
        return view('pages.stock.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::findOrfail($id);
            $product->update([
                "name"              => $request->designation,
                "reference"         => $request->reference,
                "designation"       => $request->designation,
                "description"       => $request->description,
                "product_family_id" => $request->product_family_id,
                "category_id"       => $request->category_id,
                "unit_id"           => $request->unit_id,
                "poids"             => $request->poids,
                "physical_quantity" => $request->poids,
                "qte_min"           => $request->qte_min,
                "tva"               => $request->tva,
                "price"             => $request->price,
                "updated_by"        => auth()->id(),
            ]);
            DB::commit();
            $response['status']     = 'success';
            $response['title']        = 'success';
            $response['message']    = 'Article a été Modifer avec succès!  ...';
            return redirect()->route('product.index')->with('notification', $response);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status'] = 'warning';
            $response['title'] = 'Attention';
            $response['message'] = 'Article n\'existe pas ! ...';
            return redirect()->route('product.index')->with('notificationError', $response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $product = Product::findOrfail($id);
            $product->delete();
            DB::commit();
            $response['status'] = 'success';
            $response['message'] = 'Article a été Supprimer avec succès!  ...';
            return redirect()->route('product.index')->with('notification', $response);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            $response['status'] = 'warning';
            $response['title'] = 'Attention';
            $response['message'] = 'Article n\'existe pas ! ...';
            return redirect()->route('product.index')->with('notificationError', $response);
        }
    }
}
