<template>
    <div class="nk-block">
        <div class="card card-bordered card-stretch">
            <div  v-if="isLoading" class="d-flex justify-content-center h-400px">
                <div class="spinner-border m-gs" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div v-else class="card-inner-group">
                <div class="card-inner position-relative card-tools-toggle">
                    <div class="card-title-group">
                        <div class="card-tools">
                            <div class="form-inline flex-nowrap gx-3">
                                <div class="form-wrap w-150px">
                                        <select class="form-control  form-control-sm "    v-model="keywords.key"    >
                                        <option v-for="(name,value) in filters" :key="value"  :value="value">{{name}}</option>
                                    </select>
                                </div>
                                <div class="btn-wrap">
                                    <span class="d-none "><button class="btn btn-dim btn-outline-light ">Apply</button></span>
                                    <span class="d-md-none"><button class="btn btn-dim btn-outline-light btn-icon disabled"><em class="icon ni ni-arrow-right"></em></button></span>
                                </div>
                            </div><!-- .form-inline -->
                        </div><!-- .card-tools -->
                        <div class="card-tools mr-n1">
                            <ul class="btn-toolbar gx-1">
                                <li>
                                    <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                </li><!-- li -->
                                <li class="btn-toolbar-sep"></li><!-- li -->
                                <li>
                                    <div class="toggle-wrap">
                                        <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                        <div class="toggle-content" data-content="cardTools">
                                            <ul class="btn-toolbar gx-1">
                                                <li class="toggle-close">
                                                    <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                </li><!-- li -->
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                            <div class="dot dot-primary"></div>
                                                            <em class="icon ni ni-filter-alt"></em>
                                                        </a>
                                                        <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-right">
                                                            <div class="dropdown-head">
                                                                <span class="sub-title dropdown-title">Filtrer les Ventes</span>
                                                            </div>
                                                            <div class="dropdown-body dropdown-body-rg">
                                                                <div class="row gx-4 gy-3">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="overline-title overline-title-alt">Statut</label>
                                                                            <select class="form-select form-control-sm" @input="filterMember"  v-model="keywords.value"   >
                                                                                <option v-for="(item,index) in status" :key="index"  :value="item">{{item}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <button type="button" @click="filterMemberBtn" class="btn btn-secondary">Filtrer</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown-foot between">
                                                                <a class="clickable" @click="rest" href="javascript:">Réinitialiser le filtre</a>
                                                            </div>
                                                        </div><!-- .filter-wg -->
                                                    </div><!-- .dropdown -->
                                                </li><!-- li -->
                                                <li>
                                                    <div class="dropdown">
                                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-toggle="dropdown">
                                                            <em class="icon ni ni-setting"></em>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                            <ul class="link-check">
                                                                <li><span>Show</span></li>
                                                                <li class="active"><a href="#">10</a></li>
                                                                <li><a href="#">20</a></li>
                                                                <li><a href="#">50</a></li>
                                                            </ul>
                                                            <ul class="link-check">
                                                                <li><span>Order</span></li>
                                                                <li class="active"><a href="#">DESC</a></li>
                                                                <li><a href="#">ASC</a></li>
                                                            </ul>
                                                        </div>
                                                    </div><!-- .dropdown -->
                                                </li><!-- li -->
                                            </ul><!-- .btn-toolbar -->
                                        </div><!-- .toggle-content -->
                                    </div><!-- .toggle-wrap -->
                                </li><!-- li -->
                            </ul><!-- .btn-toolbar -->
                        </div><!-- .card-tools -->
                    </div><!-- .card-title-group -->
                    <div class="card-search search-wrap" data-search="search">
                        <div class="card-body">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by "  @keyup="filterMember" v-model="keywords.value">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div>
                    </div><!-- .card-search -->
                </div><!-- .card-inner -->
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="uid">
                                    <label class="custom-control-label" for="uid"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col"><span class="sub-text">Commande ID</span></div>
                            <div class="nk-tb-col"><span class="sub-text">N° Table </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Total </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Date d'ajout </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Date de modification </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Statut </span></div>
                            <div class="nk-tb-col"><span class="sub-text">Utilisateur </span></div>
                            <div class="nk-tb-col nk-tb-col-tools text-right">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-xs btn-outline-light btn-icon dropdown-toggle" data-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-plus"></em></a>
                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                        <ul class="link-tidy sm no-bdr">
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="ph">
                                                    <label class="custom-control-label" for="ph">Total</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked="" id="bl">
                                                    <label class="custom-control-label" for="bl">Total</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="st">
                                                    <label class="custom-control-label" for="st">Statut</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .nk-tb-item -->

                        <order-item v-if="orders.length" v-for="order in orders" :key="order.id" :order="order"></order-item>
                        <div class="nk-tb-item nk-tb-head h-100px" style="display: block"  v-else>
                         <span class="w-100 position-absolute text-center ">   Not Found</span>
                        </div>
                        <!-- .nk-tb-item -->
                    </div><!-- .nk-tb-list -->
                </div>
                <!-- .card-inner -->
                <div class="card-inner">
                    <div class="nk-block-between-md g-3">
                        <div class="g">
                            <ul class="pagination justify-content-center justify-content-md-start">
                                <li v-for="(link,index) in paginations.links" :key="index" class="page-item " v-bind:class="link.active? 'active':'' "><a class="page-link"  href="#" @click.prevent="fetchStories(link.url)"  v-html="link.label" ></a></li>
                            </ul><!-- .pagination -->
                        </div>
                    </div><!-- .nk-block-between -->
                </div>
                <!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div><!-- .nk-block -->

</template>

<script>
    import orderItem from "./orderItem";
    import pagination from "./pagination";
    export default {
        name: "orders",
        components:{
            orderItem,
            pagination
        },
        data(){
            return {
                orders:[],
                filters:{
                    'id':"ID",
                    'table_id':"N° Table",
                    'created_at':"Date d'ajout",
                    'update_at':"Date de modification",
                    'status':"Statut",
                    'user_id':"Utilisateur",
                },
                keywords: {
                    key:null,
                    value:null
                },
                status:["any","pending","canceled","complete","ready","printed"],
                tree:[],
                paginations: {},
                isLoading:false,
            }
        },
        created() {
            this.fetchStories()
        },
        methods: {
            fetchStories: function (page_url){
                this.isLoading = true;
                page_url = page_url || '/api/order';
                axios.get(page_url)
                    .then(response =>{
                        this.orders =response.data.data;
                        this.makePagination(response.data) ;
                        this.isLoading=false;
                    })
                    .catch( err => {
                        console.log( err )
                    });

            },
            makePagination: function(data){
                this.paginations = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    links: data.links,
                }
            },
            filterMember: function(e){
                axios.get('/api/order/filter/', { params: this.keywords })
                    .then( response => {
                        this.orders =response.data.data;
                        this.makePagination(response.data) ;
                        this.isLoading=false;
                    })
                    .catch( err => {
                        console.log( err )
                    })
            },
            filterMemberBtn :function () {
                this.keywords.key = "status";
                this.filterMember()
            },
            rest:function () {
                this.keywords = {
                    key:null,
                    value:null
                };
                this.fetchStories()
            }
        }
    }
</script>

<style scoped>

</style>
