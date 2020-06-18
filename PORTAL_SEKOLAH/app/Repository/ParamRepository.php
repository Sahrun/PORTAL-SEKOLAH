<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Guru;
use App\Jurusan;
use App\Kelas;

class ParamRepository
{

    function __construct() {
    }

    public function list_kelas($sekolah){
        $result = array();
        $kelas = new Kelas;
        $result = $kelas::where('sekolah_id',$sekolah)
                        ->where('is_active',1)
                        ->get();
        
        return $result;
    }

    public function list_wali_kelas($sekolah){
        $result = array();
        $kelas = new Guru;
        $result = $kelas::where('sekolah_id',$sekolah)
                        ->where('is_active',1)
                        ->get();
        
        return $result;
    }

    public function list_jurusan($sekolah){
        $result = array();
        $kelas = new Jurusan;
        $result = $kelas::where('sekolah_id',$sekolah)
                        ->where('is_active',1)
                        ->get();
        
        return $result;
    }
   
    
}
