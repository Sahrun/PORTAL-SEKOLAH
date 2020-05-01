<template>
    <div class="container-fluid" style="min-height:500px">

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-10">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" v-bind:class="{ active: step==1 }" href="#" v-on:click="step=1" style="pointer-events: none;">Data diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" v-bind:class="{ active: step==2 }" v-on:click="step=2" style="pointer-events: none;">Data Keluarga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" v-bind:class="{ active: step==3 }" v-on:click="step=3" style="pointer-events: none;">Asal Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" v-bind:class="{ active: step==4 }" v-on:click="step=4" style="pointer-events: none;">Resume</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" v-bind:class="{ show : step==1, active: step==1}" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-primary shadow h-100   py-2">
                                <div class="card-body">
                                    <div class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required 
                                                v-model="data_diri.nama_lengkap">
                                                <span class="small">Sesuai Ijazah Sebelumnya</span>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                               <label for="validationCustom03">Tempat TGL</label> 
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom03">Tempat</label>
                                                <input type="text" class="form-control" id="validationCustom03" required
                                                v-model="data_diri.tempat_lahir">
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>
                                             <div class="col-md-1 mb-1">
                                                <label for="validationCustom05">Tahun</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                v-model="data_diri.thn_lahir">
                                                    <option>1</option>
                                                    <option>2</option>
                                                 </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <label for="validationCustom05">Bulan</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                v-model="data_diri.bln_lahir">
                                                    <option>1</option>
                                                    <option>2</option>
                                                 </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid zip.
                                                </div>
                                            </div>
                                            <div class="col-md-1 mb-1">
                                                <label for="validationCustom04">Tanggal</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                v-model="data_diri.tgl_lahir">
                                                    <option>1</option>
                                                    <option>2</option>
                                                 </select>
                                                <div class="invalid-feedback">
                                                    Please provide a valid state.
                                                </div>
                                            </div>
                                        </div>
                                      <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                 <select class="form-control" id="exampleFormControlSelect1"
                                                 v-model="data_diri.jenis_kelamin">
                                                    <option>Laki-Laki</option>
                                                    <option>Perempuan</option>
                                                 </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Agama</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                v-model="data_diri.agama">
                                                    <option value="1">Islam</option>
                                                    <option value="2">Hindu</option>
                                                 </select>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Alamat</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <textarea class="form-control" required v-model="data_diri.alamat"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Telepon</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="data_diri.telepon">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" v-bind:class="{ show : step==2, active: step==2}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-success shadow h-100   py-2">
                                <div class="card-body">
                                     <div class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Nama Ayah</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="data_keluarga.nama_ayah">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                      <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Nama Ibu</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                  <input type="text" class="form-control" id="validationCustom01" required
                                                  v-model="data_keluarga.nama_ibu">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Pekerjaan Ayah</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="data_keluarga.pekerjaan_ayah">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Pekerjaan Ibu</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                               <input type="text" class="form-control" id="validationCustom01" required
                                               v-model="data_keluarga.pekerjaan_ibu">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Penghasilan Pe</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="data_keluarga.penghasilan">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" v-bind:class="{ show : step==3, active: step==3}" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-warning shadow h-100   py-2">
                                <div class="card-body">
                                    <div class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Asal Sekolah</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="asal_sekolah.nama_sekolah">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                      <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Alamat Sekolah</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <textarea class="form-control" required
                                                v-model="asal_sekolah.alamat_sekolah"></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">NPSN Sekolah</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="asal_sekolah.npsn">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Telepon</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                               <input type="text" class="form-control" id="validationCustom01" required
                                               v-model="asal_sekolah.telepon">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Nomor SKHUN</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="asal_sekolah.skhun">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" v-bind:class="{ show : step==4, active: step==4}" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-info shadow h-100   py-2">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div style="padding-top:10px;padding-bottom:10px;" class="text-center">
                    <button class="btn btn-primary" @click="simpan">Simpan</button>
                    <button class="btn btn-success" @click="lanjut">Lanjut</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from '../../api';
export default {
    // async asyncData({ query, error }) {
           
    //  },
    data() {
      return {
        data_diri:{},
        data_keluarga:{},
        asal_sekolah:{},
        step:0,
        error:{
            data_diri:{},
            data_keluarga:{},
            asal_sekolah:{},
        },
        ppdb_id:0,
      }
    },
    mounted (){
      this.step = 1;
      this.ppdb_id = localStorage.getItem("ppdb_id");
      localStorage.removeItem("ppdb_id");
    },
    methods:{
        simpan(){
            var validation = true;
            switch(this.step) {
                case 1:
                    validation = this.step1()
                    validation == true? this.data_diri_save():this.step= 1;
                    break;
                case 2:
                   validation = this.step2()
                   validation == true? this.data_keluarga_save():this.step= 2;
                    break;
                case 3:
                   validation = this.step3()
                    validation == true? this.asal_sekolah_save():this.step= 3;
                break;
                default:
                    // code block
            }
        },
        lanjut(){
            var validation = true;
            switch(this.step) {
                case 1:
                    validation = this.step1()
                    validation == true? this.step=2:this.step= 1;
                    break;
                case 2:
                    validation = this.step2()
                    validation == true? this.step=3:this.step=2;
                    break;
                case 3:
                    validation =  this.step3()
                    validation == true? this.step=4:this.step=3;
                break;
                default:
                    // code block
            }
        },
        step1(){
            var isvalid = true;
            if(!this.data_diri.nama_lengkap){
                alert("Nama Lengkap tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_diri.tempat_lahir){
                alert("Tempat Lahir tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_diri.thn_lahir){
                alert("Tahun Lahir tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_diri.bln_lahir){
                alert("Bulan Lahir tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_diri.tgl_lahir){
                alert("Tanggal Lahir tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_diri.jenis_kelamin){
                alert("Jenis Kelamin tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_diri.agama){
                alert("Agama tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_diri.alamat){
                alert("Telepon tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_diri.telepon){
                alert("Telepon tidak boleh kosong");
                isvalid = false;
            }
        
            return isvalid;
        },
        step2(){
            var isvalid = true;
            if(!this.data_keluarga.nama_ayah){
                alert("Nama Ayah tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_keluarga.nama_ibu){
                alert("Nama Ibu tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_keluarga.pekerjaan_ayah){
                alert("Pekerjaan Ayah tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_keluarga.pekerjaan_ibu){
                alert("Pekerjaan Ibu tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.data_keluarga.penghasilan){
                alert("Penghasilan Pe tidak boleh kosong");
                isvalid = false;
            }

            return isvalid;
        },
        step3(){
            var isvalid = true;
            if(!this.asal_sekolah.nama_sekolah){
                alert("Asal Sekolah tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.asal_sekolah.alamat_sekolah){
                alert("Alamat tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.asal_sekolah.npsn){
                alert("NPSN Sekolah tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.asal_sekolah.telepon){
                alert("Telepon tidak boleh kosong");
                isvalid = false;
            }
            else if(!this.asal_sekolah.skhun){
                alert("Nomor SKHUN tidak boleh kosong");
                isvalid = false;
            }

            return isvalid;
        },
        data_diri_save(){
            this.data_diri.ppdb_id = this.ppdb_id;
            api.ppdb.data_diri_save(this.data_diri).then(response=>{
                 alert("Berhasil disimpan");
            }).catch(error => {
                alert("Terjadi kesalahan");
             });
        },
        data_keluarga_save(){

        },
        asal_sekolah_save(){

        }
    }
   
}
</script>

<style>
</style>
