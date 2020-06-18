<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Guru;
class GuruRepository
{

    function __construct() {
    }

    public function isExist($nama,$sekolah_id,$id=null){
        $guru = new Guru;
        $result  = null;
        if($id == null){
            $result = $guru::where('nama',$nama)
            ->where('sekolah_id',$sekolah_id)
            ->where('is_active',1)
            ->first();
        }else{
            $result = $guru::where('nama',$nama)
            ->where('sekolah_id',$sekolah_id)
            ->where('is_active',1)
            ->where('id','!=',$id)->first();
        }
        return $result;
    }
    public function getAll($sekolah_id){
        $result = array();
        $guru = new Guru;
        $result = $guru::where('sekolah_id',$sekolah_id)
                        ->where('is_active',1);
        
        return $result;
    }

    public function by_id($id)
    {
        $guru = new Guru;
        $result = $guru::find($id);
        return $result;
    }
    
}
