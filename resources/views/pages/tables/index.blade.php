@extends('layouts.master')

@section('title','Tables')


@section('css')

@endsection

@section('javascript')
<script>
    /*
    NioApp.Toast('This is a note for deafult toast message.', 'info');
    NioApp.Toast('This is a note for success toast message.', 'success');
    NioApp.Toast('This is a note for warning toast message.', 'warning');
    NioApp.Toast('This is a note for error toast message.', 'error');
    NioApp.Toast('<h5>Update Successfully</h5><p>Your profile has been successfully updated.</p>', 'success');
     */
    const buttonAdd = document.getElementById('addTable');
    buttonAdd.addEventListener("click", ()=>{
            store('{{route('table.store')}}','add_form_table')
            $('#ModelAddTable').modal('hide');
    });


    const tableEdit = (id)=>{
        instance.get(`admin/table/${id}/edit`)
            .then(function (response) {
                // handle success
                $('#name').val(response.data.name);
                $('#capacity').val(response.data.capacity);
                $('#id').val(response.data.id);
                $('#editTableButton').attr(`onClick`, "tableUpdate('/admin/table/"+response.data.id+"','edit_form_table')");
                $('#ModelEditTable').modal('show');

            })
            .catch(function (error) {
                //show toastr error message
                NioApp.Toast(error.message, 'error');
                // handle error
                console.log(error);
            });
    };

    function tableUpdate(url,form) {
        $('#ModelEditTable').modal('hide');

        instance.put(url, getForm(form))
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
    @include('notification.notification')
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Les tables  </h3>
                    <div class="nk-block-des text-soft">
                        <p>Vous avez un total de 2,595 tables.</p>
                    </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li class="nk-block-tools-opt">
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#" data-toggle="modal" data-target="#ModelAddTable"><span> nouvelle Table</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .toggle-wrap -->
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
                                    <div class="form-wrap w-150px">
                                        <select class="form-select form-select-sm" data-search="off" data-placeholder="Bulk Action">
                                            <option value="">Bulk Action</option>
                                            <option value="email">Send Email</option>
                                            <option value="suspend">Suspend Customer</option>
                                            <option value="delete">Delete Customer</option>
                                        </select>
                                    </div>
                                    <div class="btn-wrap">
                                        <span class="d-none d-md-block"><button class="btn btn-dim btn-outline-light disabled">Apply</button></span>
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
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                                <div class="dot dot-primary"></div>
                                                                <em class="icon ni ni-filter-alt"></em>
                                                            </a>
                                                            <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                                <div class="dropdown-head">
                                                                    <span class="sub-title dropdown-title">Filter Customers</span>
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
                                                                    <a class="clickable" href="#">Reset Filter</a>
                                                                    <a href="#">Save Filter</a>
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
                                    <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                    <form action="" method="get">
                                    <input type="text" class="form-control border-transparent form-focus-none" name="id" placeholder="Search by customer or email">
                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                    </form>
                                   
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
                                <div class="nk-tb-col"><span class="sub-text">Nom de la table</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Capacité</span></div>
                                <div class="nk-tb-col nk-tb-col-tools text-right">

                                </div>
                            </div>
                            <!-- .nk-tb-item -->
                            @if(isset($data['tables']))
                                @foreach($data['tables'] as $key => $item)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="uid{{$key}}">
                                                <label class="custom-control-label" for="uid{{$key}}"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>{{substr($item->name,0,2)}}</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">{{$item->name}}  <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span>{{$item->capacity}} </span>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden">
                                                    <button class="btn btn-trigger btn-icon" onclick="tableEdit({{$item->id}})" data-toggle="tooltip" data-placement="top" title="edit">
                                                        <em class="icon ni ni-edit"></em>
                                                    </button>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <form action="{{route('table.destroy',$item->id)}}" method="post">
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
                                                                <li><a href="javascript:tableEdit({{$item->id}})" ><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                <li>
                                                                    <form action="{{route('table.destroy',$item->id)}}" method="post">
                                                                        @csrf()
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-link"   ><em class="icon ni ni-trash"></em><span>Delete</span></button>
                                                                    </form>
                                                                </li>
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
                    {{ $data['tables']->links('vendor.pagination.custom')}}
                    <!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    </div>
    <!-- .Add Modal-Content -->
    <div class="modal fade" id="ModelAddTable">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Nouvelle Table</h5>
                    <form id="add_form_table" method="post" class="mt-2" autocomplete="off">
                        @csrf()
                        <div class="row g-gs">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nom de la table</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="" name="name" placeholder="Nom ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="add-name">Capacité</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" name="capacity" id="" placeholder="5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button  type="button" id="addTable" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- .Edit Modal-Content -->
    <div class="modal fade " id="ModelEditTable">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Modifer Table</h5>
                    <form id="edit_form_table" method="post" class="mt-2" autocomplete="off">
                        @csrf()
                        @method('PUT')
                        <div class="row g-gs">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nom de la table</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom ">
                                        <input type="hidden" id="id" name="id" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="capacity">Capacité</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="capacity" name="capacity" placeholder="5">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button  type="button"  id="editTableButton" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->

@endsection
