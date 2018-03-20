<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Auth\User;

class AuthController extends Controller
{
    public function _construct(){
        $this->middleware('guest',['except'=>'getLogout']);
    }

    public function Something(Request $request){
        $a=$request-> accepts('email');
        return ('$a');

    }
    public function authenticate(Request $request){
        $credentials=$request->only('email','password');

        try{
            if(! $token = JWTAuth::attempt($credentials)){
                return $this->response->error(['error'=>'user credentials are not correct'],401);
            }

        }catch(JWTException $ex){
            return $this->response->error(['error'=>'something went wrong'],500);
        }

        return $this->response->json(compact('token'))->setStatusCode(200);
    }
    protected function create(array $data)
    {
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
        ]);
    }

}
