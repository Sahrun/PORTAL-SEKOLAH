<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Sekolah;
use App\User;

class SekolahRepository
{

    function __construct() {
    }

    public function isExist($nama_sekolah){
        $sekolah = new Sekolah;
        $result = $sekolah::where('nama_sekolah',$nama_sekolah)->first();
        return $result;
    }
    public function isEmailUserExist($email){
        $user = new User;
        $result = $user::where('email',$email)->first();
        return $result;
    }
}
