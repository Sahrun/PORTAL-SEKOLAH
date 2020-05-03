<?php

namespace App\Repository;

use App\Users;
use App\PPDBUser;
use App\PPDBCalonSiswa;
use App\Agama;
use Illuminate\Support\Facades\DB;

class PPDBRepository
{
    public $users;
    public $ppdb_user;
    public $ppdb_calon_siswa;

    function __construct(Users $_users,PPDBUser $_ppdbuser,PPDBCalonSiswa $_ppdb_calon_siswa) {
        $this->users = $_users;
        $this->ppdb_user = $_ppdbuser;
        $this->ppdb_calon_siswa = $_ppdb_calon_siswa;
    }

    public function daftar_sekolah(){
        $result = DB::table('ppdb')
            ->select('ppdb.id', 'sekolah.nama_sekolah')
            ->join('sekolah', 'sekolah.id', '=', 'ppdb.sekolah_id')
            ->get();
        return $result;
    }

    public function get_ppdb_user_by_id($id){

        $ppdb_user = $this->ppdb_user::find($id);

        if($ppdb_user == null)
        {
            return null;
        }

        return $ppdb_user;
    }

    public function get_calon_siswa_by_user_id($id){
        $calon_siswa = $this->ppdb_calon_siswa::leftjoin('agama as  agm', 'agm.id', '=', 'ppdb_calon_siswa.agama_id')
                       ->select('ppdb_calon_siswa.*', 'agm.nama as agama')
                       ->where('ppdb_calon_siswa.user_id', $id)
                       ->first();
        return $calon_siswa;
    }

    public function calon_siswa_create($calon_siswa){
        $calon_siswa->save();
    }

    public function calon_siswa_update($calon_siswa){
        $calon_siswa->save();
    }
    
    public function list_agama(){
        $result = Agama::all();
        return $result;
    }
    public function ppdb_information($id){
        $ppdb = $this->ppdb_user::leftjoin('ppdb_calon_siswa as  b', 'b.user_id', '=', 'ppdb_user.id')
                       ->select('b.is_complete', 'b.current_step')
                       ->where('ppdb_user.id', $id)
                       ->first();
        return $ppdb;
    }

}
