<?php

namespace App\Http\Controllers\Api\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\SubKelasLogic;

class SubKelasController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $logic;

    function __construct(SubKelasLogic $_logic) {
        $this->logic = $_logic;
    }

    public function grid(Request $request){
        return $this->logic->grid($request);
    }
    public function save(Request $request)
    {
        return $this->logic->save($request);
    }
    public function edit($id){
        return $this->logic->edit($id);
    }
    
    public function update(Request $request){
        return $this->logic->update($request);
    }
}
