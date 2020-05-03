<template>
    <div class="container-fluid" style="min-height:500px">

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-10">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" v-bind:class="{ active: step==1 }" href="#" v-on:click="step=1" style="pointer-events: none;">DATA DIRI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" v-bind:class="{ active: step==2 }" v-on:click="step=2" style="pointer-events: none;">DATA KELUARGA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" v-bind:class="{ active: step==3 }" v-on:click="step=3" style="pointer-events: none;">ASAL SEKOLAH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" v-bind:class="{ active: step==4 }" v-on:click="step=4" style="pointer-events: none;">RESUME</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" v-bind:class="{ show : step==1, active: step==1}" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-primary shadow h-100   py-2">
                                <div class="card-body">
                                    <div novalidate>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required 
                                                v-bind:class="{
                                                   'is-invalid' : (error.data_diri.nama_lengkap && issubmit), 
                                                   'is-valid' : (!error.data_diri.nama_lengkap && issubmit)
                                                   }"
                                               @change="error.data_diri.nama_lengkap=''"
                                                v-model="data_diri.nama_lengkap" >
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
                                                <input type="text" class="form-control" id="validationCustom03" required
                                                v-model="data_diri.tempat_lahir"
                                                v-bind:class="{
                                                    'is-invalid' : (error.data_diri.tempat_lahir && issubmit),
                                                    'is-valid' : (!error.data_diri.tempat_lahir && issubmit) 
                                                    }"
                                                @change="error.data_diri.tempat_lahir=''">
                                                <div class="invalid-feedback">
                                                    {{error.data_diri.tempat_lahir}}
                                                </div>
                                            </div>
                                            <div class="col-md-2 mb-2">
                                                <label for="validationCustom04">Tanggal</label>
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                v-model="data_diri.tgl_lahir"
                                                v-bind:class="{
                                                    'is-invalid' : (error.data_diri.tgl_lahir && issubmit),
                                                    'is-valid' : (!error.data_diri.tgl_lahir && issubmit)
                                                }"
                                                @change="error.data_diri.tgl_lahir=''">
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
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                v-bind:class="{
                                                    'is-invalid' : (error.data_diri.bln_lahir && issubmit),
                                                    'is-valid' : (!error.data_diri.bln_lahir && issubmit)
                                                     }"
                                                @change="error.data_diri.bln_lahir=''"
                                                v-model="data_diri.bln_lahir">
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
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                v-bind:class="{
                                                    'is-invalid' : (error.data_diri.thn_lahir && issubmit),
                                                    'is-valid' : (!error.data_diri.thn_lahir && issubmit)  
                                                }"
                                                @change="error.data_diri.thn_lahir=''"
                                                v-model="data_diri.thn_lahir">
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
                                                 <select class="form-control" id="exampleFormControlSelect1"
                                                 v-model="data_diri.jenis_kelamin"
                                                 v-bind:class="{
                                                     'is-invalid' : (error.data_diri.jenis_kelamin && issubmit),
                                                     'is-valid' : (!error.data_diri.jenis_kelamin && issubmit) 
                                                 }"
                                                 @change="error.data_diri.jenis_kelamin=''">
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
                                                <select class="form-control" id="exampleFormControlSelect1"
                                                v-model="data_diri.agama_id"
                                                v-bind:class="{
                                                    'is-invalid' : (error.data_diri.agama_id && issubmit),
                                                    'is-valid' : (!error.data_diri.agama_id && issubmit)
                                                }"
                                                 @change="error.data_diri.agama_id='';setAgama()">
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
                                                <textarea class="form-control" required v-model="data_diri.alamat"
                                                v-bind:class="{
                                                    'is-invalid' : (error.data_diri.alamat && issubmit),
                                                    'is-valid' : (!error.data_diri.alamat && issubmit)
                                                 }"
                                                 @change="error.data_diri.alamat=''"></textarea>
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
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="data_diri.telepon"
                                                v-bind:class="{
                                                    'is-invalid' : (error.data_diri.telepon && issubmit),
                                                    'is-valid' : (!error.data_diri.telepon && issubmit)
                                                }"
                                                 @change="error.data_diri.telepon=''">
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
                                                    <img v-bind:src="URLImage" class="img-thumbnail">
                                                </div>
                                                <input type="file" class="form-control" id="" accept='image/*' @change="read_file($event)"
                                                v-bind:class="{
                                                    'is-invalid' : error.data_diri.foto
                                                }">
                                                <span class="small">* Foto ukuran 4 x 6 dengan format jpg max size 2 Mb</span>
                                                 <div class="invalid-feedback">
                                                    {{error.data_diri.foto}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" v-bind:class="{ show : step==2, active: step==2}" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-success shadow h-100   py-2">
                                <div class="card-body">
                                     <div novalidate>
                                        <div class="form-row">
                                            <div class="col-md-3 mb-3">
                                            <label for="validationCustom01">Nama Ayah</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="data_keluarga.nama_ayah"
                                                v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.nama_ayah && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.nama_ayah && issubmit)
                                                   }"
                                                @change="error.data_keluarga.nama_ayah=''">
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
                                                  <input type="text" class="form-control" id="validationCustom01" required
                                                  v-model="data_keluarga.nama_ibu"
                                                  v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.nama_ibu && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.nama_ibu && issubmit)
                                                   }"
                                                @change="error.data_keluarga.nama_ibu=''">
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
                                                <input type="text" class="form-control" id="validationCustom01" required
                                                v-model="data_keluarga.pekerjaan_ayah"
                                                v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.pekerjaan_ayah && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.pekerjaan_ayah && issubmit)
                                                   }"
                                                @change="error.data_keluarga.pekerjaan_ayah=''">
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
                                               <input type="text" class="form-control" id="validationCustom01" required
                                               v-model="data_keluarga.pekerjaan_ibu"
                                               v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.pekerjaan_ibu && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.pekerjaan_ibu && issubmit)
                                                   }"
                                                @change="error.data_keluarga.pekerjaan_ibu=''">
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
                                                <input type="number" class="form-control" id="validationCustom01" required
                                                v-model="data_keluarga.penghasilan"
                                                v-bind:class="{
                                                   'is-invalid' : (error.data_keluarga.penghasilan && issubmit), 
                                                   'is-valid' : (!error.data_keluarga.penghasilan && issubmit)
                                                   }"
                                                @change="error.data_keluarga.penghasilan=''">
                                                <div class="invalid-feedback">
                                                     {{error.data_keluarga.penghasilan}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" v-bind:class="{ show : step==4, active: step==4}" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="col-xl-12 col-md-12 mb-12">
                            <div class="card border-left-info shadow h-100   py-2">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                        <img v-bind:src="URLImage" class="img-thumbnail">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Data Diri</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:15%"><b>Nama Lengkap</b></td>
                                                    <td style="width:1%">:</td>
                                                    <td><span class="text-left">{{data_diri.nama_lengkap}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tempat TGL</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.tempat_lahir}} , {{data_diri.tgl_lahir}}/{{data_diri.bln_lahir}}/{{data_diri.thn_lahir}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Jenis Kelamin</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.jenis_kelamin}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Agama</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.agama}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.alamat}}</span></td>
                                                </tr>
                                                 <tr>
                                                    <td><b>Telepon</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_diri.telepon}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Data Keluarga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:15%"><b>Nama Ayah</b></td>
                                                    <td style="width:1%">:</td>
                                                    <td><span class="text-left">{{data_keluarga.nama_ayah}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nama Ibu</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_keluarga.nama_ibu}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pekerjaan Ayah</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_keluarga.pekerjaan_ayah}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pekerjaan Ibu</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_keluarga.pekerjaan_ibu}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Penghasilan Pe</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{data_keluarga.penghasilan}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="3" class="text-center">Asal Sekolah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width:15%"><b>Nama Sekolah</b></td>
                                                    <td style="width:1%">:</td>
                                                    <td><span class="text-left">{{asal_sekolah.nama_sekolah}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Alamat Sekolah</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{asal_sekolah.alamat_sekolah}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>NPSN Sekolah</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{asal_sekolah.npsn}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Telepon</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{asal_sekolah.telepon}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Nomor SKHUN</b></td>
                                                    <td>:</td>
                                                    <td><span class="text-left">{{asal_sekolah.skhun}}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div style="padding-top:10px;padding-bottom:10px;" class="text-right">
                    <button class="btn btn-secondary" @click="back" v-if="step != 1">Kembali</button>
                    <button class="btn btn-success" @click="lanjut" v-if="step != 4">Lanjut</button>
                </div>
            </div>
            <div class="col-lg-5">
                <div style="padding-top:10px;padding-bottom:10px;" class="text-right">
                    <button class="btn btn-primary" @click="simpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import api from '../../api';
export default {
    async asyncData({ query, error }) {
        let [parameter,info] = await Promise.all([
            api.ppdb.initial_parameter(),
            api.ppdb.info_user(),
          ])
        return {
          parameter: parameter.data,
          data_diri: info.data.data_diri,
          data_keluarga: info.data.data_keluarga,
          asal_sekolah: info.data.asal_sekolah,
          URLImage : info.data.URLImage,
        }
    },
    data() {
      return {
        parameter:{},
        formData:{},
        formDataSuport:true,
        data_diri:{},
        data_keluarga:{},
        asal_sekolah:{},
        URLImage:'',
        step:0,
        error:{
            data_diri:{
                nama_lengkap:'',
                tempat_lahir:'', 
                thn_lahir:'',
                bln_lahir:'',
                tgl_lahir:'',
                jenis_kelamin:'',
                agama_id:'',
                alamat:'',
                telepon:'',
                foto:''
                },
            data_keluarga:{
                nama_ayah:'',
                nama_ibu:'',
                pekerjaan_ayah:'',
                pekerjaan_ibu:'',
                penghasilan:''
            },
            asal_sekolah:{
                nama_sekolah:'',
                alamat_sekolah:'',
                npsn:'',
                telepon:'',
                skhun:''
            },
        },
        ppdb_id:0,
        issubmit:false
      }
    },
    mounted (){
      this.step = 1;
      this.ppdb_id = localStorage.getItem("ppdb_id");

      if(window.FormData !== undefined)  // for HTML5 browsers
      {
        this.formData = new FormData()    
      }else{
        this.formDataSuport = false
      }
      if(!this.$store.state.auth.user.is_complete){
        this.step = this.$store.state.auth.user.current_step !== null? this.$store.state.auth.user.current_step:this.step;
      }
      
    },
    created(){
       
    },
    methods:{
        initial(){

        },
        simpan(){
            var validation = true;
            this.issubmit = true;
            switch(this.step) {
                case 1:
                    validation = this.step1()
                    if (validation == true) {
                        this.$store.dispatch('layout/load',true);
                        this.data_diri_save().then(res=>{ 
                            if(res == true){
                               if(this.$store.state.auth.user.is_complete){
                                   //this.$router.redirect('/pendaftaran/details');
                                   window.location.href = '/pendaftaran/details'
                                }else{
                                    this.step=2;
                                    localStorage.removeItem("ppdb_id");
                                    window.scrollTo(0,0);
                                    this.$store.dispatch('layout/load',false);
                                }
                            }else{
                                this.$store.dispatch('layout/load',false);
                            } 
                            this.issubmit= false;
                        });
                    }
                break;
                case 2:
                   validation = this.step2()
                    if (validation == true) {
                        this.$store.dispatch('layout/load',true);
                        this.data_keluarga_save().then(res=>{ 
                            if(res == true){
                                if(this.$store.state.auth.user.is_complete){
                                    this.$router.push('/pendaftaran/details');
                                }else{
                                    this.step=3;
                                    window.scrollTo(0,0);
                                    this.$store.dispatch('layout/load',false);
                                }
                            }else{
                                this.$store.dispatch('layout/load',false);
                            } 
                            this.issubmit= false;
                        });
                    }
                break;
                case 3:
                   validation = this.step3()
                   if (validation == true) {
                        this.$store.dispatch('layout/load',true);
                        this.asal_sekolah_save().then(res=>{ 
                            if(res == true){
                                 if(this.$store.state.auth.user.is_complete){
                                   this.$router.push('/pendaftaran/details');
                                 }else{
                                    this.step=4;
                                    window.scrollTo(0,0);
                                    this.$store.dispatch('layout/load',false);
                                 }
                            }else{
                                this.$store.dispatch('layout/load',false);
                            } 
                            this.issubmit= false;

                        });
                    }
                break;
                case 4:
                   validation = this.step4()
                   if (validation == true) {
                        this.$store.dispatch('layout/load',true);
                        this.resume_save().then(res=>{
                            if(res == true)
                            {
                                localStorage.removeItem("ppdb_id");
                                this.$router.push('/pendaftaran/details');
                            }     
                            this.issubmit= false;
                        });
                    }
                break;
                default:
                    // code block
            }
        },
        lanjut(){
            var validation = true;
            this.issubmit= true;
            switch(this.step) {
                case 1:
                    validation = this.step1()
                    if (validation == true){this.step=2;this.issubmit= false;window.scrollTo(0,0);}
                    break;
                case 2:
                    validation = this.step2()
                    if (validation == true){this.step=3;this.issubmit= false;window.scrollTo(0,0);}
                    break;
                case 3:
                    validation =  this.step3()
                    if (validation == true){this.step=4;this.issubmit= false;window.scrollTo(0,0);}
                break;
                default:
                    // code block
            }
        },
        back(){
            this.step = this.step - 1;
            window.scrollTo(0,0);
        },
        step1(){
            var isvalid = true;
            if(!this.data_diri.nama_lengkap){
                this.error.data_diri.nama_lengkap ="nama lengkap harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.tempat_lahir){
                this.error.data_diri.tempat_lahir="tempat lahir harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.thn_lahir){
                this.error.data_diri.thn_lahir="harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.bln_lahir){
                this.error.data_diri.bln_lahir="harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.tgl_lahir){
                this.error.data_diri.tgl_lahir="harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.jenis_kelamin){
               this.error.data_diri.jenis_kelamin="jenis kelamin harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.agama_id){
                this.error.data_diri.agama_id="agama_id harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.alamat){
                this.error.data_diri.alamat="alamat harus diisi"
                isvalid = false;
            }
            if(!this.data_diri.telepon){
                this.error.data_diri.telepon="nomor telepon harus diisi"
                isvalid = false;
            }
            if(this.error.data_diri.foto){
                isvalid = false;
            }
            return isvalid;
        },
        step2(){
            var isvalid = true;
            if(!this.data_keluarga.nama_ayah){
                this.error.data_keluarga.nama_ayah='nama ayah harus diisi'
                isvalid = false;
            }
            if(!this.data_keluarga.nama_ibu){
                this.error.data_keluarga.nama_ibu ='nama ibu harus diisi'
                isvalid = false;
            }
            if(!this.data_keluarga.pekerjaan_ayah){
                this.error.data_keluarga.pekerjaan_ayah='pekerjaan ayah harus diisi'
                isvalid = false;
            }
            if(!this.data_keluarga.pekerjaan_ibu){
                this.error.data_keluarga.pekerjaan_ibu='pekerjaan ibu harus diisi'
                isvalid = false;
            }
            if(!this.data_keluarga.penghasilan){
                this.error.data_keluarga.penghasilan='penghasilan pe harus diisi'
                isvalid = false;
            }

            return isvalid;
        },
        step3(){
            var isvalid = true;
            if(!this.asal_sekolah.nama_sekolah){
                this.error.asal_sekolah.nama_sekolah='nama sekolah harus diisi'
                isvalid = false;
            }
            if(!this.asal_sekolah.alamat_sekolah){
               this.error.asal_sekolah.alamat_sekolah='alamat sekolah harus diisi'
                isvalid = false;
            }
            if(!this.asal_sekolah.npsn){
                this.error.asal_sekolah.npsn='npsn sekolah harus diisi'
                isvalid = false;
            }
            if(!this.asal_sekolah.skhun){
                this.error.asal_sekolah.skhun='nomor skhun harus diisi'
                isvalid = false;
            }

            return isvalid;
        },
        step4(){
            return this.step1() && this.step2() && this.step3()? true:false;
        },
        data_diri_save(){
            return new Promise((resolve) => { 
                this.data_diri.ppdb_id = this.ppdb_id;
                if(this.formDataSuport == true){
                    for ( var key in this.data_diri ) {
                        if(this.formData.get(key) == null)
                        {
                            this.formData.append(key,this.data_diri[key]);
                        }else{
                            this.formData.set(key,this.data_diri[key]);
                        }
                    }
                    api.ppdb.data_diri_save(this.formData).then(response=>{
                        alert("Berhasil disimpan");
                        resolve(true);
                    }).catch(error => {
                        alert("Terjadi kesalahan");
                        resolve(false);
                    });
                }else{
                    alert('Maaf browser anda tidak support dengan sistem ini, silahkan update broser terbaru !');
                }
            });
        },
        data_keluarga_save(){
            return new Promise((resolve) => { 
                api.ppdb.data_keluarga_save(this.data_keluarga).then(response=>{
                    alert("Berhasil disimpan");
                    resolve(true);
                }).catch(error => {
                    alert("Terjadi kesalahan");
                    resolve(false);
                });
            });
        },
        asal_sekolah_save(){
            return new Promise((resolve) => { 
                api.ppdb.asal_sekolah_save(this.asal_sekolah).then(response=>{
                    alert("Berhasil disimpan");
                    resolve(true);
                }).catch(error => {
                    alert("Terjadi kesalahan");
                    resolve(false);
                });
            });
        },
        resume_save(){
             return new Promise((resolve) => { 
                this.data_diri.ppdb_id = this.ppdb_id;
                if(this.formDataSuport == true){
                    for ( var key in this.data_diri ) {
                        if(this.formData.get(key) == null)
                        {
                            this.formData.append(key,this.data_diri[key]);
                        }else{
                            this.formData.set(key,this.data_diri[key]);
                        }
                    }
                    for ( var key in this.data_keluarga) {
                        if(this.formData.get(key) == null)
                        {
                            this.formData.append(key,this.data_keluarga[key]);
                        }else{
                            this.formData.set(key,this.data_keluarga[key]);
                        }
                    }
                    for ( var key in this.asal_sekolah) {
                        if(this.formData.get(key) == null)
                        {
                            this.formData.append(key,this.asal_sekolah[key]);
                        }else{
                            this.formData.set(key,this.asal_sekolah[key]);
                        }
                    }
                    api.ppdb.resume_save(this.formData).then(response=>{
                        resolve(true);
                    }).catch(error => {
                        alert("Terjadi kesalahan");
                        resolve(false);
                    });
                }else{
                    alert('Maaf browser anda tidak support dengan sistem ini, silahkan update broser terbaru !');
                }
            });
        },
        read_file(event){
            let input = event.target;
            if(input.files[0]){
                if(input.files[0].size > 2000)
                {
                    this.error.data_diri.foto = 'ukuran foto terlalu besar'
                }else{
                    var reader = new FileReader();
                    var data=this
                    reader.onload = function(){
                        data.URLImage = reader.result;
                    };
                    reader.readAsDataURL(input.files[0]);

                    if(this.formDataSuport == true){
                        if(this.formData.get('file') == null)
                        {
                            this.formData.append('file',input.files[0]);
                        }else{
                            this.formData.set('file',input.files[0]);
                        }
                    }
                    this.error.data_diri.foto =''
            }
        }else{
                this.error.data_diri.foto =''
        }
        },
        setAgama(){
            if(this.parameter.agama !== undefined)
            {
                if(this.data_diri.agama !== undefined && this.data_diri.agama_id !== undefined)
                {
                    let _agama = this.parameter.agama.filter(x => x.id = this.data_diri.agama_id);
                    if(_agama.length){
                        this.data_diri.agama = _agama[0].nama;
                    }
                }
            }
        }
    }
   
}
</script>

<style>
</style>
