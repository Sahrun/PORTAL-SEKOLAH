<template>
    <div class="container-fluid" style="min-height: 500px;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Wali Kelas</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary inline-block">Data Wali Kelas</h6>
                        <div class="inline-block btn-left text-right">
                            <button class="btn btn-primary btn-sm" @click="add">Tambah Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                               <FilterTop :filter="filter"/>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 5px;">No</th>
                                                    <th @click="onSorting('guru.nama')" :class="sorting('guru.nama')"  style="width: 233.667px;">Nama</th>
                                                    <th @click="onSorting('kelas.nama')" :class="sorting('kelas.nama')"  style="min-width: 90px;">Wali Kelas</th>
                                                    <th @click="onSorting('jumlah')" :class="sorting('jumlah')"  style="min-width: 105px;">Jumlah Siswa</th>
                                                    <th @click="onSorting('keterngan')" :class="sorting('keterngan')"  style="width: 80.6667px;">Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <tr role="row" class="odd" v-for="(grd,i) in grid" :key="i">
                                                    <td>{{(filter.show * (filter.page - 1))+(i+1)}}</td>
                                                    <td>{{grd.nama}}</td>
                                                    <td>{{grd.kelas}}</td>
                                                    <td>{{grd.jumlah}}</td>
                                                    <td>{{grd.keterangan}}</td>
                                                    <td><button class="btn btn-success btn-sm" @click="onEdit(grd.wali_kelas_id)">Edit</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                              <Pagination :filter="filter"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Form :form="form" :error="error" :isSubmit="isSubmit" :param="param" />
    </div>
</template>


<script>
import Form from '../../components/walikelas/form-modal'
import FilterTop from '~/components/general/filterTop'
import Pagination from '~/components/general/pagination'
import api from '~/api'
import {genetateParam,default_filter,swal_error,isNUll} from '~/utils/general'
export default {
    components: {
        Form,
        Pagination,
        FilterTop
    },
    layout: 'admin',
    data(){
        return {
            filter:default_filter,
            grid:[],
            form:{
              nama:'',
              guru:'',
              kelas:'',
              keterangan:''
            },
            error:{
              nama:'',
              guru:'',
              kelas:'',
            },
            param:{
              guru:[],
              kelas:[]
            },
            isSubmit:false,
            isproses:false,
        }
    },
    created(){
      this.LoadData();
    },
    methods:{
        LoadData(){
          var param = genetateParam(this.filter);
          this.$store.dispatch('layout/load',true);
          api.wali_kelas.grid(param).then(response =>{
              this.$store.dispatch('layout/load',false);
              this.grid = response.data.data
              this.filter.count = this.grid.length;
              this.filter.count_data = response.data.count;
              this.filter.pages = response.data.pages;
          }).catch(err => {
              this.$store.dispatch('layout/load',false);
              swal_error(err.response.data.exception)
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
      },
      initializeParam(){
         return new Promise((resolve) => {
            if(isNUll(this.param.guru) || isNUll(this.param.kelas)){
                  this.$store.dispatch('layout/load',true);
                    Promise.all([
                        api.param.list_kelas(),
                    ]).then(response =>{
                        this.$store.dispatch('layout/load',false);
                        this.param.kelas = response[1].data.data;
                       resolve();
                    }).catch(err => {
                        this.$store.dispatch('layout/load',false);
                        swal_error(err.response.data.exception)
                        reject();
                    });
              }else{
               resolve();
              }
        });
          
      },
      add(){
        this.initializeParam().then(() =>{
          this.resetForm();
          $("#form").modal('show');
        });
      },
      validate(){
            var isvalid = true;
            
            if(!this.form.guru){
                this.error.guru = "guru harus di isi"
                isvalid = false;
            }
            if(!this.form.kelas){
                this.error.kelas = "kelas harus di isi"
                isvalid = false;
            }

            return isvalid;
      },
      resetForm(){
            this.isSubmit = false;
            this.form = {
              guru:'',
              kelas:'',
              keterangan:''
            }
            this.error = {
              guru :'',
              kelas :''
            }
      },
      onEdit(id){

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