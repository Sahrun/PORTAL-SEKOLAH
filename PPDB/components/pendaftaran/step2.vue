<template>
   <div class="tab-pane fade" v-bind:class="{ show : step==2, active: step==2}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="col-xl-12 col-md-12 mb-12">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div novalidate>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Nama Ayah</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="validationCustom01"
                                required
                                v-model="data_keluarga.nama_ayah"
                                v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.nama_ayah && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.nama_ayah && issubmit)
                                                   }"
                                @change="error.data_keluarga.nama_ayah=''"
                            />
                            <div class="invalid-feedback">
                                {{error.data_keluarga.nama_ayah}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Nama Ibu</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="validationCustom01"
                                required
                                v-model="data_keluarga.nama_ibu"
                                v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.nama_ibu && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.nama_ibu && issubmit)
                                                   }"
                                @change="error.data_keluarga.nama_ibu=''"
                            />
                            <div class="invalid-feedback">
                                {{error.data_keluarga.nama_ibu}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Pekerjaan Ayah</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="validationCustom01"
                                required
                                v-model="data_keluarga.pekerjaan_ayah"
                                v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.pekerjaan_ayah && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.pekerjaan_ayah && issubmit)
                                                   }"
                                @change="error.data_keluarga.pekerjaan_ayah=''"
                            />
                            <div class="invalid-feedback">
                                {{error.data_keluarga.pekerjaan_ayah}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Pekerjaan Ibu</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="validationCustom01"
                                required
                                v-model="data_keluarga.pekerjaan_ibu"
                                v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.pekerjaan_ibu && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.pekerjaan_ibu && issubmit)
                                                   }"
                                @change="error.data_keluarga.pekerjaan_ibu=''"
                            />
                            <div class="invalid-feedback">
                                {{error.data_keluarga.pekerjaan_ibu}}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Penghasilan Pe</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input
                                type="number"
                                class="form-control"
                                id="validationCustom01"
                                required
                                v-model="data_keluarga.penghasilan"
                                v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.penghasilan && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.penghasilan && issubmit)
                                                   }"
                                @change="error.data_keluarga.penghasilan=''"
                            />
                            <div class="invalid-feedback">
                                {{error.data_keluarga.penghasilan}}
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
     props:['data_keluarga','error','step','issubmit']
}
</script>