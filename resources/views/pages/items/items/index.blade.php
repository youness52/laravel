@extends('layouts.master')

@section('title','Menus')


@section('css')

@endsection

@section('javascript')
    <script>
        function wasDeselected (sel, val) {
            if (!val) {
                return true;
            }
            return sel && sel.some(function(d) { return val.indexOf(d) == -1; })
        }

        $(document).on('change', '#variante_id', function (event) {
            var message,
                $select = $(event.target),
                val     = $select.val(),
                sel     = $('select').data('selected')
            html    ="";


            // Store the array of selected elements
            $select.data('selected', val);

            // Check the previous and current val
            if ( wasDeselected(sel, val) ) {
                message = "You have deselected this item. val :"+val;
                alert(message)
            } else {
                message = "You have selected this item. val:"+val;
                html="";
                for (let i = 0; i < val.length; i++) {
                    html +='<div class="mb-2" bis_skin_checked="1">\n' +
                        '                                                        <label for="iBR-1627965164-'+val[i]+'" class="control-label  sm-text">\n' +
                        '                                                            Prix total de\n' +
                        '                                                            <span class="text-primary text-bold">\n' +
                        '                                                                '+$("#variante_id option[value='"+val[i]+"']").text()+'\n' +
                        '                                                            </span>\n' +
                        '                                                            variation\n' +
                        '                                                            <span class="text-primary">* </span><small class="text-secondary">(Entrez le prix dans MAD)</small>\n' +
                        '                                                        </label></div>\n' +
                        '                                                    <div class="mb-2" bis_skin_checked="1">\n' +
                        '                                                        <input type="number" step="0.01" min="0" class="form-control" id="variation_input'+val[i]+'" name="variation['+val[i]+']" placeholder="par exemple. Tapez le prix de cet article en \'MAD\'" required>\n' +
                        '                                                    </div>';
                }
                $('#div_variante_id').html(html);
            }
        });

        $("#variante_checked").change(function() {
            if(this.checked) {
                $('#content_variantes').html('  <div class="form-group row">\n' +
                    '                                    <label class="col -3 form-label">variantes</label>\n' +
                    '                                    <div class=" col-9 form-control-wrap">\n' +
                    '                                        <select class="form-control form-select" name="variante_id" id="variante_id" multiple >\n' +
                    '                                            <option label="empty" value=""></option>\n' +
                    '                                            @isset($data['variations'])' +
                    '                                                @foreach($data['variations'] as $item)\n' +
                    '                                                    <option value="{{$item->id}}">{{$item->name}}</option>\n' +
                    '                                                @endforeach' +
                    '                                            @endisset' +
                    '                                        </select>' +
                    '                                        <div class="my-2" id="">\n' +
                    '                                            <div class="card ml-0 mt-3 p-3 bg-light" bis_skin_checked="1">\n' +
                    '                                                <div class="card-header bg-danger text-white rounded-sm text-center" bis_skin_checked="1">\n' +
                    '                                                    Veuillez entrer le prix pour chaque variation\n' +
                    '                                                </div>\n' +
                    '                                                <div class="form-group mt-4" bis_skin_checked="1"  id="div_variante_id">\n' +
                    '\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '\n' +
                    '                                </div>')
                $('#variante_id').select2();

            }
            else{
                $('#content_variantes').html('')
            }
        });

        $("#propertie_checked").change(function() {
            if(this.checked) {
                $('#content_propertie').html(' <div class="form-group row">\n' +
                    '                                    <label class="col -3 form-label">propriétés</label>\n' +
                    '                                    <div class=" col-9 form-control-wrap">\n' +
                    '                                        <select class="form-control form-select" name="propertie[]" id="propertie_id" multiple >\n' +
                    '                                            <option label="empty" value=""></option>\n' +
                    '                                            @isset($data['properties'])\n' +
                    '                                                @foreach($data['properties'] as $item)\n' +
                    '                                                    <option value="{{$item->id}}">{{$item->name}}</option>\n' +
                    '                                                @endforeach\n' +
                    '                                            @endisset\n' +
                    '                                        </select>\n' +
                    '                                    </div>\n' +
                    '                                </div>')
                $('#propertie_id').select2();

            }
            else{
                $('#content_propertie').html('')
            }
        });
    </script>
    <script>

        $(document).on('change', '#variante_id_edit', function (event) {
            var message,
                $select = $(event.target),
                val     = $select.val(),
                sel     = $('select').data('selected')
            html    ="";


            // Store the array of selected elements
            $select.data('selected', val);

            // Check the previous and current val
            if ( wasDeselected(sel, val) ) {
                message = "You have deselected this item. val :"+val;
                alert(message)
            } else {
                message = "You have selected this item. val:"+val;
                html="";
                for (let i = 0; i < val.length; i++) {
                    html +='<div class="mb-2" bis_skin_checked="1">\n' +
                        '                                                        <label for="iBR-1627965164-'+val[i]+'" class="control-label  sm-text">\n' +
                        '                                                            Prix total de\n' +
                        '                                                            <span class="text-primary text-bold">\n' +
                        '                                                                '+$("#variante_id_edit option[value='"+val[i]+"']").text()+'\n' +
                        '                                                            </span>\n' +
                        '                                                            variation\n' +
                        '                                                            <span class="text-primary">* </span><small class="text-secondary">(Entrez le prix dans MAD)</small>\n' +
                        '                                                        </label></div>\n' +
                        '                                                    <div class="mb-2" bis_skin_checked="1">\n' +
                        '                                                        <input type="number" step="0.01" min="0" class="form-control" id="variation_input'+val[i]+'" name="variation['+val[i]+']" placeholder="par exemple. Tapez le prix de cet article en \'MAD\'" required>\n' +
                        '                                                    </div>';
                }
                $('#div_variante_id_edit').html(html);
            }
        });

        $("#variante_checked_edit").change(function() {
            if(this.checked) {
                $('#content_variantes_edit').html('  <div class="form-group row">\n' +
                    '                                    <label class="col -3 form-label">variantes</label>\n' +
                    '                                    <div class=" col-9 form-control-wrap">\n' +
                    '                                        <select class="form-control form-select" name="variante_id_edit" id="variante_id_edit" multiple >\n' +
                    '                                            <option label="empty" value=""></option>\n' +
                    '                                            @isset($data['variations'])' +
                    '                                                @foreach($data['variations'] as $item)\n' +
                    '                                                    <option value="{{$item->id}}">{{$item->name}}</option>\n' +
                    '                                                @endforeach' +
                    '                                            @endisset' +
                    '                                        </select>' +
                    '                                        <div class="my-2" id="">\n' +
                    '                                            <div class="card ml-0 mt-3 p-3 bg-light" bis_skin_checked="1">\n' +
                    '                                                <div class="card-header bg-danger text-white rounded-sm text-center" bis_skin_checked="1">\n' +
                    '                                                    Veuillez entrer le prix pour chaque variation\n' +
                    '                                                </div>\n' +
                    '                                                <div class="form-group mt-4" bis_skin_checked="1"  id="div_variante_id_edit">\n' +
                    '\n' +
                    '                                                </div>\n' +
                    '                                            </div>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '\n' +
                    '                                </div>')
                $('#variante_id_edit').select2();

            }
            else{
                $('#content_variantes_edit').html('')
            }
        });

        $("#propertie_checked_edit").change(function() {
            if(this.checked) {
                $('#content_propertie_edit').html(' <div class="form-group row">\n' +
                    '                                    <label class="col -3 form-label">propriétés</label>\n' +
                    '                                    <div class=" col-9 form-control-wrap">\n' +
                    '                                        <select class="form-control form-select" name="propertie[]" id="propertie_id_edit" multiple >\n' +
                    '                                            <option label="empty" value=""></option>\n' +
                    '                                            @isset($data['properties'])\n' +
                    '                                                @foreach($data['properties'] as $item)\n' +
                    '                                                    <option value="{{$item->id}}">{{$item->name}}</option>\n' +
                    '                                                @endforeach\n' +
                    '                                            @endisset\n' +
                    '                                        </select>\n' +
                    '                                    </div>\n' +
                    '                                </div>')
                $('#propertie_id_edit').select2();

            }
            else{
                $('#content_propertie_edit').html('')
            }
        });
    </script>
    <script>

        const form = document.getElementById("add_form_plate");
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            axios
                .post("{{route('item.store')}}", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    NioApp.Toast(response.data['message'], 'success');
                    $('#ModeladdCategory').modal('hide');
                    setTimeout(function () {
                        // redirectTo show page
                      //  location.reload()

                    }, 5000);
                    console.log(response);
                })
                .catch((error) => {
                    //show toastr error message
                    NioApp.Toast(error.message, 'error');
                    // handle error
                    console.log(error);
                });
        });

        const edit_form_category = document.getElementById("edit_form_plate");
        edit_form_category.addEventListener("submit", (e) => {
            e.preventDefault();
            const formData = new FormData(edit_form_category);
            const url= document.getElementById("edit_form_plate").action;
            axios
                .post(url, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    NioApp.Toast(response.data['message'], 'success');
                    $('#ModeleditPlate').modal('hide');
                    setTimeout(function () {
                        // redirectTo show page
                        location.reload()

                    }, 5000);
                })
                .catch((error) => {
                    //show toastr error message
                    NioApp.Toast(error.message, 'error');
                    // handle error
                    console.log(error);
                });
        });


        const plateEdit = (id)=>{
            instance.get(`admin/item/${id}/edit`)
                .then(function (response) {
                    // handle success
                    $('#name').val(response.data.name);
                    $('#description').val(response.data.description);
                    $('#status').val(response.data.status).change();
                    $('#price').val(response.data.price);
                    $('#quantity').val(response.data.quantity);
                    $('#category_id').val(response.data.item_category_id).change();
                    $('#edit_form_plate').attr(`action`,"/admin/item/update/"+response.data.id);
                    $('#ModeleditPlate').modal('show');

                    $('#propertie_checked_edit').attr("checked",true).change();
                    $('#variante_checked_edit').attr("checked",true).change();

                    if (response.data.propertie.length){
                        let dataProp= response.data.propertie.map((prop)=>{
                            return prop.id
                        });
                        $('#propertie_id_edit').val(dataProp);
                        $('#propertie_id_edit').trigger('change'); //
                    }

                    if (response.data.variation.length){
                        let dataProp= response.data.variation.map((prop)=>{
                            return  prop.id
                        });
                        $('#variante_id_edit').val(dataProp);
                        $('#variante_id_edit').trigger('change'); // variation_input'+val[i]+

                         response.data.variation.map((prop)=>{
                             $('#variation_input'+prop.id).val(prop.pivot.price);
                        });
                    }



                })
                .catch(function (error) {
                    //show toastr error message
                    NioApp.Toast(error.message, 'error');
                    // handle error
                    console.log(error);
                });
        };


    </script>



