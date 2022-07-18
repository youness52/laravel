<form id="kt_invoice_form" enctype="multipart/form-data">
    @csrf()
    @method('put')
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->

        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <!--begin::Card-->
            <div class="card card-flush shadow">
                <!--begin::Card body-->
                <div class="card-body p-lg-20" bis_skin_checked="1">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column flex-xl-row" bis_skin_checked="1">
                        <!--begin::Content-->
                        <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0" bis_skin_checked="1">
                            <!--begin::Invoice 2 content-->
                            <div class="mt-n1" bis_skin_checked="1">

                                <!--begin::Wrapper-->
                                <div class="m-0" bis_skin_checked="1">
                                    <!--begin::Label-->
                                    <div class="fw-bolder fs-3 text-gray-800 mb-8" bis_skin_checked="1">DOCUMENT N° #{{$data['invoice']['code']}}</div>
                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row g-5 mb-11" bis_skin_checked="1">
                                        <!--end::Col-->
                                        <div class="col-sm-6" bis_skin_checked="1">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1" bis_skin_checked="1">Date d'émission:</div>
                                            <!--end::Label-->
                                            <!--end::Col-->
                                            <div class="fw-bolder fs-6 text-gray-800" bis_skin_checked="1">{{$data['invoice']['due_date']}}</div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6" bis_skin_checked="1">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1" bis_skin_checked="1">Date d'échéance:</div>
                                            <!--end::Label-->
                                            <!--end::Info-->
                                            <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap" bis_skin_checked="1">
                                                <span class="pe-2">{{$data['invoice']['commande_date']}}</span>

                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6" bis_skin_checked="1">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1" bis_skin_checked="1">Date fin paiement:</div>
                                            <!--end::Label-->
                                            <!--end::Info-->
                                            <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap" bis_skin_checked="1">
                                                <span class="pe-2">{{$data['invoice']['payment_date']}}</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6" bis_skin_checked="1">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1" bis_skin_checked="1">Date de livraison</div>
                                            <!--end::Label-->
                                            <!--end::Info-->
                                            <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap" bis_skin_checked="1">
                                                <span class="pe-2">{{$data['invoice']['commande_date']}}</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6" bis_skin_checked="1">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1" bis_skin_checked="1">Date de Réception</div>
                                            <!--end::Label-->
                                            <!--end::Info-->
                                            <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap" bis_skin_checked="1">
                                                <span class="pe-2">{{$data['invoice']['reception_date'] }}</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6" bis_skin_checked="1">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1" bis_skin_checked="1">Numéro de Facture</div>
                                            <!--end::Label-->
                                            <!--end::Info-->
                                            <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap" bis_skin_checked="1">
                                                <span class="pe-2">{{$data['invoice']['document_number']}}</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6" bis_skin_checked="1">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1" bis_skin_checked="1">Bon de Commande</div>
                                            <!--end::Label-->
                                            <!--end::Info-->
                                            <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center flex-wrap" bis_skin_checked="1">
                                                <span class="pe-2">{{$data['invoice']['document_number']}}</span>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row g-5 mb-12" bis_skin_checked="1">
                                        <!--end::Col-->
                                        <div class="col-sm-6" bis_skin_checked="1">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1" bis_skin_checked="1">Merchant :</div>
                                            <!--end::Label-->
                                            <!--end::Text-->
                                            <div class="fw-bolder fs-6 text-gray-800" bis_skin_checked="1">e-factures Inc.</div>
                                            <!--end::Text-->
                                            <!--end::Description-->
                                            <div class="fw-bold fs-7 text-gray-600" bis_skin_checked="1">N° 8 Lait ben saad,Tanger Maroc
                                                <br>e-factures, MI 48150</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Col-->
                                        <div class="col-sm-6" bis_skin_checked="1">
                                            <!--end::Label-->
                                            <div class="fw-bold fs-7 text-gray-600 mb-1" bis_skin_checked="1">Compte :</div>
                                            <!--end::Label-->
                                            <!--end::Text-->
                                            <div class="fw-bolder fs-6 text-gray-800" bis_skin_checked="1">{{$data['invoice']['account']['name']}}.</div>
                                            <!--end::Text-->
                                            <!--end::Description-->
                                            <div class="fw-bold fs-7 text-gray-600" bis_skin_checked="1">{{$data['invoice']['account']['address'] .' '.$data['invoice']['account']['country']['name'].','.$data['invoice']['account']['city'].' '.$data['invoice']['account']['zipcode'] }}.
                                                <br>{{$data['invoice']['account']['name']}}, {{$data['invoice']['account']['rc']}}</div>
                                            <!--end::Description-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Content-->
                                    <div class="flex-grow-1" bis_skin_checked="1">
                                        <!--begin::Table-->
                                        <div class="table-responsive border-bottom mb-9" bis_skin_checked="1">
                                            <table class="table mb-3">
                                                <thead>
                                                <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                    <th class="min-w-175px pb-2">DÉSIGNATION</th>
                                                    <th class="min-w-70px text-end pb-2">UNITÉ</th>
                                                    <th class="min-w-80px text-end pb-2">QUANTITÉ</th>
                                                    <th class="min-w-100px text-end pb-2">PRIX</th>
                                                    <th class="min-w-100px text-end pb-2">TOTAL</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($data['invoice']['items']))
                                                    @foreach($data['invoice']['items'] as $key =>$item)
                                                <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                                    <td class="d-flex align-items-center pt-6">
                                                        <i class="fa fa-genderless text-dark fs-2 me-2"></i>{{$item->description}}</td>
                                                    <td class="pt-6">{{ $item->unit->unit}}</td>
                                                    <td class="pt-6">{{ $item->quantity}}</td>
                                                    <td class="pt-6 text-dark fw-boldest">{{ $item->price}}</td>
                                                    <td class="pt-6 text-dark fw-boldest">{{ $item->quantity * $item->quantity }}</td>
                                                </tr>
                                                    @endforeach
                                                @endif

                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                        <!--begin::Container-->
                                        <div class="d-flex justify-content-end" bis_skin_checked="1">
                                            <!--begin::Section-->
                                            <div class="mw-300px" bis_skin_checked="1">
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-3" bis_skin_checked="1">
                                                    <!--begin::Accountname-->
                                                    <div class="fw-bold pe-10 text-gray-600 fs-7" bis_skin_checked="1">Subtotal:</div>
                                                    <!--end::Accountname-->
                                                    <!--begin::Label-->
                                                    <div class="text-end fw-bolder fs-6 text-gray-800" bis_skin_checked="1">{{$data['invoice']['currency']['code']}} {{$data['invoice']['amount']}}</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-3" bis_skin_checked="1">
                                                    <!--begin::Accountname-->
                                                    <div class="fw-bold pe-10 text-gray-600 fs-7" bis_skin_checked="1">VAT 0%</div>
                                                    <!--end::Accountname-->
                                                    <!--begin::Label-->
                                                    <div class="text-end fw-bolder fs-6 text-gray-800" bis_skin_checked="1">{{$data['invoice']['currency']['code']}} 0.00</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack mb-3" bis_skin_checked="1">
                                                    <!--begin::Accountnumber-->
                                                    <div class="fw-bold pe-10 text-gray-600 fs-7" bis_skin_checked="1">Subtotal + VAT</div>
                                                    <!--end::Accountnumber-->
                                                    <!--begin::Number-->
                                                    <div class="text-end fw-bolder fs-6 text-gray-800" bis_skin_checked="1">{{$data['invoice']['currency']['code']}} {{$data['invoice']['amount']}}</div>
                                                    <!--end::Number-->
                                                </div>
                                                <!--end::Item-->
                                                <!--begin::Item-->
                                                <div class="d-flex flex-stack" bis_skin_checked="1">
                                                    <!--begin::Code-->
                                                    <div class="fw-bold pe-10 text-gray-600 fs-7" bis_skin_checked="1">Total</div>
                                                    <!--end::Code-->
                                                    <!--begin::Label-->
                                                    <div class="text-end fw-bolder fs-6 text-gray-800" bis_skin_checked="1">{{$data['invoice']['currency']['code']}} {{$data['invoice']['amount']}}</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Section-->
                                        </div>
                                        <!--end::Container-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Invoice 2 content-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Sidebar-->
                        <div class="m-0" bis_skin_checked="1">
                            <!--begin::Invoice 2 sidebar-->
                            <div class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten" bis_skin_checked="1">
                                <!--begin::Labels-->
                                <div class="mb-8 text-center text-uppercase" bis_skin_checked="1">
                                    <span class="w-50 badge badge-light-{{$data['invoice']['status']['color']}} fw-bolder fs-4">{{$data['invoice']['status']['name']}}</span>
                                </div>

                                <!--end::Labels-->
                                <div class="separator separator-dashed mb-8 "></div>

                                <!--begin::Title-->
                                <h6 class="mb-8 fw-boldest text-gray-600 text-hover-primary">DÉTAILS DE DOCUMENT </h6>
                                <!--end::Title-->
                                <!--begin::Item-->
                                @if($data['type']  ==='factures' ||  $data['type']  ==='achats')
                                <div class="mb-6" bis_skin_checked="1">
                                    <div class="fw-bold text-gray-600 fs-7" bis_skin_checked="1">Mode de Règlement:</div>
                                    <div class="fw-bolder text-gray-800 fs-6" bis_skin_checked="1">{{$data['invoice']['payement']['name']}}</div>
                                </div>
                                @endif
                                <!--end::Item-->
                            @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' ||  $data['type']  ==='achats')

                                <!--begin::Item-->
                                <div class="mb-6" bis_skin_checked="1">
                                    <div class="fw-bold text-gray-600 fs-7" bis_skin_checked="1">Account:</div>
                                    <div class="fw-bolder text-gray-800 fs-6" bis_skin_checked="1">Nl24IBAN34553477847370033
                                        <br>AMB NLANBZTC</div>
                                </div>
                                <!--end::Item-->
                                @endif
                            @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' ||  $data['type']  ==='achats')
                                <!--begin::Item-->
                                <div class="mb-6" bis_skin_checked="1">
                                    <div class="fw-bold text-gray-600 fs-7" bis_skin_checked="1">Devise :</div>
                                    <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center" bis_skin_checked="1">{{$data['invoice']['currency']['code']}}/{{$data['invoice']['currency']['name']}}
                                    </div>
                                </div>
                                <!--end::Item-->
                                @endif
                            @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' ||  $data['type']  ==='achats')
                                <!--begin::Item-->
                                <div class="mb-6" bis_skin_checked="1">
                                    <div class="fw-bold text-gray-600 fs-7" bis_skin_checked="1">Responsable :</div>
                                    <div class="fw-bolder fs-6 text-gray-800 d-flex align-items-center" bis_skin_checked="1">{{$data['invoice']['responsible']['name']}}
                                    </div>
                                </div>
                            @endif
                                <!--end::Item-->
                                <div class="separator separator-dashed mb-8 "></div>
                                <!--end::Separator-->
                                <!--begin::Actions-->
                                <div class="mb-0">
                                    <!--begin::Row-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <div class="col">
                                            <a href="#" class="btn btn-light btn-active-light-primary w-100">Preview</a>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col">
                                            <a href="#" class="btn btn-light btn-active-light-primary w-100">Download</a>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <button type="submit" href="#" class="btn btn-primary w-100" id="kt_invoice_submit_button">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen016.svg-->
                                        <span class="svg-icon svg-icon-3">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z" fill="black" />
															<path opacity="0.3" d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z" fill="black" />
														</svg>
													</span>
                                        <!--end::Svg Icon-->Send Invoice</button>
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Invoice 2 sidebar-->
                        </div>
                        <!--end::Sidebar-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Card body-->
            </div>

            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
</form>
