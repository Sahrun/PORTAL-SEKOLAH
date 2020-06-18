<template>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrasi Sekolah</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <form @submit.prevent="submit">
                        <div novalidate>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Provinsi</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.provinsi"
                                        v-bind:class="{
                                        'is-invalid' : (error.provinsi && issubmit), 
                                        'is-valid' : (!error.provinsi && issubmit)
                                    }"
                                        @change="error.provinsi=''"
                                        maxlength="255"
                                    />
                                    <div class="invalid-feedback">{{error.provinsi}}</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Kota/Kabupaten</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.kota"
                                        @change="error.kota=''"
                                        v-bind:class="{
                                        'is-invalid' : (error.kota && issubmit), 
                                        'is-valid' : (!error.kota && issubmit)
                                    }"
                                    maxlength="255"
                                    />
                                    <div class="invalid-feedback">{{error.kota}}</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <textarea
                                        class="form-control"
                                        v-model="form.alamat"
                                        @change="error.alamat=''"
                                        v-bind:class="{
                                        'is-invalid' : (error.alamat && issubmit), 
                                        'is-valid' : (!error.alamat && issubmit)
                                    }"
                                    ></textarea>
                                    <div class="invalid-feedback">{{error.alamat}}</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Sekolah</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.sekolah"
                                        v-bind:class="{
                                        'is-invalid' : (error.sekolah && issubmit), 
                                        'is-valid' : (!error.sekolah && issubmit)
                                    }"
                                        @change="error.sekolah=''"
                                        maxlength="255"
                                    />
                                    <div class="invalid-feedback">{{error.sekolah}}</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Status Sekolah</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <select
                                        class="form-control"
                                        v-model="form.status"
                                        v-bind:class="{
                                        'is-invalid' : (error.status && issubmit), 
                                        'is-valid' : (!error.status && issubmit)
                                    }"
                                        @change="error.status=''"
                                    >
                                        <option value="">- Pilih -</option>
                                        <option v-for="sts in param.status" v-bind:value="sts" :key="sts">
                                            {{ sts }}
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">{{error.status}}</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>NPSN</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.npsn"
                                        v-bind:class="{
                                        'is-invalid' : (error.npsn && issubmit), 
                                        'is-valid' : (!error.npsn && issubmit)
                                    }"
                                        @change="error.npsn=''"
                                        maxlength="100"
                                    />
                                    <div class="invalid-feedback">{{error.npsn}}</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Email Sekolah</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input
                                        type="email"
                                        class="form-control"
                                        v-model="form.email"
                                        v-bind:class="{
                                        'is-invalid' : (error.email && issubmit), 
                                        'is-valid' : (!error.email && issubmit)
                                    }"
                                        @change="error.email=''"
                                        maxlength="100"
                                    />
                                    <div class="invalid-feedback">{{error.email}}</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Nama Admin</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.admin_name"
                                        :disabled="true"
                                    />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Email Admin</label>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.admin_email"
                                        :disabled="true"
                                    />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3 text-right">
                                    <button class="btn btn-primary btn-sm" type="submit" :disabled="isproses">Submit</button>
                                    <!-- <button class="btn btn-danger btn-sm" type="button">Cancel</button> -->
                                    <nuxt-link :to="`/registrasi-sekolah`" class="btn btn-danger btn-sm">Cancel</nuxt-link>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</template>

<script>
import api from '~/api'
import {isNUll,swal_error,swal_success} from '~/utils/general'
export default {
    layout: 'admin',
    data(){
        return {
            form:{
                id_sekolah:'',
                provinsi:'',
                kota:'',
                alamat:'',
                sekolah:'',
                status:'',
                npsn:'',
                email:'',
                admin_name:'',
                admin_email:''
            },
            error:{
                provinsi:'',
                kota:'',
                alamat:'',
                sekolah:'',
                status:'',
                npsn:'',
                email:''
            },
            issubmit:false,
            param:{
                status:[]
            },
            isproses:false
        }
    },
    async asyncData({ query, error }) {
       
    },
    created(){
        if(isNUll(this.$route.params.id)){

        }else{
            this.$store.dispatch('layout/load',true);
            Promise.all([
                api.param.status_sekolah(),
                api.sekolah.by_id(this.$route.params.id),
            ]).then(response =>{
                 this.$store.dispatch('layout/load',false);
                 this.param.status = response[0].data;
                 this.form = response[1].data.data;
            }).catch(err => {
                 swal_error(err.response.data.exception)
                 this.$store.dispatch('layout/load',false);
            });
        }

    },
    methods:{
        submit(){
            this.issubmit = true;
            var validate = this.validate();
            if(validate){
                this.$store.dispatch('layout/load',true);
                this.isproses = true;
                api.sekolah.update(this.form).then(res => {
                    this.issubmit = false;
                    this.isproses = false;
                    swal_success();
                    this.$store.dispatch('layout/load',false);
                    this.$router.push('/registrasi-sekolah/');
                }).catch(err => {
                    if(err.response.status == 422){
                        if(err.response.data.field == "sekolah")
                        {
                            this.error.sekolah = err.response.data.message;
                        }
                    }else{
                        swal_error(err.response.data.exception)
                    }
                    this.isproses = false;
                    this.$store.dispatch('layout/load',false);
                })
            }
        },
        validate(){
            var isvalid = true;
            
            if(!this.form.provinsi){
                this.error.provinsi = "provinsi harus diisi"
                isvalid = false;
            }
            if(!this.form.kota){
                this.error.kota = "kota harus diisi"
                isvalid = false;
            }
            if(!this.form.alamat){
                this.error.alamat = "alamat harus diisi"
                isvalid = false;
            }
            if(!this.form.sekolah){
                this.error.sekolah = "sekolah harus diisi"
                isvalid = false;
            }
            if(!this.form.status){
                this.error.status = "status harus dipilih"
                isvalid = false;
            }
            if(!this.form.npsn){
                this.error.npsn = "npsn harus diisi"
                isvalid = false;
            }
            if(!this.form.email){
                this.error.email = "email sekolah harus diisi"
                isvalid = false;
            }

            return isvalid;
        }
    }

}
</script>