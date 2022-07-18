<template>
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="nk-block-head nk-block-head-sm">
                <div class="nk-block-between">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Tableau de bord</h3>
                        <div class="nk-block-des text-soft">
                            <p>Bienvenue sur le tableau de bord FoodEasy.</p>
                        </div>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                <ul class="nk-block-tools g-3">
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-calender-date"></em><span><span class="d-none d-md-inline">Last</span> 30 Days</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><span>Les 30 derniers jours</span></a></li>
                                                    <li><a href="#"><span>6 derniers mois</span></a></li>
                                                    <li><a href="#"><span>1 dernières années</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nk-block-tools-opt"><a href="" class="btn btn-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
            </div>
            <div class="nk-block">
                <div class="row g-gs">
                    <div class="col-md-6 col-lg-5">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group align-start pb-3 g-2">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Revenu des ventes</h6>
                                        <p>Au cours des <span>30</span> derniers jours, les revenus de l'abonnement.</p>
                                    </div>
                                    <div class="card-tools">
                                        <em class="card-hint icon ni ni-help" data-toggle="tooltip" data-placement="left" title="Client de ce mois"></em>
                                    </div>
                                </div>
                                <div class="analytic-au">
                                    <div class="analytic-data-group analytic-au-group g-3">
                                        <div class="analytic-data analytic-au-data">
                                            <div class="title">Mensuelle</div>
                                            <div class="amount">9.28K</div>
                                        </div>
                                        <div class="analytic-data analytic-au-data">
                                            <div class="title">Chaque semaine</div>
                                            <div class="amount">2.69K</div>
                                        </div>

                                    </div>
                                    <div class="analytic-au-ck">
                                        <canvas class="analytics-au-chart" id="analyticAuData"></canvas>
                                    </div>
                                    <div class="chart-label-group">
                                        <div class="chart-label">01 Feb, 2021</div>
                                        <div class="chart-label">30 Feb, 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-lg-7">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group pb-3 g-2">
                                    <div class="card-title card-title-sm">
                                        <h6 class="title">Statistiques d'importation et de notes de frais</h6>
                                        <p>Rapport de comparaison</p>
                                    </div>
                                    <div class="card-tools shrink-0 d-none d-sm-block">
                                        <ul class="nav nav-switch-s2 nav-tabs bg-white">
                                            <li class="nav-item"><a href="#" class="nav-link">7 J</a></li>
                                            <li class="nav-item"><a href="#" class="nav-link active">1 M</a></li>
                                            <li class="nav-item"><a href="#" class="nav-link">3 A</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="analytic-ov">
                                    <div class="analytic-data-group analytic-ov-group g-3">
                                        <div class="analytic-data analytic-ov-data">
                                            <div class="title">Annuelle</div>
                                            <div class="amount">2.57K</div>
                                        </div>
                                        <div class="analytic-data analytic-ov-data">
                                            <div class="title">Monothly</div>
                                            <div class="amount">3.98K</div>
                                        </div>
                                        <div class="analytic-data analytic-ov-data">
                                            <div class="title">Chaque semaine</div>
                                            <div class="amount">28.49%</div>
                                        </div>
                                        <div class="analytic-data analytic-ov-data">
                                            <div class="title">chaque jours</div>
                                            <div class="amount">5.95%</div>
                                        </div>
                                    </div>
                                    <div class="analytic-ov-ck">
                                        <canvas class="analytics-line-large" id="analyticOvData"></canvas>
                                    </div>
                                    <div class="chart-label-group ml-5">
                                        <div class="chart-label">01 Jan, 2021</div>
                                        <div class="chart-label d-none d-sm-block">15 Jan, 2021</div>
                                        <div class="chart-label">30 Jan, 2021</div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->

                    <div class="col-md-6">
                        <div class="card card-bordered card-full">
                            <div class="card-inner-group">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Vente récente</h6>
                                        </div>
                                        <div class="card-tools">
                                            <a href="" class="link">Voir tout</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner p-0">
                                    <table class="nk-tb-list nk-tb-ulist">
                                        <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">PLAT</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">PRIX</span></th>
                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">STATUS</span></th>

                                        </tr><!-- .nk-tb-item -->
                                        </thead>
                                        <tbody>
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <span>P-78</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>Mackbook<span class="dot dot-success d-lg-none ml-1"></span></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$999.00</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span class="badge badge-dot badge-dot-xs badge-success">Available</span>
                                            </td>
                                        </tr><!-- .nk-tb-item -->
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <span>P-78</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>Mackbook<span class="dot dot-success d-lg-none ml-1"></span></span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>$999.00</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-lg">
                                                <span class="badge badge-dot badge-dot-xs badge-success">Available</span>
                                            </td>
                                        </tr><!-- .nk-tb-item -->

                                        </tbody>
                                    </table><!-- .nk-tb-list -->
                                </div><!-- .card-inner -->
                            </div>
                        </div><!-- .card -->
                    </div><!-- .col -->

                    <div class="col-md-6 ">
                        <div class="card card-bordered h-100">
                            <div class="card-inner border-bottom">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Utilisateurs</h6>
                                    </div>
                                    <div class="card-tools">
                                        <a href="#" class="link">All Utilisateurs</a>
                                    </div>
                                </div>
                            </div>
                            <ul class="nk-support">
                                <li class="nk-support-item">
                                    <div class="user-avatar">
                                        <img src="" alt="">
                                    </div>
                                    <div class="nk-support-content">
                                        <div class="title">
                                            <span>Vincent Lopez</span>
                                            <div class="status delivered">
                                                <em class="icon ni ni-check-circle-fill"></em>
                                            </div>
                                        </div>
                                        <p>Thanks for contact us with your issues...</p>
                                        <span class="time">6 min ago</span>
                                    </div>
                                </li>
                                <li class="nk-support-item">
                                    <div class="user-avatar bg-purple-dim">
                                        <span>DM</span>
                                    </div>
                                    <div class="nk-support-content ">
                                        <div class="title">
                                            <span>Daniel Moore</span>
                                            <div class="status unread">
                                                <em class="icon ni ni-bullet-fill"></em>
                                            </div>
                                        </div>
                                        <p>Thanks for contact us with your issues...</p>
                                        <span class="time">2 Hours ago</span>
                                    </div>
                                </li>
                                <li class="nk-support-item">
                                    <div class="user-avatar">
                                        <img src="" alt="">
                                    </div>
                                    <div class="nk-support-content">
                                        <div class="title">
                                            <span>Larry Henry</span>
                                            <div class="status sent">
                                                <em class="icon ni ni-check-circle"></em>
                                            </div>
                                        </div>
                                        <p>Thanks for contact us with your issues...</p>
                                        <span class="time">3 Hours ago</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .col -->

                </div><!-- .row -->
            </div><!-- .nk-block -->
        </div>
    </div>
</template>
<script>
    export default {
        setup: () => ({
            title: 'How To Install Vue 3 in Laravel 8 From Scratch'
        })
    }
</script>
