@extends('layouts.master')

@section('title','Tableau de bord')


@section('css')

@endsection

@section('javascript')


@endsection

@section('content')
<div class="nk-block-head-content">
    <h3 class="nk-block-title page-title">Tableau de bord</h3>
    <form action="" method="get" style="float: right;">
                            <div class="card-tools">
                                <div class="form-inline flex-nowrap gx-3">
                                    <div class="input-group input-daterange">
                                        <input type="date" class="form-control" name="startdate" value="<?php if (isset($_GET['startdate']))echo $_GET['startdate'];else echo date('Y-m-d',); ?>">
                                        <div class="input-group-addon">to</div>
                                        <input type="date" class="form-control" name="enddate" value="<?php if (isset($_GET['startdate']))echo $_GET['enddate'];else echo date('Y-m-d',strtotime("+1 day")); ?>">
                                    </div>
                                    <div class="btn-wrap">
                                        <span class="d-none d-md-block"><button type="submit" class="btn btn-dim btn-outline-light ">Appliquer</button></span>
                                        <span class="d-md-none"><button type="submit" class="btn btn-dim btn-outline-primary btn-icon "><em class="icon ni ni-arrow-right"></em></button></span>
                                    </div>
                                </div><!-- .form-inline -->
                            </div><!-- .card-tools -->
                        </form><br><br>
    <div class="nk-block-des text-soft">
        <!-- <p>Vous avez un total de  Personnels .</p> -->
    </div>
</div>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder t" style="border: 2px solid;border-color: #1ee0ac;">
            <div class=" card-body">

                <h4 class="font-weight-normal mb-3">Nombre des clients <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{$data['clientnbr']}}</h2>
                <!-- <h6 class="card-text">Augmenter de 60%</h6> -->
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder " style="border: 2px solid;border-color: #1ee0ac;">
            <div class=" card-body">

                <h4 class="font-weight-normal mb-3">Nombre des commande<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{$data['ordersnbr']}}</h2>
                <!-- <h6 class="card-text">Augmenter de 10%</h6> -->
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder " style="border: 2px solid;border-color: #1ee0ac;">
            <div class=" card-body">

                <h4 class="font-weight-normal mb-3">Revenu de <?php if (isset($_GET['startdate'])) echo $_GET['startdate'] .' à '.$_GET['enddate'];else echo date('F');?><i class="mdi mdi-diamond mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{$data['revenusum']}} DH</h2>
                <!-- <h6 class="card-text">Augmenter de 5%</h6> -->
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Les commandes en attente</h4>
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid">
                                    <label class="custom-control-label" for="uid"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col"><span class="sub-text">Commande ID</span></div>
                            <div class="nk-tb-col"><span class="sub-text">N° Table </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Total </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Date d'ajout </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Date de modification </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Statut </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Utilisateur </span></div>

                        </div>
                        <!-- .nk-tb-item -->
                        @if(isset($data['orders']))
                        @foreach($data['orders'] as $key => $item)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid{{$key}}">
                                    <label class="custom-control-label" for="uid{{$key}}"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col tb-col-mb">
                                <span>#{{$item->id}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-mb">
                                <span>{{$item->table->name}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-mb text-success font-weight-bold">
                                <span>{{$item->amount}} MAD</span>
                            </div>
                            <div class="nk-tb-col tb-col-mb">
                                <span>{{$item->created_at}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-mb">
                                <span>{{($item->updated_at)?$item->updated_at:'---'}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-mb">
                                <span class=" badge badge-dim    badge-primary   ">{{$item->status}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-mb">
                                <span>{{$item->user->name}}</span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- .nk-tb-item -->
                    </div><!-- .nk-tb-list -->
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<hr><br>



<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Le Revenu de <?php if (isset($_GET['startdate'])) echo $_GET['startdate'] .' à '.$_GET['enddate'];else echo date('F');?></h4>
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col nk-tb-col-check">

                            </div>
                            <div class="nk-tb-col"><span class="sub-text">Utilisateur</span></div>
                            <div class="nk-tb-col"><span class="sub-text">Revenu </span></div>

                        </div>
                        <!-- .nk-tb-item -->
                        @if(isset($data['revenuTotal']))
                        @foreach($data['revenuTotal'] as $key => $revenu)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                            </div>
                            <div class="nk-tb-col tb-col-mb">
                                <span>{{ $revenu->user->name}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-mb" style="font-size: larger ; color:#1ee0ac; font-weight: bolder;">
                                <span>{{$revenu->sum}} DH</span>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        <!-- .nk-tb-item -->
                    </div><!-- .nk-tb-list -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection