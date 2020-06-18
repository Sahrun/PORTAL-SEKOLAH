<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;
use App\SUBKelas;

class SubKelasRepository
{

    function __construct() {
    }

    public function isExist($sekolah_id,$request,$id=null)
    {
        $subKelas = new SUBKelas;
        $result  = null;
        if($id == null){
            $result = $subKelas::where('nama',$request->nama)
            ->where('sekolah_id',$sekolah_id)
            ->where('is_active',1)
            ->where('kelas_id',$request->kelas)
            ->where('jurusan_id',$request->jurusan)
            ->first();
        }else{
            $result = $subKelas::where('nama',$request->nama)
            ->where('sekolah_id',$sekolah_id)
            ->where('is_active',1)
            ->where('kelas_id',$request->kelas)
            ->where('jurusan_id',$request->jurusan)
            ->where('id','!=',$id)->first();
        }
        return $result;
    }
    public function getAll($sekolah_id){
        $result = array();
        $subKelas = new SUBKelas;
        $result = $subKelas::join('jurusan','sub_kelas.jurusan_id','=','jurusan.id')
                        ->join('kelas','sub_kelas.kelas_id','=','kelas.id')
                        ->leftjoin('guru','sub_kelas.wali_kelas_id','=','guru.id')
                        ->select('jurusan.nama AS jurusan'
                                 ,'guru.nama AS wali_kelas'
                                 ,'kelas.nama AS kelas'
                                 ,'sub_kelas.nama AS nama'
                                 ,'sub_kelas.id'
                                 ,'sub_kelas.created_at AS created_at'
                                 ,DB::raw('0 AS jumlah_siswa')
                                 )
                        ->where('sub_kelas.sekolah_id',$sekolah_id)
                        ->where('sub_kelas.is_active',1)
                        ->groupBy('jurusan.nama','guru.nama','kelas.nama','sub_kelas.nama','sub_kelas.id','sub_kelas.created_at');
        
        return $result;
    }

    public function by_id($id)
    {
        $subKelas = new SubKelas;
        $result = $subKelas::find($id);
        return $result;
    }
    
}
