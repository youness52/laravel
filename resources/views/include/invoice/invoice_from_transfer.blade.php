

<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Convertir le {{$data['invoice']['type']['name']}} #{{$data['invoice']['code']}}</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="modal-body">
                    <form id="kt_convertir_invoice_form"  enctype="multipart/form-data">
                    @csrf()
                    <div class="form-group row mb-4">
                        <label class="col-md-4 col-sm-12 col-form-label text-lg-right" for="reference">Convertir <span class="font-weight-bolder text-danger">*</span></label>
                        <div class="col-md-7 col-sm-12">
                            <input type="text" class="form-control form-control-solid"  readonly value="{{$data['invoice']['code']}}" name="code" />
                        </div>
                    </div>
                    <div class="form-group row mb-4 ">
                        <label class="col-md-4 col-sm-12 col-form-label text-lg-right" for="type">En <span class="font-weight-bolder text-danger">*</span></label>
                        <div class="col-md-7 col-sm-12 error-container">
                            <select name="invoice_type_id" data-control="select2" required data-placeholder="" class="form-select form-select-solid">
                                @isset($data['invoiceType'])
                                    @foreach($data['invoiceType'] as $item)
                                        <option value="{{$item->id}}"  >{{$item->name}} </option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label class="col-md-4 col-sm-12 col-form-label text-lg-right" for="send_at">Date <span class="font-weight-bolder text-danger">*</span></label>
                        <div class="col-md-7 col-sm-12  error-container">
                            <input class="form-control form-control-solid datepicker" id="" placeholder="date" required name="due_date" />
                        </div>
                    </div>
                    </form>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                <button type="button"  id="save_convertir_invoice" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
