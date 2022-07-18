@extends('layouts.master')

@section('title','Fournisseurs')


@section('css')

@endsection

@section('javascript')


@endsection

@section('content')
    <div class="nk-content-body">
        <form id="account_form" method="post" action="{{route('supplier.store')}}" autocomplete="off"  >
            @csrf()
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Ajouter un Fournisseur</h3>
                        <div class="nk-block-des text-soft">
                            <p>Vous avez un total de 2 595 Fournisseur.</p>
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
                                            <label class="form-label" for="raison_sociale">Raison sociale</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="raison_sociale" name="raison_sociale" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="">Référence</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="ref" name="ref" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="rc">RC</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="rc" name="rc" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="ice">ICE</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="fv-email" name="ice" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="iftax">Iftax</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="iftax" name="iftax" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="email" name="email" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="website">Site Web</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="website" name="website" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="activity_area_id">Secteur d'activité
                                            </label>
                                            <div class="form-control-wrap ">
                                                <select class="form-control form-select" id="activity_area_id" name="activity_area_id"  >
                                                    <option label="empty" value=""></option>
                                                    @isset($data['activity_areas'])
                                                        @foreach($data['activity_areas'] as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group py-2">
                                            <label class="form-label" for="taille">Taille</label>
                                            <div class="form-control-wrap ">
                                                <select class="form-control form-select" id="taille" name="taille" data-placeholder="Select a option" required>
                                                    <option label="empty" value=""></option>
                                                    <option value="1" >1 salarié</option>
                                                    <option value="2" >2 à 5 salariés</option>
                                                    <option value="3" >6 à 9 salariés</option>
                                                    <option value="4" >10 à 19 salariés</option>
                                                    <option value="5" >20 à 49 salariés</option>
                                                    <option value="6" >50 à 99 salariés</option>
                                                    <option value="7" >Plus de 100 salariés</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 col-md-6">
                        <div class="p-5 bg-white border border-light round-lg">
                            As soon as you start dragging an element, a <code>drag</code> event is fired
                            As soon as you start dragging an element, a <code>drag</code> event is fired
                        </div>

                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="phone">Fixe</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="phone" name="phone" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="mobile">Portable</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="mobile" name="mobile" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="fax">Fax</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="fax" name="fax" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="discount">Remise</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="discount" name="discount" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="note">Remarques</label>
                                            <div class="form-control-wrap">

                                                <textarea  class="form-control py-1" id="note" name="note" required rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 col-md-12">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row ">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-label" for="address">Adresse</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="address" name="address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label" for="fv-email">Code postal</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="city">Ville</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="city" name="city" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="country_id">Pays</label>
                                            <div class="form-control-wrap">
                                                <select class="form-control form-select" id="country_id" name="country_id" data-placeholder="Select a option" required>
                                                    <option></option>
                                                    @isset($data['countries'])
                                                        @foreach($data['countries'] as $item)
                                                            <option value="{{$item->id}}">{{$item->name}} </option>
                                                        @endforeach
                                                    @endisset
                                                </select>
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
