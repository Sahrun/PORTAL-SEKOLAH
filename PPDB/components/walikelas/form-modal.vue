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
                            <label for="validationCustom01">Nama dan gelar</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" id="validationCustom01" required />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Mata Pelajaran</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <select class="form-control">
                                <option></option>
                            </select>

                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                      <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Kelas</label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <select class="form-control">
                                <option></option>
                            </select>

                            <div class="invalid-feedback"></div>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button> <button class="btn btn-primary" type="button">Simpan</button></div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    
}
</script>