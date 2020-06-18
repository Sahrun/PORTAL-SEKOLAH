<template>
    <div class="container-fluid" style="min-height: 500px;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sekolah</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <Tab />
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary inline-block">Data Kelas</h6>
                        <div class="inline-block btn-left text-right">
                            <button class="btn btn-primary btn-sm" @click="add">Tambah Data</button>
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
                                                    <th style="width: 5px;">No</th>
                                                    <th @click="onSorting('kelas')" :class="sorting('kelas')" style="width: 233.667px;">Kelas</th>
                                                    <th @click="onSorting('nama')" :class="sorting('nama')" style="width: 101px;">Nama Kelas</th>
                                                    <th @click="onSorting('jurusan')" :class="sorting('jurusan')" style="min-width: 90px;">Jurusan</th>
                                                    <th @click="onSorting('wali_kelas')" :class="sorting('wali_kelas')" style="min-width: 105px;">Wali Kelas</th>
                                                    <th @click="onSorting('jumlah_siswa')" :class="sorting('jumlah_siswa')" style="min-width: 105px;">Jumlah Siswa</th>
                                                    <th style="width: 5%;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd" v-for="(grd,i) in grid" :key="i">
                                                    <td>{{(filter.show * (filter.page - 1))+(i+1)}}</td>
                                                    <td>{{grd.kelas}}</td>
                                                    <td>{{grd.nama}}</td>
                                                    <td>{{grd.jurusan}}</td>
                                                    <td>{{grd.wali_kelas}}</td>
                                                    <td>{{grd.jumlah_siswa}}</td>
                                                    <td><button class="btn btn-success btn-sm" @click="onEdit(grd.sub_kelas_id)" >Edit</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <Pagination :filter="filter" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Form :form="form" :error="error" :isSubmit="isSubmit" :param="param"/>
    </div>
</template>


<script>
import Tab from '../../components/sekolah/tabs'
import Form from '../../components/sekolah/kelas/form-modal'
import Pagination from '~/components/general/pagination'
import {genetateParam,default_filter,isNUll,swal_error,swal_success} from '~/utils/general'
import FilterTop from '~/components/general/filterTop'
import api from '../../api'
import swal from 'sweetalert';
export default {
    components: {
        Tab,
        Form,
        Pagination,
        FilterTop
    },
    layout: 'admin',
    data(){
        return {
            grid:[],
            filter:default_filter,
            form:{
              nama:'',
              wali_kelas:'',
              kelas:'',
              jurusan:'',
              keterangan:''
            },
            error:{
              nama:'',
              wali_kelas:'',
              kelas:'',
            },
            param:{},
            isSubmit:false
        }
    },
    created(){
      this.LoadData();
    },
    methods:{
        LoadData(){
          var param = genetateParam(this.filter);
          this.$store.dispatch('layout/load',true);
          api.sub_kelas.grid(param).then(response =>{
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
      add(){
        this.initializeParam().then(() =>{
          this.resetForm();
          $("#form").modal('show');
        });
      },
      initializeParam(){
         return new Promise((resolve) => {
            if(isNUll(this.param.kelas)){
                  this.$store.dispatch('layout/load',true);
                   api.param.add_kelas()
                   .then(response =>{
                        this.$store.dispatch('layout/load',false);
                        this.param = response.data.data;
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
      save(){
          this.isSubmit = true;
          var validate = this.validate();
          if(validate){
            this.$store.dispatch('layout/load',true);
            this.isproses = true;
            api.sub_kelas.save(this.form).then(response => {
              this.$store.dispatch('layout/load',false);
              this.isSubmit = false;
              this.isproses = false;
              swal_success();
              $("#form").modal('hide');
              this.LoadData();
            }).catch(err => {
              if(err.response.status == 422){
                  if(err.response.data.exist)
                  {
                    this.error.nama = err.response.data.exist;
                  }
                  if(err.response.data.exception)
                  {
                    swal_error(err.response.data.exception);
                  }
              }else{
                swal_error(err.response.data.exception);
              }

              this.isproses = false;
              this.$store.dispatch('layout/load',false);
            })
          }
      },
      validate(){
            var isvalid = true;
            
            if(!this.form.nama){
                this.error.nama = "nama kelas harus di isi"
                isvalid = false;
            }
            if(!this.form.kelas){
                this.error.kelas = "kelas harus di pilih"
                isvalid = false;
            }
            if(!this.form.jurusan){
                this.error.jurusan = "jurusan harus di pilih"
                isvalid = false;
            }

            return isvalid;
      },
      resetForm(){
            this.isSubmit = false;
            this.form = {
              nama:'',
              wali_kelas:'',
              kelas:'',
              jurusan:'',
              keterangan:''
            }
            this.error = {
              nama:'',
              wali_kelas :'',
              jurusan:'',
              kelas :''
            }
      },
      onEdit(id){
        this.initializeParam().then(() =>{
           this.$store.dispatch('layout/load',true);
            api.sub_kelas.edit(id)
            .then(response =>{
                this.$store.dispatch('layout/load',false);
                this.resetForm();
                this.form = response.data.data;
                $("#form").modal('show');
            }).catch(err => {
                this.$store.dispatch('layout/load',false);
                swal_error(err.response.data.exception)
            });
        }); 
      },
      update(){
          this.isSubmit = true;
          var validate = this.validate();
          if(validate){
            this.$store.dispatch('layout/load',true);
            this.isproses = true;
            api.sub_kelas.update(this.form).then(response => {
              this.$store.dispatch('layout/load',false);
              this.isSubmit = false;
              this.isproses = false;
              swal_success();
              $("#form").modal('hide');
              this.LoadData();
            }).catch(err => {
              if(err.response.status == 422){
                  if(err.response.data.exist)
                  {
                    this.error.nama = err.response.data.exist;
                  }
                  if(err.response.data.exception)
                  {
                    swal_error(err.response.data.exception);
                  }
              }else{
                swal_error(err.response.data.exception);
              }

              this.isproses = false;
              this.$store.dispatch('layout/load',false);
            })
          }          
      }
    }
}
</script>

<style scoped>
.inline-block{
    display: inline-block;
}
.btn-left{
    width: 91%;
}
</style>