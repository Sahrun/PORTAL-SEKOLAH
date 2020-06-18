<template>
    <div class="container-fluid" style="min-height:500px">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Sekolah</h1>
      </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
               <Tab/>
               <div class="card shadow mb-4">
            <div class="card-header">
              <h6 class="m-0 font-weight-bold text-primary inline-block">Data Jurusan</h6>
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
                        <th style="vertical-align: top">#</th>
                        <th style="vertical-align: top">
                            <input type="text" class="form-control" 
                            placeholder="Nama Jurusan" 
                            v-model="form.nama"
                            @change="error.nama=''"
                            v-bind:class="{
                                        'is-invalid' : (error.nama && issubmit), 
                                        'is-valid' : (!error.nama && issubmit)
                                        }"/>
                            <div class="invalid-feedback">{{error.nama}}</div>
                        </th>
                        <th style="vertical-align: top">
                            <textarea class="form-control" placeholder="Keterangan" rows="1" v-model="form.keterangan"></textarea>
                        </th>
                        <th style="vertical-align: top"><button class="btn btn-primary btn-sm" @click="save">Tambah</button></th>
                    </tr>
                    <tr role="row">
                        <th style="width: 5px;">No</th>
                        <th  @click="onSorting('nama')" :class="sorting('nama')" style="width: 233.667px;">Nama Jurusan</th>
                        <th  @click="onSorting('keterangan')" :class="sorting('keterangan')" style="width: 60%;">Keterangan</th>
                        <th >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr role="row" class="odd" v-for="(grd,i) in grid" :key="i">
                        <td>{{(filter.show * (filter.page - 1))+(i+1)}}</td>
                        <td>{{grd.nama}}</td>
                        <td>{{grd.keterangan}}</td>
                      <td><button class="btn btn-danger btn-sm" @click="onDelete(grd.jurusan_id)">Delete</button></td>
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
    </div>
</template>

<script>
import Tab from '../../components/sekolah/tabs'
import Pagination from '~/components/general/pagination'
import {genetateParam,default_filter} from '~/utils/general'
import FilterTop from '~/components/general/filterTop'
import api from '../../api'
import swal from 'sweetalert';
export default {
    components: {
        Tab,
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
                keterangan:''
            },
            error:{
                nama:''
            },
            isSubmit:false
        }
    },
    created(){
        this.issubmit = false;
        this.LoadData();
    },
    methods:{
        LoadData(){
          var param = genetateParam(this.filter);
          this.$store.dispatch('layout/load',true);
          api.jurusan.grid(param).then(response =>{
              this.$store.dispatch('layout/load',false);
              this.grid = response.data.data
              this.filter.count = this.grid.length;
              this.filter.count_data = response.data.count;
              this.filter.pages = response.data.pages;
          }).catch(err => {
            this.$store.dispatch('layout/load',false);
            swal({
                title:err.response.data.exception,
                icon: "error",
                dangerMode: true,
            });
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
        save(){
          this.issubmit = true;
          var validate = this.validate();
          if(validate){
            this.$store.dispatch('layout/load',true);
            this.isproses = true;
            api.jurusan.save(this.form).then(response => {
              this.$store.dispatch('layout/load',false);
              this.issubmit = false;
              this.isproses = false;
              swal({
                title:"success",
                icon: "success",
              });
              this.resetForm();
              this.LoadData();
            }).catch(err => {
              if(err.response.status == 422){
                  if(err.response.data.exist)
                  {
                    this.error.nama = err.response.data.exist;
                  }
                  if(err.response.data.exception)
                  {
                    swal({
                        title:err.response.data.exception,
                        icon: "error",
                        dangerMode: true,
                    });
                  }
              }else{
                swal({
                    title:err.response.data.exception,
                    icon: "error",
                    dangerMode: true,
                });
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
            return isvalid;
       },
       resetForm(){
            this.issubmit = false;
            this.form = {
              nama:'',
            }
            this.error = {
              nama :'',
            }
       },
       onDelete(id){
            swal({
            title: "Apa anda yakin?",
            text: "Anda akan menghapus data jurusan",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((res) => {
                if(res){
                    this.delete(id);
                }
            });
       },
       delete(id){
           this.$store.dispatch('layout/load',true);
            api.jurusan.delete(id).then(res => {
               this.$store.dispatch('layout/load',false);
               this.RefrashData();
               swal({
                title:"success",
                icon: "success",
              });
            }).catch(err => {
                this.$store.dispatch('layout/load',false);
                swal({
                    title:"Error",
                    text: err.response.data.message,
                    icon: "error",
                    dangerMode: true,
                });
            });
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