@extends('layouts.master')

@section('title','Personnels')


@section('css')

@endsection

@section('javascript')


@endsection


@section('content')
    <div class="nk-content-body">
        <form id="" method="post" action="{{route('employees.store')}}" autocomplete="off" enctype="multipart/form-data" >
            @csrf()
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Ajouter un Personnel</h3>
                        <div class="nk-block-des text-soft">
                            <p>Vous avez un total de 2 595 Personnels.</p>
                        </div>
                    </div>
                    <!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class=" nk-block">
                            <button type="submit" class=" btn btn-icon btn-primary" ><em class="icon ni ni-save"></em></button>
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
                                            <label class="form-label" for="nom">Nom</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="nom" name="nom" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="">prenom</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="date_naissance">Date de Naissance </label>
                                            <div class="form-control-wrap">

                                                <input type="date" class="form-control" id="date_naissance" name="date_naissance" required >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="situation_familiale">Situation Familiale	 </label>
                                            <div class="form-control-wrap">
                                                <select class="form-control form-select"  name="situation_familiale" id="situation_familialev"  required>
                                                    <option value="1" selected="">Célibataire</option>
                                                    <option value="2">Marié</option>
                                                    <option value="3">Divorcé</option>
                                                    <option value="4">Veuf</option>
                                                    <option value="5">Séparé</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="CIN">CIN </label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="CIN" name="CIN" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="cnss">CNSS </label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="cnss" name="cnss" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="tel">Téléphone</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="tel" name="tel" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fonction">Poste Occupé</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fonction" name="fonction" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="date_debut">Date d'entrée
                                            </label>
                                            <div class="form-control-wrap ">
                                                <div class="form-control-wrap">
                                                    <input type="date" class="form-control" id="date_debut" name="date_debut" required >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group py-2">
                                            <label class="form-label" for="date_fin">Date de Sortie</label>
                                            <div class="form-control-wrap ">
                                                <input type="date" class="form-control" id="date_fin" name="date_fin" >
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
                                            <label class="form-label" for="image">Image</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image" >
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label required" for="card">Carte nationale</label>
                                            <div class="form-control-wrap">
                                                <div class="custom-file">

                                                    <input type="file" class="custom-file-input" id="card" name="card" required>
                                                    <label class="custom-file-label" for="card">Choose file</label>
                                                </div>
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
