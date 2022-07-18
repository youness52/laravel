@extends('layouts.master')

@section('title','Ventes')


@section('css')

@endsection

@section('javascript')

@endsection

@section('content')
    <div class="nk-content-inner">
    @include('notification.notification')
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Settings</h3>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div><!-- .nk-block-head -->
            <div class="nk-block nk-block-lg">
                <div class="card card-bordered">
                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#site"><em class="icon ni ni-laptop"></em><span>Général settings</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#admin"><em class="icon ni ni-laptop"></em><span>Imprimantes</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="site">
                            <div class="card-inner pt-0">
                                <h4 class="title nk-block-title">Général settings</h4>
                                <p>Voici le paramètre de base de votre magasin pour votre application.</p>
                                <form action="{{route('settings.store')}}" method="post" class="gy-3 form-settings">
                                    @csrf()
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="comp_name">Nom de l'entreprise</label>
                                                <span class="form-note">Précisez le nom de votre entreprise.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="comp_name" name="comp_name" value="{{$data['settings']['0']['value']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="comp_email">E-mail de l'entreprise</label>
                                                <span class="form-note">Indiquez l'adresse e-mail de votre entreprise.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="comp_email" name="comp_email"  value="{{$data['settings']['1']['value']}}" placeholder="info@FoodEasy.com">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="comp_copyright">Droit d'auteur de la société</label>
                                                <span class="form-note">Copyright information of your Company.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="comp_copyright" name="comp_copyright" value="{{$data['settings']['2']['value']}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="site_name">Descriptif du site</label>
                                                <span class="form-note">Décrivez votre site web.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control form-control" id="site_name" name="site_name">{{$data['settings']['3']['value']}} </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-lg-7">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary" data-target="#modalAlert" data-toggle="modal">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--tab pan -->
                        <div class="tab-pane" id="admin">
                            <div class="card-inner pt-0">
                                <h4 class="title nk-block-title">Imprimantes settings</h4>
                                <p>Voici le paramètre de base de votre Imprimante pour votre application.</p>
                                <form action="{{route('settings.store')}}" method="post" class="gy-3 form-settings">
                                    @csrf()
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="print_name_1">Imprimante (1)</label>
                                                <span class="form-note">Précisez le nom de votre Imprimante.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="print_name_1" name="print_name_1" value="{{$data['settings']['5']['value']}}" placeholder="Imprimante">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="print_ip_1">Ip Imprimante (1)</label>
                                                <span class="form-note">Précisez le Ip  de votre Imprimante. <small>192.168.1.254</small></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="print_ip_1"  name="print_ip_1"  value="{{$data['settings']['6']['value']}}" placeholder="192.168.1.254">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="print_name_2">Imprimante (2)</label>
                                                <span class="form-note">Précisez le nom de votre Imprimante.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="print_name_2" name="print_name_2" value="{{$data['settings']['7']['value']}}" placeholder="Imprimante">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="print_ip_2">Ip Imprimante (2)</label>
                                                <span class="form-note">Précisez le Ip  de votre Imprimante. <small>192.168.1.253</small></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="print_ip_2" name="print_ip_2" value="{{$data['settings']['8']['value']}}" placeholder="192.168.1.254">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="print_name_3">Imprimante (3)</label>
                                                <span class="form-note">Précisez le nom de votre Imprimante.</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="print_name_3" name="print_name_3" value="{{$data['settings']['9']['value']}}" placeholder="Imprimante">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-5">
                                            <div class="form-group">
                                                <label class="form-label" for="print_ip_3">Ip Imprimante (3)</label>
                                                <span class="form-note">Précisez le Ip  de votre Imprimante. <small>192.168.1.252</small></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="print_ip_3"  name="print_ip_3" value="{{$data['settings']['10']['value']}}" placeholder="192.168.1.252">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row g-3">
                                        <div class="col-lg-7">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary" data-target="#modalAlert" data-toggle="modal">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div><!-- .tab-content -->
                </div>
                <!--card-->
            </div>
            <!--nk-block-->
        </div>
    </div>

@endsection
