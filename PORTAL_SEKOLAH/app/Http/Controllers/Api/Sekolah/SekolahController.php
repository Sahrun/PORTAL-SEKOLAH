<?php

namespace App\Http\Controllers\Api\Sekolah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sekolah;
use App\Logic\SekolahLogic;

class SekolahController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $logic;

     function __construct(SekolahLogic $_logic) {
        $this->logic = $_logic;
    }

    public function profile(){
        return $this->logic->profile();
    }

    public function update_profile(Request $request){
        return $this->logic->update_profile($request);
    }
}
