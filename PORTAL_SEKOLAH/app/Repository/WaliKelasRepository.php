<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\WaliKelas;
use App\Guru;

class WaliKelasRepository
{

    function __construct() {
    }

    public function isExist($guru_id,$sekolah_id,$id=null){
        $wali_kelas = new WaliKelas;
        $result  = null;
        if($id == null){
            $result = $wali_kelas::where('guru_id',$guru_id)
            ->where('sekolah_id',$sekolah_id)
            ->where('is_active',1)
            ->first();
        }else{
            $result = $wali_kelas::where('guru_id',$guru_id)
            ->where('sekolah_id',$sekolah_id)
            ->where('is_active',1)
            ->where('id','!=',$id)->first();
        }
        return $result;
    }
    public function getAll($sekolah_id){
        $result = array();
        $guru = new Guru;
        $result = $guru::join('sub_kelas','guru.id','=','sub_kelas.wali_kelas_id')
                        ->select('sub_kelas.id AS id',
                                 'guru.nama AS nama',
                                 'sub_kelas.nama AS kelas',
                                 DB::raw('0 AS jumlah_siswa'),
                                 'sub_kelas.keterangan AS keterangan',
                                 'sub_kelas.created_at AS created_at')
                        ->where('guru.sekolah_id',$sekolah_id)
                        ->where('sub_kelas.is_active',1)
                        ->where('guru.is_active',1)
                        ->groupBy('guru.nama','sub_kelas.nama','sub_kelas.keterangan','sub_kelas.id','sub_kelas.created_at');
        
        return $result;
    }

    public function by_id($id)
    {
        $wali_kelas = new WaliKelas;
        $result = $wali_kelas::find($id);
        return $result;
    }

    public function listGuru(){
        return;
    }

    public function listKelas(){
        return ;
    }
    
}
