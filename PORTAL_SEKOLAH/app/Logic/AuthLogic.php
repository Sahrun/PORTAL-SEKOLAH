<?php

namespace App\Logic;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\PPDBUser;
use App\User;
use App\Users;

class AuthLogic
{
    public $repo;
    public $ppdb_siswa;

    function __construct() {
     //   $this->repo = $_repo;
    }

    public function register_user($data){

        $user = New User;
        $user::create([
              'name' => $data->name,
              'email' => $data->email,
              'user_name' => $data->email,
              'password' => bcrypt($data->password)
          ]);
    }

    public function register_ppdb($data){

      $user = New PPDBUser;
      $user::create([
            'name' => $data->name,
            'email' => $data->email,
            'user_name' => $data->email,
            'password' => bcrypt($data->password)
        ]);
    }

    public function login($request){

        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
         $user = $request->user();
         $tokenResult = $user->createToken('Personal Access Token');

         $token = $tokenResult->token;

         if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

         $token->save();
       
         $result = array(
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'user' => get_current_user(),
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
         );
         
       return $result;
    }
    
    public function logout($request){
        $request->user()->token()->revoke();
    }

    public function list(){
        $users = new Users;

        return $users->get();
    }
    public function get_current_user(){
        $user = Auth::user();
        return $user;
    }

}
