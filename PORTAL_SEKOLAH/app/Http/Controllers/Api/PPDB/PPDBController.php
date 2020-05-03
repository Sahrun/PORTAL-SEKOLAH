<?php

namespace App\Http\Controllers\Api\PPDB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\PPDBLogic;

class PPDBController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $logic;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(PPDBLogic $_logic) {
        $this->logic = $_logic;
    }

    public function list_sekolah(){
        $response = $this->logic->daftar_sekolah();
        return response()->json(['success'=> $this-> success,'data' =>  $response  ], $this->successStatus);
    }
    public function data_diri_save(Request $request)
    {
        return $this->logic->data_diri_save($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data_keluarga_save(Request $request)
    {
        return $this->logic->data_keluarga_save($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function asal_sekolah_save(Request $request)
    {
        return $this->logic->asal_sekolah_save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function initial_parameter()
    {
        return $this->logic->initial_parameter(); 
    }

    public function current_data()
    {
        return $this->logic->current_data();
    }

    public function resume_save(Request $request)
    {
        return $this->logic->resume_save($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
