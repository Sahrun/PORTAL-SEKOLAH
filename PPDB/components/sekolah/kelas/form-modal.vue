<template>
    <div class="modal fade bd-example-modal-xl" id="form" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div novalidate>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Kelas</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select
                                    class="form-control"
                                    @change="error.kelas=''"
                                    v-model="form.kelas"
                                    v-bind:class="{
                                        'is-invalid' : (error.kelas && isSubmit), 
                                        'is-valid' : (!error.kelas && isSubmit)
                                        }"
                                >
                                    <option value="">- Pilih -</option>
                                    <option v-for="(kls,i) in param.kelas" :key="i" :value="kls.id">{{kls.nama}}</option>
                                </select>

                                <div class="invalid-feedback">{{error.kelas}}</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Nama Kelas</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input
                                    type="text"
                                    class="form-control"
                                    @change="error.nama=''"
                                    v-model="form.nama"
                                    maxlength="255"
                                    v-bind:class="{
                                        'is-invalid' : (error.nama && isSubmit), 
                                        'is-valid' : (!error.nama && isSubmit)
                                        }"
                                    required
                                />
                                <div class="invalid-feedback">{{error.nama}}</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01">Jurusan</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select
                                    class="form-control"
                                    @change="error.jurusan=''"
                                    v-model="form.jurusan"
                                    v-bind:class="{
                                        'is-invalid' : (error.jurusan && isSubmit), 
                                        'is-valid' : (!error.jurusan && isSubmit)
                                        }"
                                >
                                    <option value="">- Pilih -</option>
                                    <option v-for="(jrs,i) in param.jurusan" :key="i" :value="jrs.id">{{jrs.nama}}</option>
                                </select>

                                <div class="invalid-feedback">{{error.jurusan}}</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label>Wali Kelas</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select
                                    class="form-control"
                                    @change="error.wali_kelas=''"
                                    v-model="form.wali_kelas" >
                                    <option value="">- Pilih -</option>
                                    <option v-for="(wli,i) in param.wali_kelas" :key="i" :value="wli.id">{{wli.nama}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label>Keterangan</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <textarea class="form-control" v-model="form.keterangan"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary btn-sm" type="button" @click="onSubmit">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import {isNUll} from '~/utils/general'
export default {
    props:['form','error','isSubmit','param'],
    methods:{
        onSubmit(){
            if(!isNUll(this.form.sub_Kelas_id)){
                this.$parent.update();
            }else{
                this.$parent.save();
            }
        }
    
    }
     
}
</script>