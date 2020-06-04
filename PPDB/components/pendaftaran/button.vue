<template>
                    <div class="row">
                        <div class="col-lg-4 text-left">
                            <button class="btn btn-secondary btn-sm" @click="back" v-if="step != 1">Kembali</button>
                        </div>
                        <div class="col-lg-4 text-center">
                        </div>
                        <div class="col-lg-4 text-right">
                            <button class="btn btn-primary btn-sm" @click="simpan">Simpan</button>
                            <button class="btn btn-success btn-sm" @click="lanjut" v-if="step != 4">Lanjut</button>
                            <!-- <button class="btn btn-success btn-sm" @click="lanjut" v-if="step == 4">Print</button> -->
                            <a 
                            :href="`http://127.0.0.1:8000/pendaftaran/print/${$store.state.auth.user.id}`" 
                            class="btn btn-success btn-sm" 
                            target="_blank"> Print </a>
                        </div>
                    </div>     
</template>

<script>
export default {
    props:['step'],
    methods:{
        simpan(){
            this.$parent.$parent.simpan();
        },
        lanjut(){
            this.$parent.$parent.lanjut();
        },
        back(){
            this.$parent.$parent.back();
        }

    }
}
</script>