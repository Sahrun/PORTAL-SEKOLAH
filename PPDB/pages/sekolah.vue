<template>
 <div class="container-fluid"  style="min-height:500px">
    
    <!-- Content Row -->
    <div class="row">
      <div>
          <h2 class="text-center">
            DAFTAR SEKOLAH 
          </h2>
          <br/>
          <ul>
              <li v-for="(item, index) in data_sekolah" :key="index">
                <a :href="'/pendaftaran'" v-on:click.stop="setstorage(item.id)">{{item.nama_sekolah}}</a>
              </li>
          </ul>
          
      </div>
            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                </div>
              </div>
            </div> -->
    </div>
 </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
      return {
        data_sekolah:[],
      }
    },
    async asyncData({ query, error }) {
        let [sekolahRes] = await Promise.all([
          
          axios.get('http://127.0.0.1:8000/api/ppdb/list',{
            headers:
             {
              "Authorization" : "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNmQ3ZmM0NTFhMjQ5MGZkMDAzZTRlYTk4Mzk3ZmVjYmMzNDg0MGY3YzFjOGU4ODUxOTNlNTRjODI4NjM4NGZjZWVmNDZhNzhhYWM4ZGNmNjMiLCJpYXQiOjE1ODc4MTI5NzEsIm5iZiI6MTU4NzgxMjk3MSwiZXhwIjoxNjE5MzQ4OTcxLCJzdWIiOiJ1LTEiLCJzY29wZXMiOltdfQ.XddoO1szaalF1c7hQAJDZ7WayLSFC1vHyR03B3HlS3t3tsKM2BpZwxSs6J0qn4NUHqG6m1PG5ad1yt8jEaklu0yvBpYIr3tFiWDMHiumPiURRf8nnwfx9P42sK0AuN-aM1jE7jxWCUmbIQ4ymj5Oiql8MlHfK_7YZxYCDZbMpDooTSX4pDlhx8DLRzo9nzuUTlWx-h6bYVJWm3xEXC5_A17fFxTlBOVU4vEZUb0nwoPly171LSDVjgU3LU56ALyXm1OCqagCiwfcJnsfkG6bJa61d3E6n8bbOQP63-R1bwhuRJmhN8ijQMcOGuaObtFCQoTHY5t6VvSLSf9f72IRtEfsqN2Uo8s8wpQHYGQemAnPXffijvvWaVnc0jYKUVD4hgXt0ybqj7LrRKSKq-JXo-7R7pjZjAk_Q3LknyCz3-5R8Dg-VL7zALM8UPpGwDm-ufMCPYRTUfCUGq2O6pAhhLcswkApprAaCi4Klxarugkn-n6siCuDTXEJQ8JawtjpZ4EoAYt9JzaQcn2RYzYnk3BEB6iO0yzSMNKsYVxywmwPy46VeS6iCVmBYljvOUuDu8ZMqsztLn3IR7HNgYXX0oncN9U63daawcaGxJMSLw2cYRetlfxr1PgIvVc7ZUOgcpmPgxC6-DK7Dw35PgjCi--IIRTv_vNV3dGpaa7hScM",
              }
            }),
          ])
        return {
          data_sekolah: sekolahRes.data.data
        }
    },
    created (){
    },
    methods:{
      setstorage(id){
          localStorage.setItem("ppdb_id",id);
      }
    }
   
}
</script>

<style>
</style>
