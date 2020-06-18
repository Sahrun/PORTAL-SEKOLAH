<?php

namespace App\Logic;
use App\Logic\AuthLogic;
use App\MappingUser;

class UserLogic
{
    public $repo;
    public $auth;

    function __construct(AuthLogic $_auth) {
        $this->auth = $_auth;
    }

    public function get_mapping_user(){
        
        $resut = array();

        $user = $this->auth->get_current_user();
        if($user == null) return null;

        $mapping = MappingUser::where('user_id',$user->id_user)->first();
        if($mapping == null) return null;

        $resut = (object) array(
            'sekolah_id' => $mapping->sekolah_id,
            'id_user'    =>  $user->id_user
        );

        return $resut;

    }
}
