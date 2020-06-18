<?php

namespace App\Http\Controllers\Api\WaliKelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WaliKelas;
use App\Logic\WaliKelasLogic;

class WaliKelasController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $logic;

    function __construct(WaliKelasLogic $_logic) {
        $this->logic = $_logic;
    }

    public function grid(Request $request){
        return $this->logic->grid($request);
    }
}
