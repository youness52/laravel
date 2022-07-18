@extends('layouts.master')

@section('title','Clients')


@section('css')

@endsection

@section('javascript')
    <script>
        function printPromot() {
         
            $(".nk-header").hide();
            $(".nk-footer").hide();
            $(".backbtn").hide();
            $(".invoice-action").hide();
            window.print();
        }
    </script>
@endsection


@section('content')
    <!-- content @s -->
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Bon de commande Nº :  <strong class="text-primary small">{{$data['invoice']->code}}</strong></h3>
                            <div class="nk-block-des text-soft">
                                <ul class="list-inline">
                                    <li>Créer à : <span class="text-base"><?php echo date("Y-m-d h:i:sa")  ?></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="backbtn nk-block-head-content ">
                            <a href="{{route('bcmd.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex "><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="invoice">
                        <div class="invoice-action">
                            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" onclick="printPromot();"><em class="icon ni ni-printer-fill"></em></a>
                        </div><!-- .invoice-actions -->
                        <div class="invoice-wrap">
                            <div class="invoice-brand text-center">
                                <img src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="">
                            </div>
                            <div class="invoice-head">
                                <div class="invoice-contact">
                                    <span class="overline-title">Fournisseur information</span>
                                    <div class="invoice-contact-info">
                                        <h4 class="title">{{$data['invoice']->account->name}}</h4>
                                        <ul class="list-plain">
                                            <li><em class="icon ni ni-map-pin-fill"></em><span>{{$data['invoice']->account->address}}<br>{{$data['invoice']->account->city}}</span></li>
                                            <li><em class="icon ni ni-call-fill"></em><span>{{$data['invoice']->account->phone}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-desc">
                                    <h3 class="title">Bon de commande</h3>
                                    <ul class="list-plain">
                                        <li class="invoice-id"><span>Nº</span>:<span>{{$data['invoice']->code}}</span></li>
                                        <li class="invoice-date"><span>Date</span>:<span>{{$data['invoice']->commande_date}}</span></li>
                                    </ul>
                                </div>
                            </div><!-- .invoice-head -->
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th class="w-150px">Nº Produit</th>
                                            <th class="w-60">Description</th>
                                            <th>Prix</th>
                                            <th>Qantité</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['invoice_items'] as $item)
                                        <tr>
                                            <td>{{$item->product->reference}}</td>
                                            <td>{{$item->product->name}} - {{$item->product->designation}} - {{$item->product->description}}</td>
                                            <td>{{$item->price}} DH</td>
                                            <td>{{$item->quantity}} </td>
                                            <td>{{$item->price * $item->quantity}} DH</td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Sous-Total</td>
                                            <td>{{$data['invoice']->amount}} DH</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Fraid de Traitement</td>
                                            <td>00.00 DH</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">TVA</td>
                                            <td>00.00 DH</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td style="font-size: large;" colspan="2">Somme finale</td>
                                            <td style="font-size: large;">{{$data['invoice']->amount}} DH</td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="nk-notes ff-italic fs-12px text-soft"> Invoice was created on a computer and is valid without the signature and seal. </div>
                                </div>
                            </div><!-- .invoice-bills -->
                        </div><!-- .invoice-wrap -->
                    </div><!-- .invoice -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>


    <!-- content @e -->

@endsection