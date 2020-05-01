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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function asal_sekolah_save(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
