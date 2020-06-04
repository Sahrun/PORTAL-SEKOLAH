<template>
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
    props:['data_diri','data_keluarga','asal_sekolah','step','issubmit','URLImage']
}
</script>