<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Kelas;

class KelasRepository
{

    function __construct() {
    }

    public function list($sekolah_id){
        $result = array();
        $kelas = new Kelas;
        $result = $kelas::where('sekolah_id',$sekolah_id)
                        ->where('is_active',1)
                        ->get();
        
        return $result;
    }
    
}
