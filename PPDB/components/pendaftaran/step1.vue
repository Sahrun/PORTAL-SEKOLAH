<template>
    <div class="tab-pane fade" v-bind:class="{ show : step==1, active: step==1}" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="col-xl-12 col-md-12 mb-12">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div novalidate>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Nama Lengkap</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="validationCustom01"
                                    required
                                    v-bind:class="{
                                                   'is-invalid' : (error.data_diri.nama_lengkap && issubmit), 
                                                   'is-valid' : (!error.data_diri.nama_lengkap && issubmit)
                                                   }"
                                    @change="error.data_diri.nama_lengkap=''"
                                    v-model="data_diri.nama_lengkap"
                                />
                                <span class="small">Sesuai Ijazah Sebelumnya</span>
                                <div class="invalid-feedback">
                                    {{error.data_diri.nama_lengkap}}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom03">Tempat TGL</label>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom03">Tempat</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="validationCustom03"
                                    required
                                    v-model="data_diri.tempat_lahir"
                                    v-bind:class="{
                                                    'is-invalid' : (error.data_diri.tempat_lahir && issubmit),
                                                    'is-valid' : (!error.data_diri.tempat_lahir && issubmit) 
                                                    }"
                                    @change="error.data_diri.tempat_lahir=''"
                                />
                                <div class="invalid-feedback">
                                    {{error.data_diri.tempat_lahir}}
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="validationCustom04">Tanggal</label>
                                <select
                                    class="form-control"
                                    id="exampleFormControlSelect1"
                                    v-model="data_diri.tgl_lahir"
                                    v-bind:class="{
                                                    'is-invalid' : (error.data_diri.tgl_lahir && issubmit),
                                                    'is-valid' : (!error.data_diri.tgl_lahir && issubmit)
                                                }"
                                    @change="error.data_diri.tgl_lahir=''"
                                >
                                    <option value="">-Pilih-</option>
                                    <option v-for="tgl in parameter.tanggal" v-bind:value="tgl" :key="tgl">
                                        {{ tgl }}
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    {{error.data_diri.tgl_lahir}}
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="validationCustom05">Bulan</label>
                                <select
                                    class="form-control"
                                    id="exampleFormControlSelect1"
                                    v-bind:class="{
                                                    'is-invalid' : (error.data_diri.bln_lahir && issubmit),
                                                    'is-valid' : (!error.data_diri.bln_lahir && issubmit)
                                                     }"
                                    @change="error.data_diri.bln_lahir=''"
                                    v-model="data_diri.bln_lahir"
                                >
                                    <option value="">-Pilih-</option>
                                    <option v-for="bln in parameter.bulan" v-bind:value="bln" :key="bln">
                                        {{ bln }}
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    {{error.data_diri.bln_lahir}}
                                </div>
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="validationCustom05">Tahun</label>
                                <select
                                    class="form-control"
                                    id="exampleFormControlSelect1"
                                    v-bind:class="{
                                                    'is-invalid' : (error.data_diri.thn_lahir && issubmit),
                                                    'is-valid' : (!error.data_diri.thn_lahir && issubmit)  
                                                }"
                                    @change="error.data_diri.thn_lahir=''"
                                    v-model="data_diri.thn_lahir"
                                >
                                    <option value="">-Pilih-</option>
                                    <option v-for="thn in parameter.tahun" v-bind:value="thn" :key="thn">
                                        {{ thn }}
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    {{error.data_diri.thn_lahir}}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Jenis Kelamin</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select
                                    class="form-control"
                                    id="exampleFormControlSelect1"
                                    v-model="data_diri.jenis_kelamin"
                                    v-bind:class="{
                                                     'is-invalid' : (error.data_diri.jenis_kelamin && issubmit),
                                                     'is-valid' : (!error.data_diri.jenis_kelamin && issubmit) 
                                                 }"
                                    @change="error.data_diri.jenis_kelamin=''"
                                >
                                    <option value="">-Pilih-</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{error.data_diri.jenis_kelamin}}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Agama</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select
                                    class="form-control"
                                    id="exampleFormControlSelect1"
                                    v-model="data_diri.agama_id"
                                    v-bind:class="{
                                                    'is-invalid' : (error.data_diri.agama_id && issubmit),
                                                    'is-valid' : (!error.data_diri.agama_id && issubmit)
                                                }"
                                    @change="error.data_diri.agama_id='';setAgama()"
                                >
                                    <option value="">-Pilih-</option>
                                    <option v-for="agm in parameter.agama" v-bind:value="agm.id" :key="agm.id">
                                        {{ agm.nama }}
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    {{error.data_diri.agama_id}}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Alamat</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <textarea
                                    class="form-control"
                                    required
                                    v-model="data_diri.alamat"
                                    v-bind:class="{
                                                    'is-invalid' : (error.data_diri.alamat && issubmit),
                                                    'is-valid' : (!error.data_diri.alamat && issubmit)
                                                 }"
                                    @change="error.data_diri.alamat=''"
                                ></textarea>
                                <div class="invalid-feedback">
                                    {{error.data_diri.alamat}}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Telepon</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="validationCustom01"
                                    required
                                    v-model="data_diri.telepon"
                                    v-bind:class="{
                                                    'is-invalid' : (error.data_diri.telepon && issubmit),
                                                    'is-valid' : (!error.data_diri.telepon && issubmit)
                                                }"
                                    @change="error.data_diri.telepon=''"
                                />
                                <div class="invalid-feedback">
                                    {{error.data_diri.telepon}}
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Foto</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div>
                                    <img v-bind:src="URLImage" class="img-thumbnail" />
                                </div>
                                <input
                                    type="file"
                                    class="form-control"
                                    id=""
                                    accept="image/*"
                                    @change="read_file($event)"
                                    v-bind:class="{
                                                    'is-invalid' : error.data_diri.foto
                                                }"
                                />
                                <span class="small">* Foto ukuran 4 x 6 dengan format jpg max size 2 Mb</span>
                                <div class="invalid-feedback">
                                    {{error.data_diri.foto}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <Button :step="step"/>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import Button from '../../components/pendaftaran/button'
export default {
    components:{
        Button
    },
    props:['data_diri','error','parameter','step','issubmit','URLImage'],
    methods:{
        setAgama(){
            this.$parent.setAgama();
        },
        read_file(event){
            this.$parent.read_file(event);
        },
        setAgama(){
            this.$parent.setAgama();
        }

    }
}
</script>