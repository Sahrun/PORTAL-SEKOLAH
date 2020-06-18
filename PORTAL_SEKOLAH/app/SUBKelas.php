<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SUBKelas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sub_kelas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama','kelas_id','wali_kelas_id','jurusan_id','sekolah_id','is_active','keterangan','created_by', 'modified_by'
    ];
}
