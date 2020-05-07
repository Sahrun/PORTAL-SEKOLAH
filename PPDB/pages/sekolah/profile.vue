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
                                            <label for="validationCustom01">Provinsi</label>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="text" class="form-control" id="validationCustom01" required />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Kota/Kabupaten</label>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="text" class="form-control" id="validationCustom01" required />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Sekolah</label>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="text" class="form-control" id="validationCustom01" required />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Status Sekolah</label>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="text" class="form-control" id="validationCustom01" required />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">NPSN</label>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="text" class="form-control" id="validationCustom01" required />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Email</label>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="email" class="form-control" id="validationCustom01" required />
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8"></div>
                                    <div class="col-lg-4">
                                        <div style="padding-top: 10px; padding-bottom: 10px;" class="text-right">
                                            <button class="btn btn-primary">Simpan</button>
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
export default {
    components: {
           Tab
    },
    layout: 'admin',
    data(){
        return {
            error: {
                data_diri: {},
            },
            data_diri: {}
        }
    }
}
</script>