<?php

namespace App\Logic;

use App\Repository\KelasRepository;
use App\Logic\AuthLogic;
use Illuminate\Support\Facades\DB;
use App\Utils\FilterBuilder;
use App\Kelas;

class KelasLogic
{
    public $successStatus = 200;
    public $badRequest = 400;
    public $problem = 422;
    public $success ="OK";

    public $repo;
    public $auth;
    public $user;

    function __construct(KelasRepository $_repo, AuthLogic $_auth, UserLogic $_user) {
        $this->repo = $_repo;
        $this->auth = $_auth;
        $this->user = $_user;
    }

    public function list(){
        $result = array();
        try{

            $mapping = $this->user->get_mapping_user();

            if($mapping == null)  
            return response()->json(['message' => 'mapping not found' ], $this-> problem);

            $kelas = $this->repo->list($mapping->sekolah_id);

            foreach($kelas as $key => $value)
            {
                array_push(
                    $result,
                    array(
                        'id' => $value->id,
                        'nama' => $value->nama,
                    )
                );
            }  

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

        return response()->json(
            ['data'  => $result] , $this-> successStatus);
        }
    
}
