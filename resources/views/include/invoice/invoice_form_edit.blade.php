<form id="kt_invoice_form" enctype="multipart/form-data">
    @csrf()
    @method('put')
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->

        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <!--begin::Card-->
            <div class="card card-flush shadow">
                <!--begin::Card body-->
                <div class="card-body p-12">
                    <!--begin::Form-->
                    <!--begin::Wrapper-->
                    <div class="mb-0">
                        <!--begin::Row-->
                        <!--begin::Row-->
                        <div class="row gx-10 mb-5">
                            <!--begin::Input group-->
                            @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures'  || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' || $data['type']  ==='achats')
                                <div class="col-lg-6 mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Date d'émission</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid datepicker" id="" placeholder="Pick a date" value="{{$data['invoice']['due_date'] }}" required name="due_date" />
                                    <!--end::Input-->
                                </div>
                            @endif
                        <!--end::Input group-->
                            <!--begin::Input group-->
                            @if($data['type']  ==='factures')
                                <div class="col-lg-6 mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Date fin paiement</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input  class="form-control form-control-solid datepicker" placeholder="Pick a date" required value="{{$data['invoice']['payment_date']}}" name="payment_date"/>
                                    <!--end::Input-->
                                </div>
                            @endif
                        <!--end::Input group-->
                            <!--begin::Input group-->
                            @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' || $data['type']  ==='achats')
                                <div class="col-lg-6 mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Date d'échéance</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid datepicker" placeholder="Pick a date" required value="{{$data['invoice']['commande_date'] }}" name="commande_date" />
                                    <!--end::Input-->
                                </div>
                            @endif
                        <!--end::Input group-->
                            <!--begin::Input group-->
                            @if( $data['type']  ==='commandes' ||$data['type']  ==='livraisons')
                                <div class="col-lg-6 mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Date de livraison</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input  class="form-control form-control-solid datepicker" placeholder="Pick a date" value="{{$data['invoice']['commande_date']}}" required name="commande_date" />
                                    <!--end::Input-->
                                </div>
                            @endif
                        <!--end::Input group-->
                            <!--begin::Input group-->
                            @if(  $data['type']==='reception')
                                <div class="col-lg-6 mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Date de Réception</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input  class="form-control form-control-solid datepicker" placeholder="Pick a date" value="{{$data['invoice']['reception_date'] }}" required name="reception_date"  />
                                    <!--end::Input-->
                                </div>
                            @endif
                        <!--end::Input group-->
                            <!--begin::Input group-->
                            @if($data['type']  ==='factures'  || $data['type']  ==='achats')
                                <div class="col-lg-6 mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Numéro de Facture </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" required value="{{$data['invoice']['document_number']}}" name="document_number" />
                                    <!--end::Input-->
                                </div>
                            @endif
                        <!--end::Input group-->
                            <!--begin::Input group-->
                            @if( $data['type']  ==='commandes')
                                <div class="col-lg-6 mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Bon de Commande</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" required value="{{$data['invoice']['document_number']}}" name="document_number" />
                                    <!--end::Input-->
                                </div>
                            @endif
                        <!--end::Input group-->
                            <!--begin::Input group-->
                            @if(false)
                                <div class="col-lg-6 mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Destinataire</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" required  value="{{$data['invoice']['recipient']}}"  name="recipient" />
                                    <!--end::Input-->
                                </div>
                            @endif
                            @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' ||  $data['type']  ==='achats')
                                <div class="col-lg-12 mb-10">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold mb-2">Objet</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="" required name="object" value="{{$data['invoice']['object']}}" />
                                    <!--end::Input-->
                                </div>
                        @endif
                        <!--end::Input group-->

                            <!--begin::Table wrapper-->
                            <div class="table-responsive mb-10">
                                <!--begin::Table-->
                                <table class="table table-row-dashed  table-row-gray-300 gy-7" data-kt-element="items">
                                    <!--begin::Table head-->
                                    <thead>
                                    <tr class="text-start text-primary fw-bolder fs-5 text-uppercase gs-0 border-bottom border-gray-300">
                                        <th class="min-w-250px w-400px">DÉSIGNATION</th>
                                        <th class="min-w-100px w-75px">UNITÉ</th>
                                        <th class="min-w-100px w-100px">QUANTITÉ</th>
                                        <th class="min-w-150px w-150px text-end">PRIX</th>
                                        <th class="min-w-100px w-150px text-end">TOTAL</th>
                                        <th class="min-w-50px w-75px text-end"></th>
                                    </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody >
                                    @if(isset($data['invoice']['items']))
                                        @foreach($data['invoice']['items'] as $key =>$item)
                                            <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                                <td class="pe-7">
                                                    <input id="tags" type="text"  onkeyup="javascript:autoComplete($(this))" value="{{$item->description}}"  class="form-control form-control-solid mb-2 item_invoice_name" name="row[{{$key}}][name]" placeholder="Item name" />
                                                    <input type="hidden" class=" item_invoice_id d-none" name="row[{{$key}}][id]" value="{{$item->product_id}}" />
                                                </td>
                                                <td class="ps-0">
                                                    <select data-placeholder="Select currency" class="form-select form-select-solid  item_invoice_units"  name="row[{{$key}}][unity]" data-placeholder=" UNITÉ ?">
                                                        <option value="-1" selected>---</option>
                                                        @isset($data['units'])
                                                            @foreach($data['units'] as $unity)
                                                                <option value="{{$unity->id}}" @if($unity->id == $item->unit_id  ) selected @endif>{{$unity->symbol}} </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                </td>
                                                <td class="ps-0">
                                                    <input class="form-control form-control-solid item_invoice_quantity" type="number" min="0"  value="{{$item->quantity}}"   name="row[{{$key}}][quantity]" placeholder="0" data-kt-element="quantity" />
                                                </td>
                                                <td class="pt-8 text-end text-nowrap">
                                                    <input type="text" class="form-control form-control-solid text-end  item_invoice_price"  type="number" min="0"  value="{{$item->price}}"  name="row[{{$key}}][price]" placeholder="0.00"  data-kt-element="price" />
                                                </td>
                                                <td class="pt-10 font-weight-bold text-end text-nowrap">$
                                                    <span class=" fs-5" data-kt-element="total">{{$item->quantity * $item->price }}</span>
                                                </td>
                                                <td class="pt-5 text-end">
                                                    <button type="button" class="btn btn-sm btn-icon btn-active-color-danger" data-kt-element="remove-item">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
                                                    </svg>
												</span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                    <!--end::Table body-->
                                    <!--begin::Table foot-->
                                    <tfoot>
                                    <tr class="p-0 m-0">
                                        <th colspan="6" class="text-center p-0 m-0">
                                            <button class="btn btn-light-white p-2 m-0 text-uppercase font-weight-bolder " data-kt-element="add-item"><i class="fa fa-caret-left"></i>Add item <i class="  fa fa-caret-right fa-4x"></i></button>
                                        </th>
                                    </tr>
                                    <tr class=" align-top fs-6 fw-bolder text-gray-700">
                                        <th class="">
                                        </th>
                                        <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                                            <div class="d-flex flex-column align-items-start">
                                                <div class="fs-5">Montant Net HT	</div>
                                            </div>
                                        </th>
                                        <th colspan="2" class="border-bottom border-bottom-dashed text-end">$
                                            <span data-kt-element="sub-total">0.00</span>
                                        </th>
                                    </tr>
                                    <tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
                                        <th class="">
                                        </th>
                                        <th colspan="2" class="border-bottom border-bottom-dashed ps-0">
                                            <div class="d-flex flex-column align-items-start">
                                                <div class="fs-5">TVA		</div>
                                            </div>
                                        </th>
                                        <th colspan="2" class="border-bottom border-bottom-dashed text-end">
                                            <span data-kt-element="sub-total">0.00</span>
                                        </th>
                                    </tr>
                                    <tr class="align-top fw-bolder text-gray-700">
                                        <th></th>
                                        <th colspan="2" class="fs-4 ps-0">Total TTC (USD)	</th>
                                        <th colspan="2" class="text-end fs-4 text-nowrap">$
                                            <span data-kt-element="grand-total">0.00</span></th>
                                    </tr>
                                    </tfoot>
                                    <!--end::Table foot-->
                                </table>
                                <table class="table d-none " data-kt-element="item-template">
                                    <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                        <td class="pe-7">
                                            <input type="text"  onkeyup="javascript:autoComplete($(this))" required class="form-control form-control-solid mb-2 item_invoice_name  "  placeholder="Item name" />
                                            <input type="hidden" class=" item_invoice_id d-none"  name="" placeholder="Description" />
                                        </td>
                                        <td class="ps-0">
                                            <select class="form-select form-select-solid item_invoice_units " >
                                                <option value="-1" >---</option>
                                                @isset($data['units'])
                                                    @foreach($data['units'] as $item)
                                                        <option value="{{$item->id}}">{{$item->symbol}} </option>
                                                    @endforeach
                                                @endisset
                                            </select>
                                        </td>
                                        <td class="ps-0">
                                            <input class="form-control form-control-solid   item_invoice_quantity " type="number" min="0"  value="0"  placeholder="0" data-kt-element="quantity" />
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-solid text-end item_invoice_price "   value="0"  placeholder="0.00" data-kt-element="price" />
                                        </td>
                                        <td class="pt-8 text-end">$
                                            <span data-kt-element="total">0.00</span></td>
                                        <td class="pt-5 text-end">
                                            <button type="button" class="btn btn-sm btn-icon btn-active-color-danger" data-kt-element="remove-item">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black" />
																				<path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black" />
																				<path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black" />
																			</svg>
																		</span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--end::Table-->

                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Wrapper-->
                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>

            <!--end::Card-->
        </div>
        <!--end::Content-->
        <!--begin::Sidebar-->
        <div class="flex-lg-auto min-w-lg-300px">
            <!--begin::Card-->
            <div class="card shadow" data-kt-sticky="false" data-kt-sticky-name="invoice" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                <!--begin::Card body-->
                <div class="card-body p-10">
                    <!--begin::Input group-->
                    @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' ||  $data['type']  ==='achats')
                        <div class=" fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder fs-6 text-gray-700">Devise</label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="currency_id" aria-label="Select currency" data-control="select2" data-placeholder="Select currency"  class="form-select form-select-solid">
                                <option></option>
                                @isset($data['currencies'])
                                    @foreach($data['currencies'] as $item)
                                        <option value="{{$item->id}}" @if($data['invoice']['currency_id'] === $item->id) selected @endif>{{$item->name}} - {{$item->symbole}} </option>
                                    @endforeach
                                @endisset
                            </select>
                            <!--end::Select-->
                        </div>
                    @endif
                    @if($data['type']  ==='factures' ||  $data['type']  ==='achats')
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder fs-6 text-gray-700">Mode de Règlement </label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="payement_method_id" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid">
                                <option></option>
                                @isset($data['payment_methods'])
                                    @foreach($data['payment_methods'] as $item)
                                        <option value="{{$item->id}}" @if($data['invoice']['payement_method_id'] === $item->id) selected @endif>{{$item->name}} </option>
                                    @endforeach
                                @endisset
                            </select>
                            <!--end::Select-->
                        </div>
                    @endif
                    @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' ||  $data['type']  ==='achats')
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder fs-6 text-gray-700">Statut </label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="status_id" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select currency" class="form-select form-select-solid">
                                <option ></option>
                                @isset($data['status'])
                                    @foreach($data['status'] as $item)
                                        <option value="{{$item->id}}"  @if($data['invoice']['status_id'] === $item->id) selected @endif>{{$item->name}} </option>
                                    @endforeach
                                @endisset
                            </select>
                            <!--end::Select-->
                        </div>
                    @endif
                    @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' ||  $data['type']  ==='achats')
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder fs-6 text-gray-700">Compte   </label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="account_id" aria-label="Select a Timezone" data-control="select2" data-placeholder="Select Fournisseur" class="form-select form-select-solid">
                                <option></option>
                                @isset($data['accounts'])
                                    @foreach($data['accounts'] as $item)
                                        <option value="{{$item->id}}"  @if($data['invoice']['account_id'] === $item->id) selected @endif>{{$item->name}} </option>
                                    @endforeach
                                @endisset
                            </select>
                            <!--end::Select-->
                        </div>
                    @endif
                    @if($data['type'] ==='devis' || $data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' ||  $data['type']  ==='achats')
                        <div class="fv-row mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder fs-6 text-gray-700">Responsable   </label>
                            <!--end::Label-->
                            <!--begin::Select-->
                            <select name="users"  data-control="select2"   data-placeholder="Select User" class="form-select form-select-solid">
                                <option></option>
                                @isset($data['users'])
                                    @foreach($data['users'] as $item)
                                        <option value="{{$item->id}}" @if($data['invoice']['created_by'] === $item->id) selected @endif>{{$item->name}} </option>
                                    @endforeach
                                @endisset
                            </select>
                            <!--end::Select-->
                        </div>
                    @endif
                    <!--end::Input group-->
                    <!--begin::Separator-->
                    @if($data['type']  ==='commandes' ||$data['type']  ==='livraisons' ||$data['type']  ==='factures' || $data['type']==='bons' ||  $data['type']==='reception' ||  $data['type'] ==='demandes' ||  $data['type']  ==='achats')
                        <div class="separator separator-dashed mb-8"></div>
                        <!--end::Separator-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder fs-6 text-gray-700">Fichier </label>
                            <!--end::Label-->
                            <!--begin::input-->
                            <input type="file" class="form-control form-control-solid" placeholder="" required name="" />
                            <!--end::input-->
                        </div>
                    @endif
                <!--end::Input group-->
                    <!--begin::Separator-->
                    @if( request()->segment(4) == 'edit')
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
                    @endif

                <!--end::Actions-->
                </div>
                <!--end::Card body-->
            </div>

            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
    </div>
</form>
