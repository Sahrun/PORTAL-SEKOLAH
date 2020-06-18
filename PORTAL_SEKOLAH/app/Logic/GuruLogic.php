<?php

namespace App\Logic;

use App\Repository\GuruRepository;
use App\Logic\AuthLogic;
use Illuminate\Support\Facades\DB;
use App\Utils\FilterBuilder;
use App\Guru;

class GuruLogic
{
    public $successStatus = 200;
    public $badRequest = 400;
    public $problem = 422;
    public $success ="OK";

    public $repo;
    public $auth;
    public $user;

    function __construct(GuruRepository $_repo, AuthLogic $_auth, UserLogic $_user) {
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
            $guru  = $this->repo->getAll($mapping->sekolah_id);
            $count = $guru->count();
            $pages =  ceil($count / $request->show);
            $data = $filter->filterBuilder($guru,$request,"nama");
            
            foreach($data as $key => $value)
            {
                array_push(
                    $result,
                    array(
                        'guru_id' => $value->id,
                        'nama' => $value->nama,
                        'nip' => $value->nip,
                        'mapel' => '',
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

            $guru = new Guru;

            $guru->nama = $request->nama;
            $guru->nip = $request->nip;
            $guru->sekolah_id = $mapping->sekolah_id;
            $guru->is_active = 1;
            $guru->keterangan = $request->keterangan;
            $guru->created_by = $mapping->id_user;
            $guru->modified_by = $mapping->id_user;
            $guru->created_at = Date("Y-m-d h:i:s");
            $guru->updated_at = Date("Y-m-d h:i:s");

            $guru->save();

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

        return response()->json(['status' => 'success'], $this-> successStatus);
    }
    public function by_id($id){

        $result = null;

        try{
            $guru = $this->repo->by_id($id);
            
            if($guru == null) 
            return response()->json(['message' => 'guru not found' ], $this-> problem);

            $result = array(
                'guru_id' => $guru->id,
                'nama' => $guru->nama,
                'nip' => $guru->nip,
                'keterangan' => $guru->keterangan
            );

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

       return response()->json(['status' => 'success','data' => $result], $this-> successStatus);
    }

    public function update($request){

        try{

            $mapping = $this->user->get_mapping_user();
            
            if($mapping == null)  
            return response()->json(['message' => 'mapping not found' ], $this-> problem);

            if($this->repo->isExist($request->nama,$mapping->sekolah_id,$request->guru_id))
            return response()->json(['exist' => 'nama sudah ada' ], $this-> problem);

            $guru = new Guru;
            $guru = $guru::find($request->guru_id);

            if($guru == null)  
            return response()->json(['message' => 'guru not found' ], $this-> problem);

            $guru->nama = $request->nama;
            $guru->nip = $request->nip;
            $guru->keterangan = $request->keterangan;
            $guru->modified_by = $mapping->id_user;
            $guru->updated_at = Date("Y-m-d h:i:s");

            $guru->save();

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

        return response()->json(['status' => 'success'], $this-> successStatus);
    }
}
