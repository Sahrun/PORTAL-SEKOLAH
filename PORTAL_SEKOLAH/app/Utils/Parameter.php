<?php

namespace App\Utils;

class Parameter {

    public $status_sekolah = array(
        'Negeri' => 'Negeri',
        'Swasta' => 'Swasta'
    );

    public $role_user_mapping =  array(
        "super_admin" => ["key" => "super_admin","val" => "Super Admin"],
        "admin"       => ["key" => "admin","val" => "Admin"],
        "wali_kelas"  => ["key" => "wali_kelas","val"=>"Wali Kelas"],
        "guru"        => ["key" => "guru","val" => "Guru"]
    );

    public $kelas = array(
        'X'   => 'X',
        'XI'  => 'XI',
        'XII' => 'XII',
    );

}

class DefaultValue 
{
    public $password_admin = "admin123";
}

?>
