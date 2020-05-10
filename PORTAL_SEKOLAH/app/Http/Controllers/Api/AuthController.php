<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logic\AuthLogic;

class AuthController extends Controller
{
    public $successStatus = 200;
    public $success ="OK";
    public $logic;

    function __construct(AuthLogic $_logic) {
        $this->logic = $_logic;
    }

    public function register_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = $this->logic->register_user($request);

        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
    
    public function register_ppdb(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);
        
        $this->logic->register_ppdb($request);
        
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
  
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $response = $this->logic->login($request);

        return $response;
    }
    
    public function logout(Request $request)
    {
        $this->logic->logout($request);
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function list(){
        $users = $this->logic->list();
        return response()->json([
            'message' => 'Successfully logged out',
            'data'=> $users
        ]);
    }
    public function current_user() 
    { 
        $user = $this->logic->get_current_user();
        return response()->json(['data' => $user], $this-> successStatus); 
    } 
}
