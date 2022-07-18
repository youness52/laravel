@extends('layouts.master')

@section('title','Articles')


@section('css')
    <link rel="stylesheet" href="/assets/css/editors/quill.css?ver=2.9.1">
@endsection

@section('javascript')
    <script src="/assets/js/libs/editors/quill.js?ver=2.9.1"></script>
    <script>
        var quill = new Quill('#description', {
            theme: 'snow'
        });
    </script>
@endsection

@section('content')
    <div class="nk-content-body">
        <form  method="post" action="{{route('product.store')}}" autocomplete="off"  >
            @csrf()
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Ajouter un Article</h3>
                        <div class="nk-block-des text-soft">
                            <p>Vous avez un total de 2 595 Articles.</p>
                        </div>
                    </div>
                    <!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class=" nk-block">
                            <button type="submit" class=" btn btn-icon btn-primary" ><em class="icon ni ni-save  "></em></button>
                        </div><!-- .toggle-wrap -->
                    </div>
                    <!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block">
                <div class="row">
                    <div class="mb-2 col-md-6">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category_id">Type
                                            </label>
                                            <div class="form-control-wrap ">
                                                <select class="form-control form-select" id="category_id" name="category_id"  >
                                                    <option label="empty" value=""></option>
                                                    @isset($data['categories'])
                                                        @foreach($data['categories'] as $item)
                                                            <option value="{{$item->id}}">{{$item->name}} </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="product_family_id">Famille </label>
                                            <div class="form-control-wrap">
                                                <select class="form-control form-select" id="product_family_id" name="product_family_id"  >
                                                    <option label="empty" value=""></option>
                                                    @isset($data['productfamilies'])
                                                        @foreach($data['productfamilies'] as $item)
                                                            <option value="{{$item->id}}">{{$item->name}} </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="reference">Référence </label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="reference" name="reference" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="designation">Désignation </label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="designation" name="designation" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Description</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control" id="description" name="description">

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 col-md-6">


                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="tva">TVA applicable</label>
                                            <div class="form-control-wrap">
                                                <input type="number" class="form-control" id="tva" name="tva" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="unit_id">Unité</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control form-select" id="unit_id" name="unit_id"  >
                                                    <option label="empty" value=""></option>
                                                    @isset($data['units'])
                                                        @foreach($data['units'] as $item)
                                                            <option value="{{$item->id}}" >({{$item->symbol}}) {{$item->unit}}  </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="qte_min">Stock minimum</label>
                                            <div class="form-control-wrap">
                                                <input type="number" step="0.01" class="form-control" id="qte_min" name="qte_min" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="poids">Poids/ Quantité in Stock</label>
                                            <div class="form-control-wrap">
                                                <input type="number" step="0.01" class="form-control" id="poids" name="poids" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="Prix">Prix unitaite</label>
                                            <div class="form-control-wrap">
                                                <input type="number" step="0.01" class="form-control" id="Prix" name="price" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .nk-block -->
        </form>
    </div>

@endsection
