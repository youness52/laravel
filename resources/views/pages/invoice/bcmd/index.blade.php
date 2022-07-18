@extends('layouts.master')

@section('title','bcmds')


@section('css')

@endsection

@section('javascript')


@endsection

@section('content')


    <!-- content @s -->
    <div class="nk-content-body">
        @include('notification.notification')
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Liste des Bon des commandes</h3>
                    <div class="nk-block-des text-soft">
                        <p>Vous avez un total de {{$data['invoice']->total()}} invoices.</p>
                    </div>
                </div>
                <!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="{{route('bcmd.create')}}" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <div class="drodown">
                                        <a href="{{route('bcmd.create')}}" class="dropdown-toggle btn btn-icon btn-primary" ><em class="icon ni ni-plus"></em></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .toggle-wrap -->
                </div>
                <!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->

        <div class="nk-block">
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner position-relative card-tools-toggle ">
                        <div class="card-title-group">
                            <div class="card-tools">
                                <div class="form-inline flex-nowrap gx-3">
                                    <div class="form-wrap w-150px">
                                        <select class="form-select form-select-sm" data-search="off" data-placeholder="Bulk Action">
                                            <option value="">Action </option>
                                            <option value="Référence">Référence</option>
                                            <option value="bcmds">bcmds</option>
                                            <option value="delete">Ville</option>
                                        </select>
                                    </div>
                                    <div class="btn-wrap">
                                        <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Appliquer</button></span>
                                        <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                    </div>
                                </div><!-- .form-inline -->
                            </div><!-- .card-tools -->
                            <div class="card-tools mr-n1">
                                <ul class="btn-toolbar gx-1">
                                    <li>
                                        <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                    </li><!-- li -->
                                    <li class="btn-toolbar-sep"></li><!-- li -->
                                    <li>
                                        <div class="toggle-wrap">
                                            <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                            <div class="toggle-content" data-content="cardTools">
                                                <ul class="btn-toolbar gx-1">
                                                    <li class="toggle-close">
                                                        <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                    </li><!-- li -->
                                                    <li class="d-none">
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                <div class="dot dot-primary"></div>
                                                                <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                                <div class="dropdown-head">
                                                                    <span class="sub-title dropdown-title">Filtrer les bcmds</span>
                                                                </div>
                                                                <div class="dropdown-body dropdown-body-rg">
                                                                    <div class="row gx-4 gy-3">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="overline-title overline-title-alt">Status</label>
                                                                                <select class="form-select form-select-sm">
                                                                                    <option value="any">Any Status</option>
                                                                                    <option value="active">Active</option>
                                                                                    <option value="pending">Pending</option>
                                                                                    <option value="suspend">Suspend</option>
                                                                                    <option value="deleted">Deleted</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                                <input type="checkbox" class="custom-control-input" id="hasBalance">
                                                                                <label class="custom-control-label" for="hasBalance"> Have Balance</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <button type="button" class="btn btn-secondary">Filter</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown-foot between">
                                                                    <a class="clickable" href="#">Réinitialiser</a>
                                                                    <a href="#">Enregistrer le filtre</a>
                                                                </div>
                                                            </div><!-- .filter-wg -->
                                                        </div><!-- .dropdown -->
                                                    </li><!-- li -->
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                <em class="icon ni ni-setting"></em>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                                <ul class="link-check">
                                                                    <li><span>Affiche</span></li>
                                                                    <li class="active"><a href="#">10</a></li>
                                                                    <li><a href="#">20</a></li>
                                                                    <li><a href="#">50</a></li>
                                                                </ul>
                                                                <ul class="link-check">
                                                                    <li><span>Trier</span></li>
                                                                    <li class="active"><a href="#">DESC</a></li>
                                                                    <li><a href="#">ASC</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .dropdown -->
                                                    </li><!-- li -->
                                                </ul><!-- .btn-toolbar -->
                                            </div><!-- .toggle-content -->
                                        </div><!-- .toggle-wrap -->
                                    </li><!-- li -->
                                </ul><!-- .btn-toolbar -->
                            </div>
                            <!-- .card-tools -->
                        </div><!-- .card-title-group -->
                        <div class="card-search search-wrap" data-search="search">
                            <div class="card-body">
                                <div class="search-content">
                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                    <form action="" method="get">
                                    <input type="text" class="form-control border-transparent form-focus-none" name="id" placeholder="Search by name">
                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                    </form></div>
                            </div>
                        </div><!-- .card-search -->
                    </div><!-- .card-inner -->
                    <div class="card-inner p-0">
                        <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </div>
                                
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Référence </span></div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text">Fournisseur</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Total</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Date</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></div>
                                <div class="nk-tb-col nk-tb-col-tools text-right">
                                </div>
                            </div><!-- .nk-tb-item -->
                            @if(isset($data['invoice']))
                                @foreach($data['invoice'] as $invoice)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid1">
                                                <label class="custom-control-label" for="uid1"></label>
                                            </div>
                                        </div>
                                       
                                        <div class="nk-tb-col tb-col-lg">
                                            <span>{{$invoice->code}}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-mb">
                                            <span class="tb-amount">{{$invoice->account->name}}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-amount">{{$invoice->amount}}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-amount">{{$invoice->commande_date}}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-xxl ">
                                            <span class="badge badge-dim badge-primary">{{$invoice->status->name}}</span>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                            <li class="nk-tb-action-hidden">
                                                    <a href="{{route('bcmd.show',$invoice->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Preview / Print">
                                                        <em class="icon ni ni-eye"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <a href="{{route('bcmd.edit',$invoice->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="edit">
                                                        <em class="icon ni ni-edit"></em>
                                                    </a>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <form action="{{route('bcmd.destroy',$invoice->id)}}" method="post">
                                                        @csrf()
                                                        @method('DELETE')
                                                        <button class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="delete">
                                                            <em class="icon ni ni-trash"></em>
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{route('bcmd.edit',$invoice->id)}}" ><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                <li>
                                                                    <form action="{{route('bcmd.destroy',$invoice->id)}}" method="post">
                                                                        @csrf()
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link"   ><em class="icon ni ni-trash"></em><span>Delete</span></button>
                                                                    </form>
                                                                </li>
                                                                <li><a href="{{route('bcmd.show',$invoice->id)}}" ><em class="icon ni ni-eye"></em><span>Preview / Print</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <!-- .nk-tb-item -->

                        </div><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                {{ $data['invoice']->links('vendor.pagination.custom')}}
                    <!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    <!-- content @e -->

@endsection
