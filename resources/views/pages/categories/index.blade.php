@extends('layouts.master')

@section('title','Catégories')


@section('css')

@endsection

@section('javascript')
    <script>

        const formh = document.getElementById("add_form_category");
        formh.addEventListener("submit", (e) => {
            e.preventDefault();
            const formData = new FormData(formh);
            axios
                .post("{{route('category.store')}}", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    NioApp.Toast(response.data['message'], 'success');
                    $('#ModeladdCategory').modal('hide');
                    setTimeout(function () {
                        // redirectTo show page
                        location.reload()

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

        const edit_form_category = document.getElementById("edit_form_category");
        edit_form_category.addEventListener("submit", (e) => {
            e.preventDefault();
            const formData = new FormData(edit_form_category);
            const url= document.getElementById("edit_form_category").action;
            axios
                .post(url, formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    NioApp.Toast(response.data['message'], 'success');
                    $('#ModeleditCategory').modal('hide');
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


        const categoryEdit = (id)=>{
            instance.get(`admin/category/${id}/edit`)
                .then(function (response) {
                    // handle success
                    $('#name').val(response.data.name);
                    $('#CategoryTableButton').attr(`onClick`, "categoryUpdate('/admin/category/"+response.data.id+"','edit_form_category')");
                    $('#edit_form_category').attr(`action`,"/admin/category/update/"+response.data.id);
                    $('#ModeleditCategory').modal('show');

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
                    <h3 class="nk-block-title page-title">List des Catégories </h3>
                    <div class="nk-block-des text-soft">
                        <p>Vous avez un total de {{count($data['itemCategory'])}} catégories.</p>
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
                                                <li><a href="#" data-toggle="modal" data-target="#ModeladdCategory"><span> Nouvelle catégorie</span></a></li>
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
            <div class="row g-gs">

                    <!-- .nk-tb-item -->
                    @if(isset($data['itemCategory']))
                        @foreach($data['itemCategory'] as $key => $item)
                        <div class="col-sm-6 col-lg-4 col-xxl-3">

                        <div class="card card-bordered">
                                <div class="card-inner">
                                    <div class="team">
                                        <div class="user-card user-card-s2">
                                                <div class="" style="height: 80px;width: 80px">
                                                    <img width="100" src="/images/{{$item->image}}" alt="">
                                                </div>
                                            <div class="user-info text-uppercase font-weight-bold ">
                                                <h6 class=" text-center">{{$item->name}}</h6>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn btn-trigger btn-icon" onclick="categoryEdit({{$item->id}})" data-toggle="tooltip" data-placement="top" title="edit">
                                                        <em class="icon ni ni-edit"></em>
                                                    </button>
                                                    <form action="{{route('category.destroy',$item->id)}}" method="post">
                                                        @csrf()
                                                        @method('DELETE')
                                                        <button class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="delete">
                                                            <em class="icon ni ni-trash"></em>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .team -->
                                </div><!-- .card-inner -->
                            </div>
                        </div>
                    @endforeach
                @endif
                <!-- .nk-tb-item -->

            </div>

        </div><!-- .nk-block -->
    </div>
    <div class="modal fade" id="ModeleditCategory">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Modifer catégorie</h5>
                    <form id="edit_form_category" action="#" class="mt-2" enctype="multipart/form-data">
                        <div class="row g-gs">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nom de la catégorie</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imageFile" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button  type="submit" id="CategoryTableButton" class="btn btn-primary">Enregistrer</button>
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
                    <h5 class="modal-title"> Nouvelle catégorie</h5>
                    <form id="add_form_category" action="#" class="mt-2">
                        <div class="row g-gs">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nom de la catégorie</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="name" placeholder=" ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
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
