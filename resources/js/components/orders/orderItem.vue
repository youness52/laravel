<template>
    <div class="nk-tb-item">
        <div class="nk-tb-col nk-tb-col-check">
            <div class="custom-control custom-control-sm custom-checkbox notext">
                <input type="checkbox" class="custom-control-input" id="">
                <label class="custom-control-label" for=""></label>
            </div>
        </div>
        <div class="nk-tb-col tb-col-mb">
            <span>#CD-{{order.id}}</span>
        </div>
        <div class="nk-tb-col tb-col-mb">
            <span>{{order.table.name}}</span>
        </div>
        <div class="nk-tb-col tb-col-mb text-success font-weight-bold">
            <span>{{order.amount}} MAD</span>
        </div>
        <div class="nk-tb-col tb-col-mb">
            <span>{{ new Date(order.created_at).toLocaleString()  }}</span>
        </div>
        <div class="nk-tb-col tb-col-mb">
            <span>{{ new Date(order.updated_at).toLocaleString()  }}</span>

        </div>
        <div class="nk-tb-col tb-col-mb">
            <span class=" badge badge-dim    badge-primary   ">{{order.status}}</span>
        </div>
        <div class="nk-tb-col tb-col-mb">
            <span>{{order.user.name}}</span>
        </div>
        <div class="nk-tb-col nk-tb-col-tools">
            <ul class="nk-tb-actions gx-1">
                <li class="nk-tb-action-show">
                    <button class="btn  btn-icon"  data-toggle="tooltip" data-placement="top" title="Afficher">
                        <em class="icon ni ni-eye "></em>
                    </button>
                </li>
                <li class="nk-tb-action-show">
                    <form action="" method="post">

                        <button class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suprimer">
                            <em class="icon ni ni-trash"></em>
                        </button>
                    </form>
                </li>

            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "orderItem",
        props:['order'],
    }
</script>

<style scoped>

</style>
