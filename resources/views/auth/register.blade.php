<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../../">
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>Register | FoodEasy Admin</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="/assets/css/dashlite.css?ver=2.9.1">
    <link id="skin-default" rel="stylesheet" href="/assets/css/theme.css?ver=2.9.1">
</head>

<body class="nk-body bg-white npc-general pg-auth">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-split nk-split-page nk-split-md">
                    <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                        <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                            <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em class="icon ni ni-info"></em></a>
                        </div>
                        <div class="nk-block nk-block-middle nk-auth-body">
                            <div class="brand-logo pb-5">
                                <a href="" class="logo-link">
                                </a>
                            </div>
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title">S'inscrire</h5>
                                    <div class="nk-block-des">
                                        <p>Créer un nouveau compte FoodEasy</p>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <form action="{{route('register')}}" method="post">
                                @csrf()
                                <div class="form-group">
                                    <label class="form-label" for="name">Nom</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email </label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email address ">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">Passcode</label>
                                    <div class="form-control-wrap">
                                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" class="form-control form-control-lg @error('email') is-invalid @enderror" id="password" name="password" placeholder="Enter your passcode">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-control-xs custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox">
                                        <label class="custom-control-label" for="checkbox">Je suis d'accord pour FoodEasy <a tabindex="-1" href="#">Politique de confidentialité</a> &amp; <a tabindex="-1" href="#"> Terms.</a></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Register</button>
                                </div>
                            </form><!-- form -->
                            <div class="form-note-s2 pt-4">Vous avez déjà un compte? ? <a href="{{route('login')}}"><strong>Connectez-vous à la place</strong></a>
                            </div>

                        </div><!-- .nk-block -->
                        <div class="nk-block nk-auth-footer">
                            <div class="nk-block-between">
                                <ul class="nav nav-sm">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Termes et conditions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Politique de confidentialité</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">aider</a>
                                    </li>
                                </ul><!-- .nav -->
                            </div>
                            <div class="mt-3">
                                <p>&copy; 2022 FoodEasy. All Rights Reserved.</p>
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- nk-split-content -->
                    <div class="nk-split-content nk-split-stretch bg-abstract"></div><!-- nk-split-content -->
                </div><!-- nk-split -->
            </div>
            <!-- wrap @e -->
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="./assets/js/bundle.js?ver=2.9.1"></script>
<script src="./assets/js/scripts.js?ver=2.9.1"></script>

</html>
