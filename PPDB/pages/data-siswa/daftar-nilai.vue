<template>
<div class="container-fluid" style="min-height: 500px;">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Data Siswa</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <Tab />
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-row">
                        <label for="validationCustom01">Kelas</label>
                        <select class="form-control">
                            <option></option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-row">
                        <label for="validationCustom01">Jurusan</label>
                        <select class="form-control">
                            <option></option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-row">
                        <label for="validationCustom01">Tahun Ajaran</label>
                        <select class="form-control">
                            <option></option>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-row">
                        <button class="btn btn-info" style="margin-top: 30px;">Cetak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import Tab from '../../components/data-siswa/tabs'
export default {
    components: {
        Tab
    },
    layout: 'admin',
    data(){
        return {
            data:{}
        }
    },
    methods:{
        add(){
            $("#form").modal('show');
           
        }
    }
}
</script>

<style scoped>
.inline-block{
    display: inline-block;
}
.btn-left{
    width: 91%;
}
</style>