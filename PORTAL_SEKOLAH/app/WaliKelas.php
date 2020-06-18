<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaliKelas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wali_kelas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guru_id','sekolah_id','is_active','keterangan','created_by', 'modified_by'
    ];
}
