<?php

namespace App\Logic;

use App\Repository\PPDBRepository;
use App\Logic\AuthLogic;
use App\PPDBCalonSiswa;

use File;
use Illuminate\Support\Facades\DB;
use PDF;

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

        $uploadFile = null;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $uploadFile = $this->UploadImage($file);
        }

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
            $calon_siswa->agama_id = $request->agama_id;
            $calon_siswa->alamat = $request->alamat;
            $calon_siswa->telepon = $request->telepon;
            $calon_siswa->user_id = $curent_user->id_user;
            $calon_siswa->foto = $request->hasFile('file') && $uploadFile['success'] ? $uploadFile['pathFile']:null;
            $calon_siswa->current_step = 1;
            $calon_siswa->created_at = Date("Y-m-d h:i:s");
            $calon_siswa->updated_at = Date("Y-m-d h:i:s");

            $this->repo->calon_siswa_create($calon_siswa);

        }else{ // Update data baru

            if(!empty($calon_siswa->foto) && $request->hasFile('file') && $uploadFile['success'])
            {
                File::delete($calon_siswa->foto);
            }

            $calon_siswa->nama_lengkap = $request->nama_lengkap;
            $calon_siswa->tempat_lahir = $request->tempat_lahir;
            $calon_siswa->tgl_lahir = $request->tgl_lahir;
            $calon_siswa->bln_lahir = $request->bln_lahir;
            $calon_siswa->thn_lahir = $request->thn_lahir;
            $calon_siswa->jenis_kelamin = $request->jenis_kelamin;
            $calon_siswa->agama_id = $request->agama_id;
            $calon_siswa->alamat = $request->alamat;
            $calon_siswa->telepon = $request->telepon;
            $calon_siswa->foto = $request->hasFile('file') && $uploadFile['success'] ? $uploadFile['pathFile']:$calon_siswa->foto;
            $calon_siswa->updated_at = Date("Y-m-d h:i:s");

            $this->repo->calon_siswa_update($calon_siswa);
        }

       return response()->json(['status' => 'success' ], $this-> successStatus);
    }

    public function data_keluarga_save($request){

        $curent_user = $this->auth->get_current_user();
        $ppdb_user = $this->repo->get_ppdb_user_by_id($curent_user->id_user);

        if($ppdb_user == null)
        {
            return response()->json(['status' => 'faild' ], $this-> badRequest);
        }

        $calon_siswa = $this->repo->get_calon_siswa_by_user_id($ppdb_user->id);
        if($calon_siswa == null)
        {
            return response()->json(['status' => 'faild' ], $this-> badRequest);
        }

        $calon_siswa->nama_ayah = $request->nama_ayah;
        $calon_siswa->nama_ibu = $request->nama_ibu;
        $calon_siswa->pekerjaan_ayah = $request->pekerjaan_ayah;
        $calon_siswa->pekerjaan_ibu = $request->pekerjaan_ibu;
        $calon_siswa->penghasilan = $request->penghasilan;
        $calon_siswa->current_step =  $calon_siswa->is_complete == null? 2 : $calon_siswa->current_step;
        $calon_siswa->updated_at = Date("Y-m-d h:i:s");

        $this->repo->calon_siswa_update($calon_siswa);

        return response()->json(['status' => 'success' ], $this-> successStatus);
    }

    public function asal_sekolah_save($request){

        $curent_user = $this->auth->get_current_user();
        $ppdb_user = $this->repo->get_ppdb_user_by_id($curent_user->id_user);

        if($ppdb_user == null)
        {
            return response()->json(['status' => 'faild' ], $this-> badRequest);
        }

        $calon_siswa = $this->repo->get_calon_siswa_by_user_id($ppdb_user->id);
        if($calon_siswa == null)
        {
            return response()->json(['status' => 'faild' ], $this-> badRequest);
        }
        
        $calon_siswa->asal_sekolah = $request->nama_sekolah;
        $calon_siswa->alamat_sekolah = $request->alamat_sekolah;
        $calon_siswa->npsn = $request->npsn;
        $calon_siswa->no_telopon_sekolah = $request->telepon;
        $calon_siswa->no_skhun = $request->skhun;
        $calon_siswa->current_step =  $calon_siswa->is_complete == null? 3 : $calon_siswa->current_step;
        $calon_siswa->updated_at = Date("Y-m-d h:i:s");

        $this->repo->calon_siswa_update($calon_siswa);

        return response()->json(['status' => 'success' ], $this-> successStatus);
    }
    public function resume_save($request){
        
        DB::transaction(function () use ($request) {        
            $this->data_diri_save($request);
            $this->data_keluarga_save($request);
            $this->asal_sekolah_save($request);

            $curent_user = $this->auth->get_current_user();
            $ppdb_user = $this->repo->get_ppdb_user_by_id($curent_user->id_user);
            $calon_siswa = $this->repo->get_calon_siswa_by_user_id($ppdb_user->id);
            $calon_siswa->is_complete = 1;
            $this->repo->calon_siswa_update($calon_siswa);
    
        });
    
        return response()->json(['status' => 'success' ], $this-> successStatus);
    }
    public function current_data(){

        $curent_user = $this->auth->get_current_user();
        $ppdb_user = $this->repo->get_ppdb_user_by_id($curent_user->id_user);

        if($ppdb_user == null)
        {
            return response()->json(['status' => 'faild' ], $this-> badRequest);
        }

        $calon_siswa = $this->repo->get_calon_siswa_by_user_id($ppdb_user->id);

        $data_diri = (object) array(
            "ppdb_id"       => "",
            "nama_lengkap"  => "",
            "tempat_lahir"  => "",
            "tgl_lahir"     => "",
            "bln_lahir"     => "",
            "thn_lahir"     => "",
            "jenis_kelamin" => "",
            "agama_id"      => "",
            "agama"         => "",
            "alamat"        => "",
            "telepon"       => "",
        );

        $data_keluarga = (object) array(
            "nama_ayah"         => "",
            "nama_ibu"          => "",
            "pekerjaan_ayah"    => "",
            "pekerjaan_ibu"     => "",
            "penghasilan"       => "",
        );

        $asal_sekolah = (object) array(
            "nama_sekolah"      => "",
            "alamat_sekolah"    => "",
            "npsn"              => "",
            "telepon"           => "",
            "skhun"             => "",
        );
        
        $URLImage = "";

        if($calon_siswa !== null)
        {
            $data_diri->ppdb_id       = $calon_siswa->ppdb_id;
            $data_diri->nama_lengkap  = $calon_siswa->nama_lengkap;
            $data_diri->tempat_lahir  = $calon_siswa->tempat_lahir;
            $data_diri->tgl_lahir     = $calon_siswa->tgl_lahir < 10 ? "0".$calon_siswa->tgl_lahir : ''.$calon_siswa->tgl_lahir.'';
            $data_diri->bln_lahir     = $calon_siswa->bln_lahir < 10 ? "0".$calon_siswa->bln_lahir:''.$calon_siswa->bln_lahir.'';
            $data_diri->thn_lahir     = $calon_siswa->thn_lahir;
            $data_diri->jenis_kelamin = $calon_siswa->jenis_kelamin;
            $data_diri->agama_id      = $calon_siswa->agama_id;
            $data_diri->agama         = $calon_siswa->agama;
            $data_diri->alamat        = $calon_siswa->alamat;
            $data_diri->telepon       = $calon_siswa->telepon;

            
            $data_keluarga->nama_ayah         = $calon_siswa->nama_ayah;
            $data_keluarga->nama_ibu          = $calon_siswa->nama_ibu;
            $data_keluarga->pekerjaan_ayah    = $calon_siswa->pekerjaan_ayah;
            $data_keluarga->pekerjaan_ibu     = $calon_siswa->pekerjaan_ibu;
            $data_keluarga->penghasilan       = $calon_siswa->penghasilan;
                
            $asal_sekolah->nama_sekolah      = $calon_siswa->asal_sekolah;
            $asal_sekolah->alamat_sekolah    = $calon_siswa->alamat_sekolah;
            $asal_sekolah->npsn              = $calon_siswa->npsn;
            $asal_sekolah->telepon           = $calon_siswa->no_telopon_sekolah;
            $asal_sekolah->skhun             = $calon_siswa->no_skhun;

            $URLImage = $calon_siswa->foto !== null? url('')."/".$calon_siswa->foto : $calon_siswa->foto;

        }

        return response()->json([
            'data_diri'     => $data_diri,
            'data_keluarga' => $data_keluarga,
            'asal_sekolah'  => $asal_sekolah,
            'URLImage'      => $URLImage
            ], $this-> successStatus);
    }

    public function initial_parameter(){

        $tanggal=array();
        $bulan=array();
        $tahun = array();
        $agama = array();

        try {
    
            for($i=1;$i<=31;$i++){
                $tgl = $i < 10 ?"0".$i:''.$i.'';
                array_push($tanggal,$tgl);
            }
    
            for($i=1;$i<=12;$i++)
            {
                $bln = $i < 10 ?"0".$i:''.$i.'';
                array_push($bulan,$bln);
            }
    
            $current_year =  date("Y");
            $start_year = $current_year + 10;
            $end_year = $current_year - 10;
    
            for($i = $start_year;$i>= $end_year;$i--)
            {
                array_push($tahun,$i);
            }
            
            $agama = $this->repo->list_agama();
    
        } catch (Exception $e) {
           return response()->json([
               'exception' => $e->getMessage()
            ], $this-> badRequest);
        }

        return response()->json([
               'agama' => $agama,
               'bulan' => $bulan,
               'tanggal' => $tanggal,
               'tahun' => $tahun 
        ], $this-> successStatus);
    }
    public function UploadImage($file){
        $result = [];
        $success = false;

        $file_ext = $file->extension();
        $path = 'PPDB';
        $pathFile = "";
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = str_shuffle($char);
        $filename = $random."_".date('mdYhia').".".$file_ext;
        $extensions = array("jpg","jpeg","png");
        if(in_array(strtolower($file_ext),$extensions) ) {
            $file->move($path,$filename);
            $success = true;
        }
        
        $result = [
            'pathFile'    => $path."/".$filename,
            'success' => $success
        ];

        return $result;
    }

    public function ppdb_information($id){
        $ppdb =  $this->repo->ppdb_information($id);
        return $ppdb;
    }

    public function print($id_user){
        $curent_user = $this->auth->get_user_by_id($id_user);
        $calon_siswa = $this->repo->get_ppdb_user_by_id($curent_user->id_user);
        $pdf = PDF::loadview('PPDB/print');
	    return $pdf->download('resume.pdf');
    }
}
