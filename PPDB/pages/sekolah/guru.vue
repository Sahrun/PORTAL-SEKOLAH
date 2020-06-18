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
                        <h6 class="m-0 font-weight-bold text-primary inline-block">Data Guru</h6>
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
                                                    <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" style="width: 5px;">No</th>
                                                    <th @click="onSorting('nama')" :class="sorting('nama')" style="width: 233.667px;">Nama</th>
                                                    <th @click="onSorting('nip')" :class="sorting('nip')"  style="width: 101px;">NIP</th>
                                                    <th @click="onSorting('nip')" :class="sorting('nip')" style="min-width: 90px;">Wali Kelas</th>
                                                    <th @click="onSorting('nip')" :class="sorting('nip')" style="min-width: 105px;">Jumlah Siswa</th>
                                                    <th @click="onSorting('nip')" :class="sorting('nip')" style="width: 80.6667px;">Keterangan</th>
                                                    <th >Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd" v-for="(grd,i) in grid" :key="i">
                                                    <td>{{(filter.show * (filter.page - 1))+(i+1)}}</td>
                                                    <td>{{grd.nama}}</td>
                                                    <td>{{grd.nip}}</td>
                                                    <td>{{grd.nip}}</td>
                                                    <td>{{grd.nip}}</td>
                                                    <td>{{grd.nip}}</td>
                                                    <td><button class="btn btn-success btn-sm" @click="onEdit(grd.guru_id)">Edit</button></td>
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
        <Form :form="form" :error="error" :issubmit="issubmit"/>
    </div>
    
</template>


<script>
import Tab from '../../components/sekolah/tabs'
import Form from '../../components/sekolah/guru/form-modal'
import FilterTop from '~/components/general/filterTop'
import Pagination from '~/components/general/pagination'
import api from '~/api'
import {genetateParam,default_filter} from '~/utils/general'
export default {
    components: {
        Tab,
        Form,
        FilterTop,
        Pagination
    },
    layout: 'admin',
    data(){
        return {
            data:{},
            filter:default_filter,
            grid:[],
            form:{
              nama:'',
              nip:'',
              keterangan:''
            },
            error:{
              nama:'',
              nip:''
            },
            edit:{
              id:'',
              nama:'',
              nip:''
            },
            issubmit:false,
            isproses:false
        }
    },
    created(){
      this.LoadData();
    },
    methods:{
        LoadData(){
          var param = genetateParam(this.filter);
          this.$store.dispatch('layout/load',true);
          api.guru.grid(param).then(response =>{
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
      },
      add(){
            this.resetForm();
            $("#form").modal('show');
      },
      save(){
          this.issubmit = true;
          var validate = this.validate();
          if(validate){
            this.$store.dispatch('layout/load',true);
            this.isproses = true;
            api.guru.save(this.form).then(response => {
              this.$store.dispatch('layout/load',false);
              this.issubmit = false;
              this.isproses = false;
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
                      alert(err.response.data.exception);
                  }
              }else{
                alert(err.response.data.exception);
              }
            
              this.isproses = false;
              this.$store.dispatch('layout/load',false);
            })
          }
      },
      validate(){
            var isvalid = true;
            
            if(!this.form.nama){
                this.error.nama = "nama harus di isi"
                isvalid = false;
            }
            if(!this.form.nip){
                this.error.nip = "nip harus di isi"
                isvalid = false;
            }

            return isvalid;
      },
      resetForm(){
            this.issubmit = false;
            this.form = {
              nama:'',
              nip:'',
              keterangan:''
            }
            this.error = {
              nama :'',
              nip :''
            }
      },
      onEdit(id){
        this.$store.dispatch('layout/load',true);
            api.guru.by_id(id).then(response => {
              this.$store.dispatch('layout/load',false);
              this.resetForm();
              this.form = response.data.data;
              $("#form").modal('show');
            }).catch(ex => {
              this.$store.dispatch('layout/load',false);
        })    
      },
      update(){
          this.issubmit = true;
          var validate = this.validate();
          if(validate){
            this.$store.dispatch('layout/load',true);
            this.isproses = true;
            api.guru.update(this.form).then(response => {
              this.$store.dispatch('layout/load',false);
              this.issubmit = false;
              this.isproses = false;
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
                      alert(err.response.data.exception);
                  }
              }else{
                alert(err.response.data.exception);
              }
              this.isproses = false;
              this.$store.dispatch('layout/load',false);
            })
          }
      }
    },
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