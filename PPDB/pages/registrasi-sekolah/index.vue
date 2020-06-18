<template>
    <div class="container-fluid" style="min-height:500px">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Registrasi Sekolah</h1>
      </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
               <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="m-0 font-weight-bold text-primary inline-block">Data Sekolah</h6>
              <div class="inline-block btn-left text-right">
                <nuxt-link :to="`/registrasi-sekolah/form`" class="btn btn-primary btn-sm">Register</nuxt-link>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                 <FilterTop :filter="filter" />
              <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                  <thead>
                    <tr role="row">
                        <th  tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"  style="width: 5px;">No</th>
                        <th @click="onSorting('nama_sekolah')" :class="sorting('nama_sekolah')" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 233.667px;">Nama Sekolah</th>
                        <th @click="onSorting('status')" :class="sorting('status')" style="width: 101px;">Status</th>
                        <th @click="onSorting('npsn')" :class="sorting('npsn')"  style="min-width: 90px;">Npsn</th>
                        <th @click="onSorting('provinsi')" :class="sorting('provinsi')" style="min-width: 105px;">Provinsi</th>
                        <th @click="onSorting('kota')" :class="sorting('kota')" style="width: 80.6667px;">Kota</th>
                        <th @click="onSorting('created_at')" :class="sorting('created_at')" style="width: 80.6667px;">Di Buat</th>
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr role="row" class="odd" v-for="(grd,i) in grid" :key="i">
                      <td>{{(filter.show * (filter.page - 1))+(i+1)}}</td>
                      <td>{{grd.nama}}</td>
                      <td>{{grd.status}}</td>
                      <td>{{grd.npsn}}</td>
                      <td>{{grd.provinsi}}</td>
                      <td>{{grd.kota}}</td>
                      <td>{{grd.created}}</td>
                      <td>
                        <nuxt-link :to="`/registrasi-sekolah/edit/${grd.id_sekolah}`" class="btn btn-success btn-sm">Edit</nuxt-link>
                      </td>
                  </tr>
                    </tbody>
                </table>
                </div></div>
                <Pagination :filter="filter" />
                </div>
              </div>
            </div>
          </div>
            </div>
        </div>
        <Form/>
    </div>
</template>

<script>
import FilterTop from '~/components/general/filterTop'
import Pagination from '~/components/general/pagination'
import api from '../../api'
import {genetateParam,default_filter} from '~/utils/general'
export default {
    layout: 'admin',
    components: {
        FilterTop,
        Pagination
    },
    data(){
        return {
            grid:{},
            filter:default_filter
        }
    },
    created()
    {
      this.LoadData();
    },
    methods:{
      LoadData(){
        var param = genetateParam(this.filter);
        this.$store.dispatch('layout/load',true);
        api.sekolah.grid(param).then(response =>{
            this.$store.dispatch('layout/load',false);
            this.grid = response.data.data
            this.filter.count = this.grid.length;
            this.filter.count_data = response.data.count;
            this.filter.pages = response.data.pages;
        }).catch(err => {
          this.$store.dispatch('layout/load',false);
        });
      },
      RefrashData(){
          this.LoadData();
      },
      sorting(colum){
          var sort='sorting';
          if(colum == this.filter.sort_by && this.filter.order_by == "asc")
          {
            sort='sorting_asc'
          }
          else if(colum == this.filter.sort_by && this.filter.order_by == "desc"){
              sort='sorting_desc'
          }
          
          return sort;

      },
      onSorting(colum){
          this.filter.sort_by = colum;
           if(colum == this.filter.sort_by && this.filter.order_by == "asc")
          {
              this.filter.order_by='desc'
          }
          else if(colum == this.filter.sort_by && this.filter.order_by == "desc"){
              this.filter.order_by = 'asc'
          }
          this.RefrashData();
    }
    }
}
</script>

<style scoped>
.inline-block{
    display: inline-block;
}
.btn-left{
    width: 87%;
}
</style>