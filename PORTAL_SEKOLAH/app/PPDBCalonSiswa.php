<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PPDBCalonSiswa extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ppdb_calon_siswa';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "ppdb_id",
        "nama_lengkap",
        "tempat_lahir",
        "tgl_lahir",
        "bln_lahir",
        "thn_lahir",
        "jenis_kelamin",
        "agama_id",
        "alamat",
        "email",
        "telepon",
        "nama_ayah",
        "nama_ibu",
        "pekerjaan_ayah",
        "pekerjaan_ibu",
        "penghasilan",
        "asal_sekolah_id",
        "asal_sekolah",
        "alamat_sekolah",
        "npsn",
        "no_telopon_sekolah",
        "no_skhun",
        "foto",
        "user_id",
    ];
}
