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
                <a :href="'pendaftaran/daftar'" v-on:click.stop="setstorage(item.id)">{{item.nama_sekolah}}</a>
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
import api from '../api';

export default {
    data() {
      return {
        data_sekolah:[],
      }
    },
    async asyncData({ query, error,store }) {
        let [sekolahRes] = await Promise.all([
            api.ppdb.list()
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
