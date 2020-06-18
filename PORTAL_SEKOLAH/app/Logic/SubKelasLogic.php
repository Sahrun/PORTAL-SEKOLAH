<?php

namespace App\Logic;

use App\Repository\SubKelasRepository;
use App\Logic\AuthLogic;
use Illuminate\Support\Facades\DB;
use App\Utils\FilterBuilder;
use App\SUBKelas;

class SubKelasLogic
{
    public $successStatus = 200;
    public $badRequest = 400;
    public $problem = 422;
    public $success ="OK";

    public $repo;
    public $auth;
    public $user;

    function __construct(SubKelasRepository $_repo, AuthLogic $_auth, UserLogic $_user) {
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
            $subKelas  = $this->repo->getAll($mapping->sekolah_id);
            $count = $subKelas->count();
            $pages =  ceil($count / $request->show);
            $data = $filter->filterBuilder($subKelas,$request,"sub_kelas.nama");
            
            foreach($data as $key => $value)
            {
                array_push(
                    $result,
                    array(
                        'sub_kelas_id' => $value->id,
                        'nama' => $value->nama,
                        'kelas' => $value->kelas,
                        'wali_kelas' => $value->wali_kelas,
                        'jurusan' => $value->jurusan,
                        'jumlah_siswa' => $value->jumlah_siswa
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

            if($this->repo->isExist($mapping->sekolah_id,$request))
            return response()->json(['exist' => 'nama sudah ada' ], $this-> problem);

            $subKelas = new SUBKelas;

            $subKelas->nama = $request->nama;
            $subKelas->kelas_id = $request->kelas;
            $subKelas->jurusan_id = $request->jurusan;
            $subKelas->is_active = 1;
            $subKelas->wali_kelas_id = $request->wali_kelas;
            $subKelas->sekolah_id = $mapping->sekolah_id;
            $subKelas->keterangan = $request->keterangan;
            $subKelas->created_by = $mapping->id_user;
            $subKelas->modified_by = $mapping->id_user;
            $subKelas->created_at = Date("Y-m-d h:i:s");
            $subKelas->updated_at = Date("Y-m-d h:i:s");

            $subKelas->save();

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

        return response()->json(['status' => 'success'], $this-> successStatus);
    }
    public function edit($id){

        $result = null;

        try{
            $subKelas = $this->repo->by_id($id);
            
            if($subKelas == null) 
            return response()->json(['message' => 'subKelas not found' ], $this-> problem);

            $result = array(
                'sub_Kelas_id' => $subKelas->id,
                'nama'        => $subKelas->nama,
                'wali_kelas'  => $subKelas->wali_kelas_id,
                'kelas'       => $subKelas->kelas_id,
                'jurusan'     => $subKelas->jurusan_id, 
                'keterangan'  => $subKelas->keterangan
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

            if($this->repo->isExist($mapping->sekolah_id,$request,$request->sub_Kelas_id))
            return response()->json(['exist' => 'nama sudah ada' ], $this-> problem);

            $subKelas = new SUBKelas;
            $subKelas = $subKelas::find($request->sub_Kelas_id);

            if($subKelas == null)  
            return response()->json(['message' => 'subKelas not found' ], $this-> problem);

            $subKelas->nama = $request->nama;
            $subKelas->kelas_id = $request->kelas;
            $subKelas->jurusan_id = $request->jurusan;
            $subKelas->wali_kelas_id = $request->wali_kelas;
            $subKelas->sekolah_id = $mapping->sekolah_id;
            $subKelas->keterangan = $request->keterangan;
            $subKelas->modified_by = $mapping->id_user;
            $subKelas->updated_at = Date("Y-m-d h:i:s");

            $subKelas->save();

        }catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }

        return response()->json(['status' => 'success'], $this-> successStatus);
    }
}
