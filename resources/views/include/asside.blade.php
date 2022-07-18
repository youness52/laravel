<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
        <div class="nk-sidebar-brand">
            <a href="" class="logo-link nk-sidebar-logo">
                <span class="ff-base fw-medium">FoodEasy</span>
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item active ">
                        <a href="/admin/home" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                            <span class="nk-menu-text">Tableau de bord </span>
                        </a>
                    </li>
                    <li class="nk-menu-item active ">
                        <a href="/admin/revenu" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                            <span class="nk-menu-text">Revenu </span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Gestion de la relation</h6>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-item @if(route('client.index')) active @endif ">
                        <a href="{{route('client.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                            <span class="nk-menu-text">Clients </span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-item @if(route(('supplier.index'))) active @endif">
                        <a href="{{route('supplier.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Fournisseur</span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->
                    <li  class="nk-menu-item @if(route(('contact.index'))) active @endif">
                        <a href="{{route('contact.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-alt-fill"></em></span>
                            <span class="nk-menu-text">Comptes</span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Gestion des RH </h6>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-item">
                        <a  href="{{route('employees.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-user-list-fill"></em></span>
                            <span class="nk-menu-text">Dossier des Personnels </span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Gestion Des Utilisateurs</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('user.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                            <span class="nk-menu-text">Utilisateur</span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Gestion de Stock</h6>
                    </li>
                    <!-- .nk-menu-item -->
                    <li  class="nk-menu-item @if(route(('product.index'))) active @endif">
                        <a href="{{route('product.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-list-thumb-alt-fill"></em></span>
                            <span class="nk-menu-text">Articles / Materials </span>
                        </a>
                    </li>
                    <!-- <li class="nk-menu-item">
                        <a href="{{route('product.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-puzzle-fill"></em></span>
                            <span class="nk-menu-text">Material  </span>
                        </a>
                    </li> -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Gestion De Restaurant</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('table.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-puzzle-fill"></em></span>
                            <span class="nk-menu-text">Tables</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{route('category.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-puzzle-fill"></em></span>
                            <span class="nk-menu-text">Catégories</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('propertie.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-puzzle-fill"></em></span>
                            <span class="nk-menu-text">Propriétés</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('variation.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-puzzle-fill"></em></span>
                            <span class="nk-menu-text">Variantes</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('item.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-puzzle-fill"></em></span>
                            <span class="nk-menu-text">Menu</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Achats</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('bcmd.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text">Bon de commande</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('breception.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text">Récéption de Commande</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('facture.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                            <span class="nk-menu-text">Facture</span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Ventes</h6>
                    </li>
                    <!-- .nk-menu-item -->
                   
                    <li class="nk-menu-item">
                        <a  href="{{route('orders.index')}}"  class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-text-rich"></em></span>
                            <span class="nk-menu-text">Ventes </span>
                        </a>
                    </li>
                    <!-- .nk-menu-item -->
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Paramètres Application</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{route('settings.index')}}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                            <span class="nk-menu-text">Paramètres </span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
