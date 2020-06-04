<template>
    <div class="tab-pane fade" v-bind:class="{ show : step==3, active: step==3}" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-warning shadow h-100   py-2">
                                <div class="card-body">
                                    <div class="" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Asal Sekolah</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="asal_sekolah.nama_sekolah"
                                                v-bind:class="{
                                                   'is-invalid' : (error.asal_sekolah.nama_sekolah && issubmit), 
                                                   'is-valid' : (!error.asal_sekolah.nama_sekolah && issubmit)
                                                   }"
                                                @change="error.asal_sekolah.nama_sekolah=''">
                                                <div class="invalid-feedback">
                                                    {{error.asal_sekolah.nama_sekolah}}
                                                </div>
                                            </div>
                                        </div>
                                      <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Alamat Sekolah</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <textarea class="form-control" required
                                                v-model="asal_sekolah.alamat_sekolah"
                                                v-bind:class="{
                                                   'is-invalid' : (error.asal_sekolah.alamat_sekolah && issubmit), 
                                                   'is-valid' : (!error.asal_sekolah.alamat_sekolah && issubmit)
                                                   }"
                                                @change="error.asal_sekolah.alamat_sekolah=''"></textarea>
                                                <div class="invalid-feedback">
                                                   {{error.asal_sekolah.alamat_sekolah}}
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">NPSN Sekolah</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="asal_sekolah.npsn"
                                                v-bind:class="{
                                                   'is-invalid' : (error.asal_sekolah.npsn && issubmit), 
                                                   'is-valid' : (!error.asal_sekolah.npsn && issubmit)
                                                   }"
                                                @change="error.asal_sekolah.npsn=''">
                                                <div class="invalid-feedback">
                                                    {{error.asal_sekolah.npsn}}
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
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Nomor SKHUN</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="asal_sekolah.skhun"
                                                v-bind:class="{
                                                   'is-invalid' : (error.asal_sekolah.skhun && issubmit), 
                                                   'is-valid' : (!error.asal_sekolah.skhun && issubmit)
                                                   }"
                                                   @change="error.asal_sekolah.skhun=''">
                                                <div class="invalid-feedback">
                                                    {{error.asal_sekolah.skhun}}
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
    props:['asal_sekolah','error','step','issubmit','URLImage']
}
</script>