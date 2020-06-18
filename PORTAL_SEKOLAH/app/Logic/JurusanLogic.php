<?php

namespace App\Logic;

use App\Repository\JurusanRepository;
use App\Logic\AuthLogic;
use Illuminate\Support\Facades\DB;
use App\Utils\FilterBuilder;
use App\Jurusan;

class JurusanLogic
{
    public $successStatus = 200;
    public $badRequest = 400;
    public $problem = 422;
    public $success ="OK";

    public $repo;
    public $auth;
    public $user;

    function __construct(JurusanRepository $_repo, AuthLogic $_auth, UserLogic $_user) {
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
            $jurusan  = $this->repo->getAll($mapping->sekolah_id);
            $count = $jurusan->count();
            $pages =  ceil($count / $request->show);
            $data = $filter->filterBuilder($jurusan,$request,"nama");
            
            foreach($data as $key => $value)
            {
                array_push(
                    $result,
                    array(
                        'jurusan_id' => $value->id,
                        'nama' => $value->nama,
                        'keterangan' => $value->keterangan,
                        'created' => isset($value->created_at)?$value->created_at->format("F j, Y"):null
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
    
    public function save($request){

        try{

            $mapping = $this->user->get_mapping_user();
            
            if($mapping == null)  
            return response()->json(['message' => 'mapping not found' ], $this-> problem);

            if($this->repo->isExist($request->nama,$mapping->sekolah_id))
            return response()->json(['exist' => 'nama sudah ada' ], $this-> problem);

            $jurusan = new Jurusan;

            $jurusan->nama = $request->nama;
            $jurusan->sekolah_id = $mapping->sekolah_id;
            $jurusan->is_active = 1;
            $jurusan->keterangan = $request->keterangan;
            $jurusan->created_by = $mapping->id_user;
            $jurusan->modified_by = $mapping->id_user;
            $jurusan->created_at = Date("Y-m-d h:i:s");
            $jurusan->updated_at = Date("Y-m-d h:i:s");

            $jurusan->save();

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

        return response()->json(['status' => 'success'], $this-> successStatus);
    }

    public function delete($id){

        try{

            $mapping = $this->user->get_mapping_user();
            
            if($mapping == null)  
            return response()->json(['message' => 'mapping not found' ], $this-> problem);

            $jurusan = new Jurusan;
            $jurusan = $jurusan::find($id);

            if($jurusan == null)  
            return response()->json(['message' => 'jurusan not found' ], $this-> problem);

            $jurusan->is_active = 0;
            $jurusan->updated_at = Date("Y-m-d h:i:s");

            $jurusan->save();

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

        return response()->json(['status' => 'success'], $this-> successStatus);
    }
    
}
