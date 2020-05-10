<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MappingUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mapping_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','sekolah_id','role','created_by', 'modified_by'
    ];

}
