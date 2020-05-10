<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table="sekolah";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_sekolah','alamat','provinsi','kota','status','npsn','email','created_by','modified_by'
    ];
}
