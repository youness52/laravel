<template>
    <div class="card-inner">
        <div class="nk-block-between-md g-3">
            <div class="g">
                <ul class="pagination justify-content-center justify-content-md-start">
                    <li v-for="(link,index) in paginations.links" :key="index" class="page-item " v-bind:class="link.active? 'active':'' "><a class="page-link" :href="link.url" v-html="link.label" ></a></li>
                </ul><!-- .pagination -->
            </div>
            <div class="g">
                <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                    <div>Page</div>
                    <div>
                        <select class="form-select form-select-sm" data-search="on" data-dropdown="xs center">
                            <option value="page-1">1</option>
                        </select>
                    </div>
                    <div>OF 1</div>
                </div>
            </div><!-- .pagination-goto -->
        </div><!-- .nk-block-between -->
    </div>
</template>

<script>
    export default {
        name: "pagination",
        props:['paginations'],
        created() {
            console.log(this.paginations)
        }
    }
</script>

<style scoped>

</style>
