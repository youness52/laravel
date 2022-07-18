<div class="toolbar" id="">
    <!--begin::Container-->
    <div id="" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div  class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1 text-uppercase">{{$header}}</h1>
            <!--end::Title-->
            <!--begin::Separator-->
            <span class="h-20px border-gray-300 border-start mx-4"></span>
            <!--end::Separator-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                <!--begin::Item-->
                    @forelse($menu as  $item)
                    <li class="breadcrumb-item text-muted">
                        @if(isset($item['parameter']))
                            <a href="{{route($item['route'],$item['parameter'])}}" class="text-muted text-hover-primary">{{$item['title']}}</a>
                        @else
                            <a href="{{route($item['route'])}}" class="text-muted text-hover-primary">{{$item['title']}}</a>
                        @endif
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-300 w-5px h-2px"></span>
                    </li>
                    @empty

                    @endforelse
                <!--end::Item-->
                <li class="breadcrumb-item text-dark">{{$subTitle}}</li>
            </ul>
            <!--end::Breadcrumb-->
        </div>        <!--end::Page title-->
        <!--begin::Actions-->
        @if(!isset($Actions))
        <div class="d-flex align-items-center py-1">
            <!--begin::Wrapper-->
            @isset($filter)
            <div class="me-4">
                <!--begin::Menu-->
                <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                    <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
											</svg>
										</span>
                    <!--end::Svg Icon-->Filter</a>
                <!--begin::Menu 1-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_61484bf44d957">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Status:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_61484bf44d957" data-allow-clear="true">
                                    <option></option>
                                    <option value="1">Approved</option>
                                    <option value="2">Pending</option>
                                    <option value="2">In Process</option>
                                    <option value="2">Rejected</option>
                                </select>
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Member Type:</label>
                            <!--end::Label-->
                            <!--begin::Options-->
                            <div class="d-flex">
                                <!--begin::Options-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                    <input class="form-check-input" type="checkbox" value="1" />
                                    <span class="form-check-label">Author</span>
                                </label>
                                <!--end::Options-->
                                <!--begin::Options-->
                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                    <span class="form-check-label">Customer</span>
                                </label>
                                <!--end::Options-->
                            </div>
                            <!--end::Options-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-bold">Notifications:</label>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                <label class="form-check-label">Enabled</label>
                            </div>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
                <!--end::Menu-->
            </div>
            @endisset
            <!--end::Wrapper-->
            <!--begin::Button-->
            @isset($routeCreate)
                @if(isset($routeParameter))
                    <a href="{{route($routeCreate,$routeParameter)}}" class="fw-bolder fs-5 text-uppercase gs-0 btn btn-sm btn-primary" > Ajouter</a>
                @else
                    <a href="{{route($routeCreate)}}" class="fw-bolder fs-5 text-uppercase gs-0 btn btn-sm btn-primary" > Ajouter</a>
                @endif
                @endisset
            @isset($routeStore)
                @if(isset($routeParameter))
                    <button data-url="{{route($routeStore,$routeParameter)}}" id="{{$id}}" class="fw-bolder fs-5 text-uppercase gs-0 btn   btn-sm btn-primary  m-1" >
                    <span class="indicator-label">Enregistrer</span>
                        <span class="indicator-progress">S'il vous plaît, attendez... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                @else
                    <button data-url="{{route($routeStore)}}" id="{{$id}}" class="fw-bolder fs-5 text-uppercase gs-0 btn btn-sm btn-primary  m-1" >
                    <span class="indicator-label"> Enregistrer</span>
                        <span class="indicator-progress">S'il vous plaît, attendez... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                @endif
                    @if(isset($pdf))
                        <button data-url="" id="convertir_invoice" data-bs-toggle="modal" data-bs-target="#kt_modal_1"  class="fw-bolder fs-5 text-uppercase gs-0 btn btn-sm btn-warning  m-1" >
                            <span class="indicator-label">
                                Convertir
                            </span>
                            <span class="indicator-progress">S'il vous plaît, attendez... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button data-url="" id=""   class="fw-bolder fs-5 text-uppercase gs-0 btn btn-sm btn-danger  m-1" >
                            Pdf
                        </button>
                        <button data-url="" id=""   class="fw-bolder fs-5 text-uppercase gs-0 btn btn-sm btn-light-primary m-1" >
                            Envoyer
                        </button>


                    @endif

            @endisset
            @if(isset($pdfRoute))
                <a href="{{$pdfRoute}}" target="_blank"  class="fw-bolder fs-5 text-uppercase gs-0 btn btn-sm btn-danger  m-1" >
                    Pdf
                </a>
                <button data-url="" id=""   class="fw-bolder fs-5 text-uppercase gs-0 btn btn-sm btn-light-primary m-1" >
                    Envoyer
                </button>


        @endif
            <!--end::Button-->
        </div>
        @endif
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
