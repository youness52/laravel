@extends('layouts.master')

@section('title','Utilisateur')


@section('css')
    <link rel="stylesheet" href="/assets/css/editors/quill.css?ver=2.9.1">
@endsection


@section('javascript')
    <script>
        // Date generates the international format YYYY-MM-DD:
        function dateToYMD(value) {
            return (new Date(value)).toLocaleString();
        }

        const getVariation = (id,variations)=>{
            let  result=  variations.filter((v)=>{
                return v.id ==id;
            })
            return result[0].name;
        }

        const getPropertie = (propertie,Properties)=>{

            const arrayProperties = propertie.split(',');

            let html='';

            let  result=  Properties.map((v)=>{

                if(arrayProperties.includes(String(v.id))) html +=`<span class="badge badge-warning">${v.name}</span>`;
            })

            return html;
        }

        let propertieEdit = (id) => {
            let total = 0;
            instance.get(`/admin/orders/${id}/`)
                .then(function (response) {
                    let tbody = '';
                    response.data.items.forEach(function (item) {
                        if (item.pivot.status == 'pending') {
                            tbody += "<tr><td>" + item.name + "</td><td>" + ((item.pivot.comment != null) ? item.pivot.comment : '') + ' ' + ((item.pivot.variation_id != null) ? "<span class='badge badge-primary'>" + getVariation(item.pivot.variation_id, item.variation) + "</span>" : '') + ' ' + ((item.pivot.properties != null) ? "<span>" + getPropertie(item.pivot.properties, item.propertie) + "</span>" : '') + "</td><td><code>" + item.pivot.quantity + "</code></td><td><code>" + (item.pivot.price * item.pivot.quantity) + " MAD </code></td><td><span class='badge badge-info'>" + item.pivot.status + "</span></td></tr>";

                        } else if (item.pivot.status == 'cancel') {
                            tbody += "<tr><td>" + item.name + "</td><td>" + ((item.pivot.comment != null) ? item.pivot.comment : '') + ' ' + (item.pivot.variation_id != null) + "</td><td><code>" + item.pivot.quantity + "</code></td><td><code>" + (item.pivot.price * item.pivot.quantity) + " MAD </code></td><td><span class='badge badge-danger'>" + item.pivot.status + "</span></td></tr>";

                        } else {
                            tbody += "<tr><td>" + item.name + "</td><td>" + ((item.pivot.comment != null) ? item.pivot.comment : '') + ' ' + (item.pivot.variation_id != null) + "</td><td><code>" + item.pivot.quantity + "</code></td><td><code>" + (item.pivot.price * item.pivot.quantity) + " MAD </code></td><td><span class='badge badge-primary'>" + item.pivot.status + "</span></td></tr>";

                        }
                        if (item.pivot.status != 'cancel') {
                            total += (item.pivot.price * item.pivot.quantity);
                        }
                    })

                    $(".status_pending").attr("href", `javascript:statusUpdate(${id},'pending')`);
                    $(".status_canceled").attr("href", `javascript:statusUpdate(${id},'canceled')`);
                    $(".status_complete").attr("href", `javascript:statusUpdate(${id},'complete')`);
                    $(".status_ready").attr("href", `javascript:statusUpdate(${id},'ready')`);
                    $(".status_printed").attr("href", `javascript:statusUpdate(${id},'printed')`);

                    $("#invoice").html(tbody);
                    $("#totalprice").text(total + ' MAD');
                    if (response.data.status == 'pending') {
                        $("#orderStatus").html("<span class='badge badge-primary'>Pending</span>");
                    }
                    else if (response.data.status == 'cancel') {
                        $("#orderStatus").html("<span class='badge badge-primary'>Cancel</span>");
                    }
                    else if (response.data.status == 'ready') {
                        $("#orderStatus").html("<span class='badge badge-primary'>ready</span>");
                    }
                    else if (response.data.status == 'printed') {
                        $("#orderStatus").html("<span class='badge badge-primary'>printed</span>");
                    }
                    else {
                        $("#orderStatus").html("<span class='badge badge-primary'>Complete</span>");
                    }
                    $("#order_id").text(response.data.id);
                    $("#userOrder").text(response.data.user.name);
                    $("#table_id").text(response.data.table.name);

                    $("#ordered").text(dateToYMD(response.data.created_at));

                    $('#ModelAddPropertie').modal('show');

                })
                .catch(function (error) {
                    //show toastr error message
                    NioApp.Toast(error.message, 'error');
                    // handle error
                    console.log(error);
                });
        };

        const statusUpdate =(id,status)=> {

            instance.post(`/admin/orders/status/${id}/${status}/`, {
                id: id,
                status: status
            })
                .then(function (response) {
                    // handle success
                    NioApp.Toast(response.data['message'], 'success');
                    setTimeout(function () {
                        // redirectTo show page
                        location.reload()

                    }, 5000);
                })
                .catch(function (error) {
                    //show toastr error message
                    NioApp.Toast(error.message, 'error');
                    // handle error
                    console.log(error);
                });
        }

    </script>
