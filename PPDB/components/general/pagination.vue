<template>
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
            Showing {{filter.page}} to {{(filter.show * (filter.page - 1)) + filter.count}} of {{filter.count_data}} entries
            </div>
        </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous" 
                v-bind:class="{'disabled':filter.page == 1}"
                id="dataTable_previous">
                <a 
                aria-controls="dataTable" 
                data-dt-idx="0" tabindex="0" 
                class="page-link"
                style="cursor:pointer" 
                @click="previousPage()"
                >Previous</a></li>

                <li v-for="pg in filter.pages" v-bind:value="pg" :key="pg"
                    class="paginate_button page-item "
                    v-bind:class="{'active' : (pg == filter.page) }"  >
                    <a style="cursor:pointer"
                    aria-controls="dataTable" 
                    data-dt-idx="1" 
                    tabindex="0" 
                    class="page-link"
                    @click="onPage(pg)" 
                    >{{pg}}</a>
                </li>
                <li class="paginate_button page-item next" id="dataTable_next"
                    v-bind:class="{'disabled':filter.page == filter.pages}">
                    <a 
                    style="cursor:pointer" 
                    aria-controls="dataTable" 
                    data-dt-idx="7" 
                    tabindex="0" 
                    class="page-link"
                    @click="nextPage()">Next</a>
                </li>
            </ul>
        </div>
    </div>
</div>

</template>

<script>
export default {
    props:['filter'],
    methods:{
      previousPage(){
        this.filter.page = this.filter.page - 1;
        this.$parent.RefrashData()
      },
      nextPage(){
        this.filter.page = this.filter.page + 1;
        this.$parent.RefrashData()
      },
      onPage(page){
        this.filter.page = page;
        this.$parent.RefrashData()
      }
    }
}
</script>