<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'guru';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama','nip','sekolah_id','is_active','keterangan','created_by', 'modified_by'
    ];
}
