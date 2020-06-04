<template>
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="dataTables_length" id="dataTable_length">
            <label>
                Show
                <select  aria-controls="dataTable" 
                class="custom-select custom-select-sm form-control form-control-sm"
                v-model="filter.show" @change="changeShow">
                    <option v-for="shw in show" v-bind:value="shw" :key="shw">
                        {{ shw }}
                    </option>
                </select>
                entries
            </label>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div id="dataTable_filter" class="dataTables_filter">
            <label>Search:
                <input type="search" 
                class="form-control form-control-sm" 
                placeholder="" 
                aria-controls="dataTable" 
                v-model="filter.search"
                @change="changeSearch"/> </label>
        </div>
    </div>
</div>
</template>

<script>
import {show} from '~/utils/general'
export default {
   props:['filter'],
   data(){
       return {
           show:show
       }
   },
   methods:{
       changeSearch(){
           this.filter.page = 1;
           this.$parent.RefrashData();
       },
       changeShow(){
           this.filter.page = 1;
           this.$parent.RefrashData();
       }
   }
}
</script>