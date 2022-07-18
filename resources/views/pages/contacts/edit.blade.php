@extends('layouts.master')

@section('title','contact')


@section('css')

@endsection

@section('javascript')


@endsection

@section('content')
    <div class="nk-content-body">
        <form id="" method="post" action="{{route('contact.update',$data['contact']['id'])}}" autocomplete="off"  >
            @csrf()
            @method('PUT')
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Modification le Contact</h3>
                        <div class="nk-block-des text-soft">
                            <p>Vous avez un total de 23879 contacts.</p>
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
                    <div class="mb-2 col-md-9">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="fname">Prénom</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="fname" name="fname" value="{{old('fname',$data['contact']['fname'])}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="lname">Nom</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="lname" name="lname" value="{{old('lname',$data['contact']['lname'])}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group py-2">
                                            <label class="form-label" for="account_id">Compte</label>
                                            <div class="form-control-wrap ">
                                                <select class="form-select form-select-solid" data-control="select2" id="account_id"  name="account_id" data-placeholder="">
                                                    <option label="empty" value=""></option>
                                                @isset($data['accounts'])
                                                        @foreach($data['accounts'] as $item)
                                                            <option value="{{$item->id}}" {{ (old('account_id') == $item->id || $item->id ==$data['contact']['account_id']  ) ? "selected" : "" }} >{{ $item->ref  }} / {{ $item->name }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="job_title">Fonction</label>
                                            <div class="form-control-wrap">

                                                <input type="text" class="form-control" id="job_title" name="job_title" value="{{old('job_title',$data['contact']['job_title'])}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email</label>
                                            <div class="form-control-wrap">

                                                <input type="email" class="form-control" id="email" name="email" value="{{old('email',$data['contact']['email'])}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="mobile">Portable</label>
                                            <div class="form-control-wrap">

                                                <input type="tel" class="form-control" id="mobile" name="mobile" value="{{old('mobile',$data['contact']['mobile'])}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="phone">Téléphone</label>
                                            <div class="form-control-wrap">

                                                <input type="tel" class="form-control" id="phone" name="phone" value="{{old('phone',$data['contact']['phone'])}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="fax">Fax</label>
                                            <div class="form-control-wrap">

                                                <input type="tel" class="form-control" id="fax" name="fax" value="{{old('fax',$data['contact']['fax'])}}" >
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
                                                            <option value="{{$item->id}}" {{ (old('activity_area_id') == $item->id ||  $item->id ==$data['contact']['activity_area_id']  ) ? "selected" : "" }} >{{$item->name}}</option>
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
                    <div class="mb-2 col-md-3">
                        <div class="preview-icon-box card card-bordered">
                            <div class="preview-icon-wrap">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                    <rect x="5" y="7" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                    <rect x="25" y="27" width="60" height="56" rx="7" ry="7" fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                    <rect x="15" y="17" width="60" height="56" rx="7" ry="7" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                    <line x1="15" y1="29" x2="75" y2="29" fill="none" stroke="#6576ff" stroke-miterlimit="10" stroke-width="2"></line>
                                    <circle cx="53" cy="23" r="2" fill="#c4cefe"></circle>
                                    <circle cx="60" cy="23" r="2" fill="#c4cefe"></circle>
                                    <circle cx="67" cy="23" r="2" fill="#c4cefe"></circle>
                                    <rect x="22" y="39" width="20" height="20" rx="2" ry="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                    <circle cx="32" cy="45.81" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                                    <path d="M29,54.31a3,3,0,0,1,6,0" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    <line x1="49" y1="40" x2="69" y2="40" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                    <line x1="49" y1="51" x2="69" y2="51" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                    <line x1="49" y1="57" x2="59" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                    <line x1="64" y1="57" x2="66" y2="57" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                    <line x1="49" y1="46" x2="59" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                    <line x1="64" y1="46" x2="66" y2="46" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                </svg>
                            </div>
                        </div><!-- .preview-icon-box -->

                    </div>
                </div>

            </div>
            <!-- .nk-block -->
        </form>
    </div>

@endsection
