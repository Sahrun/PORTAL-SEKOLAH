<?php

namespace App\Logic;

use App\Repository\WaliKelasRepository;
use App\Logic\AuthLogic;
use Illuminate\Support\Facades\DB;
use App\Utils\FilterBuilder;
use App\WaliKelas;

class WaliKelasLogic
{
    public $successStatus = 200;
    public $badRequest = 400;
    public $problem = 422;
    public $success ="OK";

    public $repo;
    public $auth;
    public $user;

    function __construct(WaliKelasRepository $_repo, AuthLogic $_auth, UserLogic $_user) {
        $this->repo = $_repo;
        $this->auth = $_auth;
        $this->user = $_user;
    }

    public function grid($request){
        $result = array();
        try{

            $mapping = $this->user->get_mapping_user();

            if($mapping == null)  
            return response()->json(['message' => 'mapping not found' ], $this-> problem);

            $filter = new FilterBuilder();
            $wali_kelas  = $this->repo->getAll($mapping->sekolah_id);
            $count = $wali_kelas->count();
            $pages =  ceil($count / $request->show);
            $data = $filter->filterBuilder($wali_kelas,$request,"nama");
            
            foreach($data as $key => $value)
            {
                array_push(
                    $result,
                    array(
                        'wali_kelas_id' => $value->id,
                        'nama' => $value->nama,
                        'kelas' => $value->kelas,
                        'jumlah_siswa' => $value->jumlah_siswa,
                        'keterangan' => $value->keterangan
                    )
                );
            }  

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

        return response()->json(
            ['data'  => $result,
            'count'  => $count,
            'status' => 'success', 
            'pages'  => $pages
            ]
            , $this-> successStatus);
    }
    
}
