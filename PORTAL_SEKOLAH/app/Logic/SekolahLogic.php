<?php

namespace App\Logic;

use App\Repository\SekolahRepository;
use App\Logic\AuthLogic;
use App\MappingUser;
use App\Sekolah;
use App\Utils\Parameter;
use App\Utils\DefaultValue;
use Illuminate\Support\Facades\DB;

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
                    $sekolah->save();
                    $user = $this->auth->register_user($reg_user);
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


}
