<template>
 <div class="container-fluid"  style="min-height:500px">
    
    <!-- Content Row -->
    <div class="row">
      <div class="text-center">
          <h2>
            SELAMAT DATANG CALON SISWA BARU , UNTUK MELAKUKAN PENDAFTARAN SILAHKAN MELAKUKAN REGISTRASI TERLEBIH DAHULU
          </h2>
          <br/>
          <a class="btn btn-info" href="/sekolah">DAFTAR SEKARANG</a>
          
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
import Logo from '~/components/Logo.vue'

export default {
  components: {
    Logo
  },
  created(){
      // console.log(this.$store.state.auth);
    }
}
</script>

<style>
</style>
