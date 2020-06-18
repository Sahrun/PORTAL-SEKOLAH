<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Jurusan;

class JurusanRepository
{

    function __construct() {
    }

    public function isExist($nama,$sekolah_id,$id=null){
        $jurusan = new Jurusan;
        $result  = null;
        if($id == null){
            $result = $jurusan::where('nama',$nama)
            ->where('sekolah_id',$sekolah_id)
            ->where('is_active',1)
            ->first();
        }else{
            $result = $jurusan::where('nama',$nama)
            ->where('sekolah_id',$sekolah_id)
            ->where('is_active',1)
            ->where('id','!=',$id)->first();
        }
        return $result;
    }
    public function getAll($sekolah_id){
        $result = array();
        $jurusan = new Jurusan;
        $result = $jurusan::where('sekolah_id',$sekolah_id)
                        ->where('is_active',1);
        
        return $result;
    }

    public function by_id($id)
    {
        $jurusan = new jurusan;
        $result = $jurusan::find($id);
        return $result;
    }
    
}
