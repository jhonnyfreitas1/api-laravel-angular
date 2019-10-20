<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use Validator;
use App\Produto;
class AuthController extends Controller
{
    private $jwtAuth;
    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }

    public function login(Request $request)
    {


        $credentials = $request->only('email', 'password','admin');

        try {

            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {

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

    public function create_produto(Request $request){

        if(Produto::where('id',$request->id)->first()){
            return response()->json(['Erros', 'ja_existe'], 411);
        }

        $validatedData = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'descricao' => 'required|max:255',
            'id' => 'required|unique:users'
        ]);
        if ($validatedData->fails()) {
            return response()->json(['Erros', $validatedData ], 412);
        }

        $user = $request->nome;
        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->id = $request->id;
        $produto->descricao = $request->descricao;
        $resultado = $produto->save();


        if($resultado){
            return response()->json(['create', $resultado], 200);
        }
        return response()->json(['erro', "algo deu errado"], 401);
    }


    public function create_cliente(Request $req){

        if(User::where('email',$req->email)->first()){
            return response()->json(['Erros', 'ja_existe'], 411);
        }
        if($req->email)
        $validatedData = Validator::make($req->all(), [
            'nome' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'senha' => 'required'
        ]);
        if ($validatedData->fails()) {
            return response()->json(['Erros', $validatedData ], 412);
        }
        $user = $req->nome;
        $model = new User;
        $model->name = $req->nome;
        $model->email= $req->email;
        $model->password = $req->senha;
        $resultado = $model->save();

        return response()->json(['create', $resultado], 200);
    }
}
