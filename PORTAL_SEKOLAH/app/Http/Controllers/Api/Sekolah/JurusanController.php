<?php

namespace App\Http\Controllers\Api\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jurusan;
use App\Logic\JurusanLogic;

class JurusanController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $logic;

    function __construct(JurusanLogic $_logic) {
        $this->logic = $_logic;
    }

    public function grid(Request $request){
        return $this->logic->grid($request);
    }
    public function save(Request $request)
    {
        return $this->logic->save($request);
    }
    
    public function delete($id){
        return $this->logic->delete($id);
    }
}
