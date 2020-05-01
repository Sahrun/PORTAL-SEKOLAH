<?php

namespace App\Logic;

use App\Repository\PPDBRepository;
use App\Logic\AuthLogic;
use App\PPDBCalonSiswa;

class PPDBLogic
{
    public $successStatus = 200;
    public $badRequest = 400;
    public $success ="OK";

    public $repo;
    public $auth;

    function __construct(PPDBRepository $_repo, AuthLogic $_auth) {
        $this->repo = $_repo;
        $this->auth = $_auth;
    }

    public function daftar_sekolah(){
        $result = $this->repo->daftar_sekolah();
        return $result;
    }

    public function data_diri_save($request){

        $curent_user = $this->auth->get_current_user();
        $ppdb_user = $this->repo->get_ppdb_user_by_id($curent_user->id_user);

        if($ppdb_user == null)
        {
            return response()->json(['status' => 'faild' ], $this-> badRequest);
        }

        $calon_siswa = $this->repo->get_calon_siswa_by_user_id($ppdb_user->id);

        if($calon_siswa == null){ // create data baru
            $calon_siswa = new PPDBCalonSiswa;

            $calon_siswa->ppdb_id = $request->ppdb_id;
            $calon_siswa->nama_lengkap = $request->nama_lengkap;
            $calon_siswa->tempat_lahir = $request->tempat_lahir;
            $calon_siswa->tgl_lahir = $request->tgl_lahir;
            $calon_siswa->bln_lahir = $request->bln_lahir;
            $calon_siswa->thn_lahir = $request->thn_lahir;
            $calon_siswa->jenis_kelamin = $request->jenis_kelamin;
            $calon_siswa->agama_id = null;//$request->agama;
            $calon_siswa->alamat = $request->alamat;
            $calon_siswa->telepon = $request->telepon;
            $calon_siswa->user_id = $curent_user->id_user;
            $calon_siswa->created_at = Date("Y-m-d h:i:s");
            $calon_siswa->updated_at = Date("Y-m-d h:i:s");
    

            $this->repo->calon_siswa_create($calon_siswa);

        }else{ // Update data baru
            $calon_siswa= array(
                "nama_lengkap" => $request->nama_lengkap,
                "tempat_lahir" => $request->tempat_lahir,
                "tgl_lahir" => $request->tgl_lahir,
                "bln_lahir" => $request->bln_lahir,
                "thn_lahir" => $request->thn_lahir,
                "jenis_kelamin" => $request->jenis_kelamin,
                "agama_id" => $request->agama,
                "alamat" => $request->alamat,
                "telepon" => $request->telepon,
                "updated_at" => Date("Y-m-d h:i:s")
            );

            $this->repo->calon_siswa_update($calon_siswa);
        }

       return response()->json(['status' => 'success' ], $this-> successStatus);
    }

    public function data_keluarga_save(){
        $result = $this->repo->daftar_sekolah();
        return $result;
    }

    public function asal_sekolah_save(){
        $result = $this->repo->daftar_sekolah();
        return $result;
    }

}
