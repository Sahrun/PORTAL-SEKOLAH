<?php

namespace App\Logic;

use App\Repository\SekolahRepository;
use App\Logic\AuthLogic;
use App\MappingUser;
use App\Sekolah;
use App\Utils\Parameter;
use App\Utils\DefaultValue;
use Illuminate\Support\Facades\DB;
use App\Utils\FilterBuilder;

class SekolahLogic
{
    public $successStatus = 200;
    public $badRequest = 400;
    public $problem = 422;
    public $success ="OK";

    public $repo;
    public $auth;

    function __construct(SekolahRepository $_repo, AuthLogic $_auth) {
        $this->repo = $_repo;
        $this->auth = $_auth;
    }

    public function register($request){

        $sekolah_exist = $this->repo->isExist($request->sekolah);
        $email_exist = $this->repo->isEmailUserExist($request->admin_email);

        if($sekolah_exist !== null){
           return response()->json(['field' => 'sekolah','message' => 'nama sekolah sudah ada' ], $this-> problem);
        }else if($email_exist !== null){
            return response()->json(['field' => 'admin_email','message' => 'email admin sudah terdaftar' ], $this-> problem);
        }else{
            try {
                $user = $this->auth->get_current_user();
                $sekolah = $this->create_sekolah($user,$request);
                $user_map = $this->create_mapping_user($user,$request);
                $reg_user = $this->create_user($request);

                DB::transaction(function () use ($sekolah,$user_map,$reg_user) {  
                    $user = $this->auth->register_user($reg_user);
                    $sekolah->user_admin = $user->id;
                    $sekolah->save();
                    $user_map->sekolah_id = $sekolah->id;
                    $user_map->user_id = $user->id;
                    $user_map->save();
                });
            } catch (Exception $e) {
                return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
            }
        }

        return response()->json(['status' => 'success' ], $this-> successStatus);
    }

    private function create_sekolah($user,$request){
        $sekolah = new Sekolah;
        $sekolah->nama_sekolah = $request->sekolah;
        $sekolah->provinsi = $request->provinsi;
        $sekolah->kota = $request->kota;
        $sekolah->alamat_sekolah = $request->alamat;
        $sekolah->status = $request->status;
        $sekolah->npsn = $request->npsn;
        $sekolah->email = $request->email;
        $sekolah->created_by = $user->id_user;
        $sekolah->modified_by = $user->id_user;
        $sekolah->created_at = Date("Y-m-d h:i:s");
        $sekolah->updated_at = Date("Y-m-d h:i:s");
        return $sekolah;
    }
    
    private function create_user($request){

        $default = new DefaultValue;
        $req = (object) array("name" => $request->admin_name,
                     "email" => $request->admin_email,
                     "user_name" => $request->admin_email,
                     "password" => $default->password_admin);

        return $req;
    }

    private function create_mapping_user($user,$request){
        $mapping = new MappingUser;
        $param = new Parameter;
        $role_user_mapping = (object) $param->role_user_mapping;

        $mapping->role = $role_user_mapping->admin['key'];
        $mapping->created_by = $user->id_user;
        $mapping->modified_by = $user->id_user;
        $mapping->created_at = Date("Y-m-d h:i:s");
        $mapping->updated_at = Date("Y-m-d h:i:s");
        return $mapping;
    }

    public function grid($request){

        $filter = new FilterBuilder();
        $sekolah  = $this->repo->getAll();
        $count = $sekolah->count();
        $pages =  ceil($count / $request->show);
        $data = $filter->filterBuilder($sekolah,$request,"nama_sekolah");
        $result = array();
        foreach($data as $key => $value)
        {
            array_push(
                $result,
                array(
                    'id_sekolah' => $value->id,
                    'nama' => $value->nama_sekolah,
                    'status' => $value->status,
                    'npsn' => $value->npsn,
                    'provinsi' => $value->provinsi,
                    'kota' => $value->kota,
                    'created' => isset($value->created_at)?$value->created_at->format("F j, Y"):null
                )
            );
        }  

        return response()->json(
            ['data'  => $result,
            'count'  => $count,
            'status' => 'success', 
            'pages'  => $pages
            ]
            , $this-> successStatus);
    }

    public function byId($id)
    {   
        $sekolah  = $this->repo->byId($id);

        $result = array();

        $result = array(
            'id_sekolah'  => $sekolah->id,
            'provinsi'    => $sekolah->provinsi,
            'kota'        => $sekolah->kota,
            'alamat'      => $sekolah->alamat_sekolah,
            'sekolah'     => $sekolah->nama_sekolah,
            'status'      => $sekolah->status,
            'npsn'        => $sekolah->npsn,
            'email'       => $sekolah->email,
            'admin_name'  => $sekolah->admin_name,
            'admin_email' => $sekolah->admin_email
        );
        
        return response()->json(['data'  => $result], $this-> successStatus);
    }
    public function update($request){

        try {
            $user = $this->auth->get_current_user();

            $sekolah_exist = $this->repo->isExist($request->sekolah,$request->id_sekolah);

            if($sekolah_exist !== null){
                return response()->json(['field' => 'sekolah','message' => 'nama sekolah sudah ada' ], $this-> problem);
            }

            $sekolah = new Sekolah;
            $sekolah =  $sekolah::find($request->id_sekolah);

            if($sekolah == null){
                return response()->json(['field' => 'sekolah','message' => 'data sekolah tidak di temukan' ], $this-> problem);
            }

            $sekolah->nama_sekolah = $request->sekolah;
            $sekolah->provinsi = $request->provinsi;
            $sekolah->kota = $request->kota;
            $sekolah->alamat_sekolah = $request->alamat;
            $sekolah->status = $request->status;
            $sekolah->npsn = $request->npsn;
            $sekolah->email = $request->email;
            $sekolah->modified_by = $user->id_user;
            $sekolah->updated_at = Date("Y-m-d h:i:s");

            $sekolah->save();

        }catch (Exception $e) {
                return response()->json(['exception' => $e->getMessage()], $this-> badRequest);
        }
        
        return response()->json(['status' => 'success' ], $this-> successStatus);

    } 

}
