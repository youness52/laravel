<div class=" d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-fluid">
        <!--begin::card-->
        <form id="account_form"  >
            <div class="row gy-lg-5 g-xl-10">
            <div class="col-xl-6 mb-2  ">
                <!--begin::Card body-->
                <div class="card card-flush shadow">
                    <div class="card-body py-6">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Raison sociale</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-sm form-control-solid" placeholder="" name="raison_sociale" value="" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Référence</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" class="form-control form-control-sm form-control-solid" placeholder="" name="ref" value="" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">RC</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-sm form-control-solid" placeholder="" name="rc" />
                                    <!--end::Input-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">ICE</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-sm form-control-solid" placeholder="" name="ice" />
                                    <!--end::Input-->
                                </div>


                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="required">Email</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" class="form-control form-control-sm form-control-solid" placeholder="" name="email" value="example@bric.com" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="">Site Web</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="url" class="form-control form-control-sm form-control-solid" placeholder="" name="website" value="www.bric.ma" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold mb-2">Secteur d'activité</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-select-sm form-select-solid" data-control="select2"  name="activity_area_id" data-placeholder="Secteur d'activité ?">
                                    <option></option>
                                    @isset($data['activity_areas'])
                                        @foreach($data['activity_areas'] as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" required fs-6 fw-bold mb-2">Taille</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select form-control-sm form-select-solid" data-control="select2" name="taille" data-placeholder="Taille ?">
                                    <option></option>
                                    <option value="1" >1 salarié</option>
                                    <option value="2" >2 à 5 salariés</option>
                                    <option value="3" >6 à 9 salariés</option>
                                    <option value="4" >10 à 19 salariés</option>
                                    <option value="5" >20 à 49 salariés</option>
                                    <option value="6" >50 à 99 salariés</option>
                                    <option value="7" >Plus de 100 salariés</option>
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                </div>


                <!--end::Card body-->
            </div>
            <div class="col-xl-6 mb-2 ">
                <!--begin::Card body-->
                <div class="card shadow">
                    <div class="card-body py-6">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class=" fs-6 fw-bold mb-2">Fixe</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-sm form-control-solid" placeholder="" name="phone" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="">Portable</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-sm form-control-solid" placeholder="" name="mobile" value="" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="">Fax</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" class="form-control form-control-sm form-control-solid" placeholder="" name="fax" value="s" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="row mb-7">
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2 required">Devise</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-select-sm form-select-solid" name="currency_id" data-control="select2" data-placeholder="Devise ?">
                                            <option></option>
                                            @isset($data['currencies'])
                                                @foreach($data['currencies'] as $item)
                                                    <option value="{{$item->id}}">{{$item->name}} - {{$item->symbole}} </option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-6">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-bold mb-2">Remise</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" min="0" class="form-control form-control-sm form-control-solid" placeholder="" name="discount" />
                                        <!--end::Input-->
                                    </div>


                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="">Délai de paiement</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-control-sm form-select-solid" data-control="select2" name="payement_period_id" data-placeholder="Délai de paiement ?">
                                        <option></option>
                                        @isset($data['payment_periods'])
                                            @foreach($data['payment_periods'] as $item)
                                                <option value="{{$item->id}}">{{$item->name}} </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="">Moyen de paiement</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-control-sm form-select-solid" data-control="select2" name="payement_method_id" data-placeholder="Moyen de paiement?">
                                        <option></option>
                                        @isset($data['payment_methods'])
                                            @foreach($data['payment_methods'] as $item)
                                                <option value="{{$item->id}}">{{$item->name}} </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-3">Remarques</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <textarea class="form-control form-control-solid pb-5" placeholder="" name="note" rows="4" ></textarea>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                            </div>
                        </div>
                    </div>
                </div>


                <!--end::Card body-->
            </div>
            <div class="col-xl-12 mb-2 ">
                <!--begin::Card body-->
                <div class="card shadow">
                    <div class="card-body py-6">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fs-6 fw-bold mb-2">Adresse<small>(Facturation)</small></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-sm form-control-solid" placeholder="" name="address" value="" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="">Code postal</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" class="form-control form-control-sm form-control-solid" placeholder="" name="zipcode" value="" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->

                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2 required">Pays</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-select-sm form-select-solid" data-control="select2" name="country_id"  data-placeholder="Pays ?">
                                        <option></option>
                                        @isset($data['countries'])
                                            @foreach($data['countries'] as $item)
                                                <option value="{{$item->id}}">{{$item->name}} </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    <!--end::Input-->
                                </div>

                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="">Ville</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-sm form-control-solid" placeholder="" name="city" value="" />
                                    <!--end::Input-->
                                </div>

                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <div class="col-xl-12 mb-2 ">
                <!--begin::Card body-->
                <div class="card shadow">
                    <div class="card-body py-6">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class=" fs-6 fw-bold mb-2">Adresse <small>(Livraison)</small></label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-sm form-control-solid" placeholder="" name="address_delivery" value="" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span class="">Code postal</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" class="form-control form-control-sm form-control-solid" placeholder="" name="zipcode_delivery" value="" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="row mb-7">
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2">
                                        <span class="">Ville</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="city_delivery" value="" />
                                    <!--end::Input-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Label-->
                                    <label class="fs-6 fw-bold mb-2 required">Pays</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-group-sm form-select-solid" data-control="select2" name="country_id_delivery" data-placeholder="Pays ?">
                                        <option></option>
                                        @isset($data['countries'])
                                            @foreach($data['countries'] as $item)
                                                <option value="{{$item->id}}">{{$item->name}} </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    <!--end::Input-->
                                </div>



                            </div>
                            <!--end::Input group-->
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            </div>
        </form>
        <!--end::card-->
    </div>
    <!--end::Container-->
</div>

