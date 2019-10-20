<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    private $jwtAuth;
    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }

    public function login(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

         $user = $this->jwtAuth::user();
        return response()->json(compact('token' , 'user'));
    }

    public function refresh(){
        $token = $this->jwtAuth->getToken();
        $token = $this->jwtAuth->refresh($token);
        return response()->json(compact('token'));
    }
    public function  me(){

        if (! $user = JWTAuth::parseToken()->authenticate()) {
			return response()->json(['user_not_found'], 404);
		}

        return  response()->json(compact('user'));
    }

    public function logout()
    {
        $token = (string) JWTAuth::getToken();
        JWTAuth::invalidate($token);
        return response()->json(['logout']);
    }
}