@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content-body">
    @include('notification.notification')
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Menus </h3>
                    <div class="nk-block-des text-soft">
                        <p>Vous avez un total de 25 plat.</p>
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
                                                <li><a href="#" data-toggle="modal" data-target="#ModeladdCategory"><span>Nouvelle plat</span></a></li>
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
                                    <input type="text" class="form-control border-transparent form-focus-none" name="id" placeholder="Search by name">
                                    <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                    </form></div>
                            </div>
                        </div><!-- .card-search -->
                    </div><!-- .card-inner -->
                    <div class="card-inner p-0">
                        <div class="nk-tb-list nk-tb-ulist">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col"><span class="sub-text">Nom de la plat</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Catégorie</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Description</span></div>
                                <div class="nk-tb-col tb-col-lg text-nowrap"><span class="sub-text">Prix</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Statut</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">A des propriétés</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">A des variantes ?</span></div>
                                <div class="nk-tb-col nk-tb-col-tools text-right">

                                </div>
                            </div>
                            <!-- .nk-tb-item -->
                            @if(isset($data['items']))
                                @foreach($data['items'] as $key => $item)
                                    <div class="nk-tb-item">

                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>
                                                        {{ substr($item->name, 0,2)}}
                                                    </span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="tb-lead">{{$item->name}}  <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="nk-tb-col tb-col-lg">
                                            <span>{{$item->item_category_id}} </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span>{{$item->description}} </span>
                                        </div>
                                        <div class=" text-nowrap nk-tb-col tb-col-mb text-success font-weight-bold">
                                            <span>{{$item->price}} MAD </span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span> <span class=" badge badge-dim   @if( $item->status== "Active") badge-primary  @else badge-danger @endif ">{{$item->status}}</span></span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span> <span class=" badge badge-dim   @if( count($item->propertie)) badge-primary  @else badge-danger @endif ">{{ (count($item->propertie)?"Oui":"No")}}</span></span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span> <span class=" badge badge-dim   @if( count($item->variation) ) badge-primary  @else badge-danger @endif ">{{ (count($item->variation)?"Oui":"No")}}</span></span>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1">
                                                <li class="nk-tb-action-hidden">
                                                    <button class="btn btn-trigger btn-icon" onclick="plateEdit({{$item->id}})" data-toggle="tooltip" data-placement="top" title="edit">
                                                        <em class="icon ni ni-edit"></em>
                                                    </button>
                                                </li>
                                                <li class="nk-tb-action-hidden">
                                                    <form action="{{route('item.destroy',$item->id)}}" method="post">
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
                                                                <li><a href="javascript:plateEdit({{$item->id}})" ><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                <li>
                                                                    <form action="{{route('item.destroy',$item->id)}}" method="post">
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
                {{ $data['items']->links('vendor.pagination.custom')}}

                <!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div><!-- .nk-block -->


        <div class="nk-block d-none">
            <div class="row g-gs">
                    <!-- .nk-tb-item -->
                    @if(isset($data['items']))
                        @foreach($data['items'] as $key  => $item)
                        <div class="col-sm-6 col-md-4 ">
                            <div class="card">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="team-options">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="javascript:plateEdit({{$item->id}})"><em class="icon ni ni-edit"></em><span>Modifer</span></a></li>
                                                        <li>
                                                            <form action="{{route('item.destroy',$item->id)}}" method="post">
                                                                @csrf()
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-link"   ><em class="icon ni ni-trash"></em><span>Delete</span></button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-card user-card-s2">
                                            <div class="" style="height: 80px;width: 80px">
                                                <img width="100" src="/images/{{$item->image}}" alt="">
                                            </div>
                                            <div class="user-info text-uppercase">
                                                <h6>{{$item->name}}</h6>
                                            </div>
                                        </div>
                                        <ul class="team-info">
                                            <li><span>Catégorie </span><span>{{$item->item_category_id}}</span></li>
                                            <li><span>Prix</span><span>{{$item->price}}</span></li>
                                            <li><span>Quantité</span><span>{{$item->quantity}}</span></li>
                                            <li><span>Status</span>
                                                <span> <span class=" badge badge-dim   @if( $item->status== "Active") badge-primary  @else badge-danger @endif ">{{$item->status}}</span></span>
                                            </li>
                                            <li><span>Description</span><span>
                                                    <div class="team-view">
                                            <a class="switch-text" data-toggle="collapse" href="#collapseDes{{$key}}" aria-expanded="true">
                                                <div class=" ">Afficher</div>
                                            </a>
                                        </div>

                                                </span></li>
                                        </ul>

                                        <div class="collapse " id="collapseDes{{$key}}">
                                            <div class="divider"></div>
                                            <div class="rating-card$key-description">
                                                <p class="text-muted">{{$item->description}}</p>
                                            </div>
                                        </div>

                                    </div><!-- .team -->
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div>
                    @endforeach
                @endif
                <!-- .nk-tb-item -->

            </div>

        </div><!-- .nk-block -->
    </div>


    <div class="modal fade " id="ModeleditPlate">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Modifer plat</h5>
                    <form id="edit_form_plate" action="#" class="mt-2" enctype="multipart/form-data">
                        <div class="row g-gs">
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="name">Nom de la plat</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <input type="text" class="form-control" name="name" id="name" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="category_id">Catégorie</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <select class="form-control form-select" name="category_id" id="category_id"  >
                                            <option label="empty" value=""></option>
                                            @isset($data['itemCategory'])
                                                @foreach($data['itemCategory'] as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="name">Statut</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <select class="form-control form-select"  name="status" id="status"  >
                                            <option label="empty" value=""></option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="name">Prix</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <input type="number" step="0.01" class="form-control" name="price" id="price" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="quantity">Quantité</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <input type="number" step="0.01" class="form-control" name="quantity" id="quantity" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="form-label col-md-3" for="image">Image</label>
                                    <div class="form-control-wrap col-md-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="description">Description</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 row ">
                                <div class="col-md-3">
                                    <label class=" form-label" for="">A des propriétés</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="ml-1 custom-control-input" id="propertie_checked_edit">
                                        <label class="custom-control-label" for="propertie_checked_edit"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 " id="content_propertie_edit">

                            </div>
                            <div class="col-md-12 row ">
                                <div class="col-md-3">
                                    <label class=" form-label" for="">A des variantes ?</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="ml-1 custom-control-input" id="variante_checked_edit">
                                        <label class="custom-control-label" for="variante_checked_edit"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 " id="content_variantes_edit">

                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <button  type="submit" id="addItemCategory" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div><!-- .Edit Modal-Content -->

    <div class="modal fade" id="ModeladdCategory">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title"> Nouvelle plat</h5>
                    <form id="add_form_plate" action="#" class="mt-2">
                        <div class="row g-gs">
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="name">Nom de la plat</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <input type="text" class="form-control" name="name" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="category_id">Catégorie</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <select class="form-control form-select" name="category_id"  >
                                            <option label="empty" value=""></option>
                                            @isset($data['itemCategory'])
                                                @foreach($data['itemCategory'] as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="status">Statut</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <select class="form-control form-select"  name="status"  >
                                            <option label="empty" value=""></option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="price">Prix</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <input type="number" step="0.01" class="form-control" name="price"   placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="quantity">Quantité</label>
                                    <div class="col-md-9 form-control-wrap">
                                        <input type="number" step="0.01" class="form-control" name="quantity"   placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="form-label col-md-3" for="image">Image</label>
                                    <div class="form-control-wrap col-md-9">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row ">
                                    <label class="col-md-3 form-label" for="">Description</label>
                                    <div class="col-md-9 form-control-wrap">
                                       <textarea class="form-control" id="" name="description" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 row ">
                                <div class="col-md-3">
                                    <label class=" form-label" for="">A des propriétés</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="ml-1 custom-control-input" name="propertie" id="propertie_checked">
                                        <label class="custom-control-label" for="propertie_checked"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 " id="content_propertie">

                            </div>
                            <div class="col-md-12 row ">
                                <div class="col-md-3">
                                    <label class=" form-label" for="">A des variantes ?</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="ml-1 custom-control-input"  name="variante" id="variante_checked">
                                        <label class="custom-control-label" for="variante_checked"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 " id="content_variantes">

                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button  type="submit" id="addItemCategory" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .Add Modal-Content -->
    <!-- content @e -->

@endsection
