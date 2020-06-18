<template>
    <div class="container-fluid" style="min-height: 500px;">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sekolah</h1>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-10">
                <Tab />
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
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
                                                    :disabled="!is_edit"
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
                                                    :disabled="!is_edit"
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
                                                    :disabled="!is_edit"
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
                                                    :disabled="!is_edit"
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
                                                    :disabled="!is_edit"
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
                                                    :disabled="!is_edit"
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
                                                    :disabled="!is_edit"
                                                />
                                                <div class="invalid-feedback">{{error.email}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8"></div>
                                        <div class="col-lg-4">
                                            <div style="padding-top: 10px; padding-bottom: 10px;" class="text-right">
                                                <button class="btn btn-primary" @click="onEdit" v-if="!is_edit">Edit</button>
                                                <button class="btn btn-primary" v-if="is_edit" @click="onUpdate">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
import api from '../../api';
export default {
    components: {
           Tab
    },
    layout: 'admin',
    data(){
        return {
            error: {
                provinsi:'',
                kota:'',
                alamat:'',
                sekolah:'',
                status:'',
                npsn:'',
                email:''
            },
            form: {
                id_sekolah:'',
                provinsi:'',
                kota:'',
                alamat:'',
                sekolah:'',
                status:'',
                npsn:'',
                email:''
            },
            param:{
                status:{}
            },
            is_edit:false,
            issubmit:false
        }
    },
    created(){
         this.loadData();
    },
    methods:{
        loadData(){
                this.$store.dispatch('layout/load',true);
                Promise.all([
                    api.param.status_sekolah(),
                    api.sekolah.profile(),
                ]).then(response =>{
                    this.$store.dispatch('layout/load',false);
                    this.param.status = response[0].data;
                    this.form = response[1].data.data;
                }).catch(e => {
                    this.$store.dispatch('layout/load',false);
                });
        },
        onEdit(){
            this.is_edit = true;
        },
        onUpdate(){
            this.issubmit = true;
            var validate = this.validate();
            if(validate){
                this.$store.dispatch('layout/load',true);
                this.isproses = true;
                api.sekolah.update_profile(this.form).then(res => {
                    this.issubmit = false;
                    this.isproses = false;
                    this.$store.dispatch('layout/load',false);
                    this.is_edit = false;
                }).catch(err => {
                    if(err.response.status == 422){
                        alert(err.response.data.message);
                        if(err.response.data.field == "sekolah")
                        {
                            this.error.sekolah = err.response.data.message;
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