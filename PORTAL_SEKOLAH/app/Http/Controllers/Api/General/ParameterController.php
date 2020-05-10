<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Controller;
use App\Utils\Parameter;

class ParameterController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $param;

    function __construct(Parameter $_param) {
        $this->param = $_param;
    } 

    public function status_sekolah(){
        return $this->param->status_sekolah;
    }
}
