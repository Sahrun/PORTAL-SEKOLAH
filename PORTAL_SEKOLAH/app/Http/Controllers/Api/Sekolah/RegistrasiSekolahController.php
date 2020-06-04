<?php

namespace App\Http\Controllers\Api\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\SekolahLogic;

class RegistrasiSekolahController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $logic;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(SekolahLogic $_logic) {
        $this->logic = $_logic;
    }

    public function register(Request $request){
        return $this->logic->register($request);
    }

    public function grid(Request $request){
        return $this->logic->grid($request);
    }
    public function byId($id){
        return $this->logic->byId($id);
    }

    public function update(Request $request){
        return $this->logic->update($request);
    }
}
