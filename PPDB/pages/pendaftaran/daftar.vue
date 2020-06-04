<template>
    <div class="container-fluid" style="min-height:500px">

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-10">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" v-bind:class="{ active: step==1 }" href="#" v-on:click="step=1" style="pointer-events: none;">DATA DIRI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" v-bind:class="{ active: step==2 }" v-on:click="step=2" style="pointer-events: none;">DATA KELUARGA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" v-bind:class="{ active: step==3 }" v-on:click="step=3" style="pointer-events: none;">ASAL SEKOLAH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" v-bind:class="{ active: step==4 }" v-on:click="step=4" style="pointer-events: none;">RESUME</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <Step1 :data_diri="data_diri" :error="error" :parameter="parameter" :step="step" :issubmit="issubmit" :URLImage="URLImage"/>
                    <Step2 :data_keluarga="data_keluarga" :error="error" :step="step" :issubmit="issubmit" />
                    <Step3 :asal_sekolah="asal_sekolah" :error="error" :step="step" :issubmit="issubmit" />
                    <Step4 :data_diri="data_diri" :data_keluarga="data_keluarga" :asal_sekolah="asal_sekolah" :error="error" :step="step" :issubmit="issubmit" :URLImage="URLImage" />
                    <!-- <div class="tab-pane fade" v-bind:class="{ show : step==4, active: step==4}" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-info shadow h-100   py-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                        <img v-bind:src="URLImage" class="img-thumbnail">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Data Diri</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:15%"><b>Nama Lengkap</b></td>
                                                    <td style="width:1%">:</td>
                                                    <td><span class="text-left">{{data_diri.nama_lengkap}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tempat TGL</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.tempat_lahir}} , {{data_diri.tgl_lahir}}/{{data_diri.bln_lahir}}/{{data_diri.thn_lahir}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Jenis Kelamin</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.jenis_kelamin}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Agama</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.agama}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.alamat}}</span></td>
                                                </tr>
                                                 <tr>
                                                    <td><b>Telepon</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.telepon}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Data Keluarga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:15%"><b>Nama Ayah</b></td>
                                                    <td style="width:1%">:</td>
                                                    <td><span class="text-left">{{data_keluarga.nama_ayah}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Ibu</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_keluarga.nama_ibu}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pekerjaan Ayah</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_keluarga.pekerjaan_ayah}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pekerjaan Ibu</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_keluarga.pekerjaan_ibu}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Penghasilan Pe</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_keluarga.penghasilan}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Asal Sekolah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:15%"><b>Nama Sekolah</b></td>
                                                    <td style="width:1%">:</td>
                                                    <td><span class="text-left">{{asal_sekolah.nama_sekolah}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat Sekolah</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{asal_sekolah.alamat_sekolah}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>NPSN Sekolah</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{asal_sekolah.npsn}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Telepon</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{asal_sekolah.telepon}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nomor SKHUN</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{asal_sekolah.skhun}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from '../../api';
import Step1 from '../../components/pendaftaran/step1'
import Step2 from '../../components/pendaftaran/step2'
import Step3 from '../../components/pendaftaran/step3'
import Step4 from '../../components/pendaftaran/step4'

export default {
    components:{
        Step1,
        Step2,
        Step3,
        Step4
    },
    async asyncData({ query, error }) {
        let [parameter,info] = await Promise.all([
            api.ppdb.initial_parameter(),
            api.ppdb.info_user(),
          ])
        return {
          parameter: parameter.data,
          data_diri: info.data.data_diri,
          data_keluarga: info.data.data_keluarga,
          asal_sekolah: info.data.asal_sekolah,
          URLImage : info.data.URLImage,
        }
    },
    data() {
      return {
        parameter:{},
        formData:{},
        formDataSuport:true,
        data_diri:{},
        data_keluarga:{},
        asal_sekolah:{},
        URLImage:'',
        step:0,
        error:{
            data_diri:{
                nama_lengkap:'',
                tempat_lahir:'', 
                thn_lahir:'',
                bln_lahir:'',
                tgl_lahir:'',
                jenis_kelamin:'',
                agama_id:'',
                alamat:'',
                telepon:'',
                foto:''
                },
            data_keluarga:{
                nama_ayah:'',
                nama_ibu:'',
                pekerjaan_ayah:'',
                pekerjaan_ibu:'',
                penghasilan:''
            },
            asal_sekolah:{
                nama_sekolah:'',
                alamat_sekolah:'',
                npsn:'',
                telepon:'',
                skhun:''
            },
        },
        ppdb_id:0,
        issubmit:false
      }
    },
    mounted (){
      this.step = 1;
      this.ppdb_id = localStorage.getItem("ppdb_id");

      if(window.FormData !== undefined)  // for HTML5 browsers
      {
        this.formData = new FormData()    
      }else{
        this.formDataSuport = false
      }
      if(!this.$store.state.auth.user.is_complete){
        this.step = this.$store.state.auth.user.current_step !== null? this.$store.state.auth.user.current_step:this.step;
      }
      
    },
    created(){
       
    },
    methods:{
        initial(){

        },
        simpan(){
            var validation = true;
            this.issubmit = true;
            switch(this.step) {
                case 1:
                    validation = this.step1()
                    if (validation == true) {
                        this.$store.dispatch('layout/load',true);
                        this.data_diri_save().then(res=>{ 
                            if(res == true){
                               if(this.$store.state.auth.user.is_complete){
                                   //this.$router.redirect('/pendaftaran/details');
                                   window.location.href = '/pendaftaran/details'
                                }else{
                                    this.step=2;
                                    localStorage.removeItem("ppdb_id");
                                    window.scrollTo(0,0);
                                    this.$store.dispatch('layout/load',false);
                                }
                            }else{
                                this.$store.dispatch('layout/load',false);
                            } 
                            this.issubmit= false;
                        });
                    }
                break;
                case 2:
                   validation = this.step2()
                    if (validation == true) {
                        this.$store.dispatch('layout/load',true);
                        this.data_keluarga_save().then(res=>{ 
                            if(res == true){
                                if(this.$store.state.auth.user.is_complete){
                                    this.$router.push('/pendaftaran/details');
                                }else{
                                    this.step=3;
                                    window.scrollTo(0,0);
                                    this.$store.dispatch('layout/load',false);
                                }
                            }else{
                                this.$store.dispatch('layout/load',false);
                            } 
                            this.issubmit= false;
                        });
                    }
                break;
                case 3:
                   validation = this.step3()
                   if (validation == true) {
                        this.$store.dispatch('layout/load',true);
                        this.asal_sekolah_save().then(res=>{ 
                            if(res == true){
                                 if(this.$store.state.auth.user.is_complete){
                                   this.$router.push('/pendaftaran/details');
                                 }else{
                                    this.step=4;
                                    window.scrollTo(0,0);
                                    this.$store.dispatch('layout/load',false);
                                 }
                            }else{
                                this.$store.dispatch('layout/load',false);
                            } 
                            this.issubmit= false;

                        });
                    }
                break;
                case 4:
                   validation = this.step4()
                   if (validation == true) {
                        this.$store.dispatch('layout/load',true);
                        this.resume_save().then(res=>{
                            if(res == true)
                            {
                                localStorage.removeItem("ppdb_id");
                                this.$router.push('/pendaftaran/details');
                            }     
                            this.issubmit= false;
                        });
                    }
                break;
                default:
                    // code block
            }
        },
        lanjut(){
            var validation = true;
            this.issubmit= true;
            switch(this.step) {
                case 1:
                    validation = this.step1()
                    if (validation == true){this.step=2;this.issubmit= false;window.scrollTo(0,0);}
                    break;
                case 2:
                    validation = this.step2()
                    if (validation == true){this.step=3;this.issubmit= false;window.scrollTo(0,0);}
                    break;
                case 3:
                    validation =  this.step3()
                    if (validation == true){this.step=4;this.issubmit= false;window.scrollTo(0,0);}
                break;
                default:
                    // code block
            }
        },
        back(){
            this.step = this.step - 1;
            window.scrollTo(0,0);
        },
        step1(){
            var isvalid = true;
            if(!this.data_diri.nama_lengkap){
                this.error.data_diri.nama_lengkap ="nama lengkap harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.tempat_lahir){
                this.error.data_diri.tempat_lahir="tempat lahir harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.thn_lahir){
                this.error.data_diri.thn_lahir="harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.bln_lahir){
                this.error.data_diri.bln_lahir="harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.tgl_lahir){
                this.error.data_diri.tgl_lahir="harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.jenis_kelamin){
               this.error.data_diri.jenis_kelamin="jenis kelamin harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.agama_id){
                this.error.data_diri.agama_id="agama harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.alamat){
                this.error.data_diri.alamat="alamat harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.telepon){
                this.error.data_diri.telepon="nomor telepon harus diisi"
                isvalid = false;
            }
            if(this.error.data_diri.foto){
                isvalid = false;
            }
            return isvalid;
        },
        step2(){
            var isvalid = true;
            if(!this.data_keluarga.nama_ayah){
                this.error.data_keluarga.nama_ayah='nama ayah harus diisi'
                isvalid = false;
            }
            if(!this.data_keluarga.nama_ibu){
                this.error.data_keluarga.nama_ibu ='nama ibu harus diisi'
                isvalid = false;
            }
            if(!this.data_keluarga.pekerjaan_ayah){
                this.error.data_keluarga.pekerjaan_ayah='pekerjaan ayah harus diisi'
                isvalid = false;
            }
            if(!this.data_keluarga.pekerjaan_ibu){
                this.error.data_keluarga.pekerjaan_ibu='pekerjaan ibu harus diisi'
                isvalid = false;
            }
            if(!this.data_keluarga.penghasilan){
                this.error.data_keluarga.penghasilan='penghasilan pe harus diisi'
                isvalid = false;
            }

            return isvalid;
        },
        step3(){
            var isvalid = true;
            if(!this.asal_sekolah.nama_sekolah){
                this.error.asal_sekolah.nama_sekolah='nama sekolah harus diisi'
                isvalid = false;
            }
            if(!this.asal_sekolah.alamat_sekolah){
               this.error.asal_sekolah.alamat_sekolah='alamat sekolah harus diisi'
                isvalid = false;
            }
            if(!this.asal_sekolah.npsn){
                this.error.asal_sekolah.npsn='npsn sekolah harus diisi'
                isvalid = false;
            }
            if(!this.asal_sekolah.skhun){
                this.error.asal_sekolah.skhun='nomor skhun harus diisi'
                isvalid = false;
            }

            return isvalid;
        },
        step4(){
            return this.step1() && this.step2() && this.step3()? true:false;
        },
        data_diri_save(){
            return new Promise((resolve) => { 
                this.data_diri.ppdb_id = this.ppdb_id;
                if(this.formDataSuport == true){
                    for ( var key in this.data_diri ) {
                        if(this.formData.get(key) == null)
                        {
                            this.formData.append(key,this.data_diri[key]);
                        }else{
                            this.formData.set(key,this.data_diri[key]);
                        }
                    }
                    api.ppdb.data_diri_save(this.formData).then(response=>{
                        alert("Berhasil disimpan");
                        resolve(true);
                    }).catch(error => {
                        alert("Terjadi kesalahan");
                        resolve(false);
                    });
                }else{
                    alert('Maaf browser anda tidak support dengan sistem ini, silahkan update broser terbaru !');
                }
            });
        },
        data_keluarga_save(){
            return new Promise((resolve) => { 
                api.ppdb.data_keluarga_save(this.data_keluarga).then(response=>{
                    alert("Berhasil disimpan");
                    resolve(true);
                }).catch(error => {
                    alert("Terjadi kesalahan");
                    resolve(false);
                });
            });
        },
        asal_sekolah_save(){
            return new Promise((resolve) => { 
                api.ppdb.asal_sekolah_save(this.asal_sekolah).then(response=>{
                    alert("Berhasil disimpan");
                    resolve(true);
                }).catch(error => {
                    alert("Terjadi kesalahan");
                    resolve(false);
                });
            });
        },
        resume_save(){
             return new Promise((resolve) => { 
                this.data_diri.ppdb_id = this.ppdb_id;
                if(this.formDataSuport == true){
                    for ( var key in this.data_diri ) {
                        if(this.formData.get(key) == null)
                        {
                            this.formData.append(key,this.data_diri[key]);
                        }else{
                            this.formData.set(key,this.data_diri[key]);
                        }
                    }
                    for ( var key in this.data_keluarga) {
                        if(this.formData.get(key) == null)
                        {
                            this.formData.append(key,this.data_keluarga[key]);
                        }else{
                            this.formData.set(key,this.data_keluarga[key]);
                        }
                    }
                    for ( var key in this.asal_sekolah) {
                        if(this.formData.get(key) == null)
                        {
                            this.formData.append(key,this.asal_sekolah[key]);
                        }else{
                            this.formData.set(key,this.asal_sekolah[key]);
                        }
                    }
                    api.ppdb.resume_save(this.formData).then(response=>{
                        resolve(true);
                    }).catch(error => {
                        alert("Terjadi kesalahan");
                        resolve(false);
                    });
                }else{
                    alert('Maaf browser anda tidak support dengan sistem ini, silahkan update broser terbaru !');
                }
            });
        },
        read_file(event){
            let input = event.target;
            if(input.files[0]){
                if(input.files[0].size > 2000)
                {
                    this.error.data_diri.foto = 'ukuran foto terlalu besar'
                }else{
                    var reader = new FileReader();
                    var data=this
                    reader.onload = function(){
                        data.URLImage = reader.result;
                    };
                    reader.readAsDataURL(input.files[0]);

                    if(this.formDataSuport == true){
                        if(this.formData.get('file') == null)
                        {
                            this.formData.append('file',input.files[0]);
                        }else{
                            this.formData.set('file',input.files[0]);
                        }
                    }
                    this.error.data_diri.foto =''
            }
        }else{
                this.error.data_diri.foto =''
        }
        },
        setAgama(){
            if(this.parameter.agama !== undefined)
            {
                if(this.data_diri.agama !== undefined && this.data_diri.agama_id !== undefined)
                {
                    let _agama = this.parameter.agama.filter(x => x.id = this.data_diri.agama_id);
                    if(_agama.length){
                        this.data_diri.agama = _agama[0].nama;
                    }
                }
            }
        }
    }
   
}
</script>

<style>
</style>
