<template>
  <div class="modal fade bd-example-modal-xl" id="form" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-xl" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Form Guru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div novalidate>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Nama Dan Gelar</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" 
                            class="form-control" 
                            required  
                            maxlength="255"
                            v-model="form.nama"
                            @change="error.nama=''"
                             v-bind:class="{
                                        'is-invalid' : (error.nama && issubmit), 
                                        'is-valid' : (!error.nama && issubmit)
                                        }"
                            />
                            <div class="invalid-feedback">{{error.nama}}</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">NIP / NUPTK / KTP</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="number" 
                            class="form-control"
                            required 
                            maxlength="20"
                            v-model="form.nip"
                            @change="error.nip=''"
                             v-bind:class="{
                                        'is-invalid' : (error.nip && issubmit), 
                                        'is-valid' : (!error.nip && issubmit)
                                        }"/>
                            <div class="invalid-feedback">{{error.nip}}</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label>Keterangan</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <textarea v-model="form.keterangan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal">Tutup</button> 
                <button class="btn btn-primary btn-sm" @click="save" type="button">Simpan</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import {isNUll} from '~/utils/general'
export default {
    props:['form','error','issubmit'],
    methods:{
        save(){
            if(isNUll(this.form.guru_id)){
                this.$parent.save();
            }else{
                this.$parent.update();
            }
        }
    }
}
</script>