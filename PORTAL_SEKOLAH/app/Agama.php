<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'agama';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama'
    ];
}
