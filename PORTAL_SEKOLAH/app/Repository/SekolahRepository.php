<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\Sekolah;
use App\User;

class SekolahRepository
{

    function __construct() {
    }

    public function isExist($nama_sekolah,$id=null){
        $sekolah = new Sekolah;
        $result  = null;
        if($id == null){
            $result = $sekolah::where('nama_sekolah',$nama_sekolah)->first();
        }else{
            $result = $sekolah::where('nama_sekolah',$nama_sekolah)
            ->where('id','!=',$id)->first();
        }
        return $result;
    }
    public function isEmailUserExist($email){
        $user = new User;
        $result = $user::where('email',$email)->first();
        return $result;
    }
    public function getAll(){
        $sekolah = new Sekolah;
        return $sekolah;
    }

    public function byId($id)
    {
        $sekolah = new Sekolah;
        $result = $sekolah::leftjoin('user','user.id','=','sekolah.user_admin')
        ->select('sekolah.*','user.email as admin_email','user.name as admin_name')
        ->where('sekolah.id',$id)->first();

        return $result;
    }
}