@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">List des Ventes d'tilisateur ( @if(count($data['orders'])>0) {{($data['orders'][0]->user->name)}} @endif)</h3>
                    <div class="nk-block-des text-soft">
                        <p>Vous avez un total de {{count($data['orders'])}} Ventes.</p>
                    </div>
                </div><!-- .nk-block-head-content -->

            </div><!-- .nk-block-between -->
        </div><!-- .nk-block-head -->
        <div class="nk-block">
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner position-relative card-tools-toggle">
                        <div class="card-title-group">
                            <div class="card-tools">
                                <div class="form-inline flex-nowrap gx-3">

                                    <div class="btn-wrap">
                                        <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light ">Apply</button></span>
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
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                <div class="dot dot-primary"></div>
                                                                <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                                <div class="dropdown-head">
                                                                    <span class="sub-title dropdown-title">Filtrer les Ventes</span>
                                                                </div>
                                                                <form action="" method="get">
                                                                <div class="dropdown-body dropdown-body-rg">
                                                                    <div class="row gx-4 gy-3">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label class="overline-title overline-title-alt">Statut</label>
                                                                                <select class="form-select form-select-sm" name="status">
                                                                                    <option value="any">Tout statut</option>
                                                                                    <option value="pending">Pending</option>
                                                                                    <option value="canceled">Canceled</option>
                                                                                    <option value="complete">Complete</option>
                                                                                    <option value="ready">Ready</option>
                                                                                    <option value="printed">Printed</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <button type="submit" class="btn btn-secondary">Filtrer</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                                <div class="dropdown-foot between">
                                                                    <a class="clickable" href="#">Réinitialiser le filtre</a>
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
                                                                    <li><span>Show</span></li>
                                                                    <li class="active"><a href="#">10</a></li>
                                                                    <li><a href="#">20</a></li>
                                                                    <li><a href="#">50</a></li>
                                                                </ul>
                                                                <ul class="link-check">
                                                                    <li><span>Order</span></li>
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
                            </div><!-- .card-tools -->
                        </div><!-- .card-title-group -->
                        <div class="card-search search-wrap" data-search="search">
                            <div class="card-body">
                                <div class="search-content">
                                    <a href="/" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                    <input type="text" class="form-control border-transparent form-focus-none" placeholder="Recherche  par table">
                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                </div>
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
                                <div class="nk-tb-col"><span class="sub-text">Commande ID</span></div>
                                <div class="nk-tb-col"><span class="sub-text">N° Table </span></div>
                                <div class="nk-tb-col"><span class="sub-text">Total </span></div>
                                <div class="nk-tb-col"><span class="sub-text">Date d'ajout </span></div>
                                <div class="nk-tb-col"><span class="sub-text">Date de modification </span></div>
                                <div class="nk-tb-col"><span class="sub-text">Statut </span></div>
                                <div class="nk-tb-col"><span class="sub-text">Utilisateur </span></div>
                                <div class="nk-tb-col nk-tb-col-tools text-right">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                            <ul class="link-tidy sm no-bdr">
                                                <li>
                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked="" id="ph">
                                                        <label class="custom-control-label" for="ph">Total</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked="" id="bl">
                                                        <label class="custom-control-label" for="bl">Total</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="st">
                                                        <label class="custom-control-label" for="st">Statut</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
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
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-show">
                                                    <button class="btn  btn-icon" onclick="javascript:propertieEdit({{$item->id}})" data-toggle="tooltip" data-placement="top" title="Afficher">
                                                        <em class="icon ni ni-eye "></em>
                                                    </button>
                                                </li>
                                                <li class="nk-tb-action-show">
                                                    <form action="{{route('orders.destroy',$item->id)}}" method="post">
                                                        @csrf()
                                                        @method('DELETE')
                                                        <button class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suprimer">
                                                            <em class="icon ni ni-trash"></em>
                                                        </button>
                                                    </form>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                        @endif
                        <!-- .nk-tb-item -->
                        </div><!-- .nk-tb-list -->
                    </div>
                    <!-- .card-inner -->
                    <!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    <div class="modal fade" id="ModelAddPropertie">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <form method="Post" action="" id="form_order_update" autocomplete="off" enctype="multipart/form-data">
                        @csrf()
                        @method('PUT')
                        <div  class=" row font-bold text-uppercase my-2 ">
                            <div class="col-3">#Order <span class=" badge badge-dim    badge-primary   "  id="order_id"></span></div>
                            <div class="col-3">#Table <span class=" badge badge-dim    badge-primary   " id="table_id"></span></div>

                            <div class="col-6 text-right">
                                Date d'ajout : <span id="ordered">---</span>
                            </div>
                        </div>
                        <table class="table table-sm table-hover text-nowrap">
                            <thead class="text-uppercase">
                            <tr>
                                <th> Aliment</th>
                                <th> informations supplémentaires</th>
                                <th>Qtte </th>
                                <th>Prix</th>
                                <th>Statut</th>
                            </tr>
                            </thead>
                            <tbody id="invoice">
                            </tbody>
                        </table>
                        <hr class="my-1">
                        <div class="row">
                            <div class="col-6 text-left text-uppercase font-bold">
                                <div>Total</div>
                            </div>
                            <div class="col-6 text-left text-uppercase font-bold">
                                <code id="totalprice">000 MAD</code> &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-left text-uppercase font-bold">
                                <div>REMISE</div>
                            </div>
                            <div class="col-6 text-left text-uppercase font-bold">
                                <code id="totalremise">000 MAD</code> &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-left text-uppercase font-bold">
                                <div>Montant payé</div>
                            </div>
                            <div class="col-6 text-left text-uppercase font-bold">
                                <code id="totalpricepaye">000 MAD</code> &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-left text-uppercase font-bold">
                                <div>Montant du retour</div>
                            </div>
                            <div class="col-6 text-left text-uppercase font-bold">
                                <code id="totalpriceretour">000 MAD</code> &nbsp;
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-left text-uppercase font-bold">
                                <div>Status</div>
                            </div>
                            <div class="col-6 text-left text-uppercase font-bold">
                                <div class="drodown">
                                    <a href="#" id="orderStatus" class="dropdown-toggle btn btn-primary btn-sm  btn-outline-primary" data-toggle="dropdown">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a class="status_pending" href="javascript:status(1,'pending')"><span>pending</span></a></li>
                                            <li><a class="status_canceled" href="javascript:status(1,'Canceled')"><span>Canceled</span></a></li>
                                            <li><a class="status_complete" href="javascript:status(1,'Complete')"><span>Complete</span></a></li>
                                            <li><a class="status_ready" href="javascript:status(1,'ready')"><span>Ready</span></a></li>
                                            <li><a class="status_printed" href="javascript:status(1,'printed')"><span>Printed</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 text-left text-uppercase font-bold">
                                <div>User </div>
                            </div>
                            <div class="col-6 text-left text-uppercase font-bold">
                                <span id="userOrder">---</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .Add Modal-Content -->
    <!-- content @e -->
@endsection

