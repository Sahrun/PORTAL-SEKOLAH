<?php

namespace App\Logic;

use App\Repository\ParamRepository;
use App\Logic\AuthLogic;
use Illuminate\Support\Facades\DB;
use App\Utils\FilterBuilder;

class ParamLogic
{
    public $successStatus = 200;
    public $badRequest = 400;
    public $problem = 422;
    public $success ="OK";

    public $repo;
    public $auth;
    public $user;

    function __construct(ParamRepository $_repo, AuthLogic $_auth, UserLogic $_user) {
        $this->repo = $_repo;
        $this->auth = $_auth;
        $this->user = $_user;
    }

    public function add_kelas(){
        $result = array();
        try{

            $mapping = $this->user->get_mapping_user();

            if($mapping == null)  
            return response()->json(['message' => 'mapping not found' ], $this-> problem);

            $kelas = $this->repo->list_kelas($mapping->sekolah_id);
            $wali_kelas = $this->repo->list_wali_kelas($mapping->sekolah_id);
            $jurusan = $this->repo->list_jurusan($mapping->sekolah_id);

            $res_kelas = array();
            $res_wali_kelas = array();
            $res_jurusan = array();
            
            foreach($kelas as $key => $value)
            {
                array_push(
                    $res_kelas,
                    array(
                        'id' => $value->id,
                        'nama' => $value->nama,
                    )
                );
            }  
            foreach($wali_kelas as $key => $value)
            {
                array_push(
                    $res_wali_kelas,
                    array(
                        'id' => $value->id,
                        'nama' => $value->nama,
                    )
                );
            }

            foreach($jurusan as $key => $value)
            {
                array_push(
                    $res_jurusan,
                    array(
                        'id' => $value->id,
                        'nama' => $value->nama,
                    )
                );
            }

            $result = array('kelas' => $res_kelas,
                            'wali_kelas' => $res_wali_kelas, 
                            'jurusan' => $res_jurusan 
            );

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

        return response()->json(
            ['data'  => $result], $this-> successStatus);
    }
}
