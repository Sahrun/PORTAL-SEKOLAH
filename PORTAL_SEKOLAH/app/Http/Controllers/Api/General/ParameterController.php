<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;
use App\Utils\Parameter;
use App\Logic\ParamLogic;

class ParameterController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $param;
    public $logic_param;

    function __construct(Parameter $_param,ParamLogic $_logic_param) {
        $this->param = $_param;
        $this->logic_param = $_logic_param;
    } 

    public function status_sekolah(){
        return $this->param->status_sekolah;
    }
    public function add_kelas(){
        return $this->logic_param->add_kelas();
    }
}
