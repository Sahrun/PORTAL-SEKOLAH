<template>
    <div class="modal fade bd-example-modal-xl" id="form" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Form Wali Kelas</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div novalidate>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label>Guru</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select
                                    class="form-control"
                                    @change="error.guru=''"
                                    v-bind:class="{
                                        'is-invalid' : (error.guru && isSubmit), 
                                        'is-valid' : (!error.guru && isSubmit)
                                        }"
                                >
                                    <option value="">- Pilih -</option>
                                    <option v-for="(gru,i) in param.guru" :key="i" :value="gru.id">{{gru.nama}}</option>
                                    <option> </option>
                                </select>

                                <div class="invalid-feedback">{{error.guru}}</div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label>Kelas</label>
                            </div>
                            <div class="col-md-4 mb-3">
                                <select
                                    class="form-control"
                                    @change="error.kelas=''"
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Tutup</button> 
                    <button class="btn btn-primary btn-sm" type="button">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    props:['form','error','isSubmit','param']
}
</script>