<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\User;
use App\Pedidos;
use Illuminate\Support\Facades\DB;
class ClienteController extends Controller
{

   public function index(){

        $produtos = Produto::paginate(9);
        return view("cliente.index" , compact('produtos'));

    }
    public function login(){
        return view('cliente.login');
    }
    public function auth(Request $request){

        $email =$request->user_email;
        $senha = $request->password;
        $user  = User::where('email',$email)->where('password', $senha)->first();

        if($user){
            session(['logado' => $user]);
            $teste = session('logado');

            return redirect()->route('index');
        }else{
            $mensagem = 'E-mail ou Senha Incorretos!';
            $fail = session()->put('fail', ['fail' => $mensagem]);
            return redirect() -> route('login' , compact('fail'));
        }
    }
    public function desconectar(){

        session()->forget('logado');
        return redirect()->route('login');
    }
    public function fazer_pedido($id){

        $email = session('logado')['email'];
        $user = session('logado');
        $produto = Produto::where('id', $id)->first();

        $model = new Pedidos;
        $model->email_comprador = session('logado')['email'];
        $model->id_produto = $id;
        $resultado = $model->save();
        if($resultado){
            return back()->with('success', 'Sucesso ao fazer pedido');
        }
        return back()->with('falha', 'falha ao fazer o pedido');
    }
    public function detalhe_produto($id){

            $produto = DB::table('produtos')->where('id', $id)->first();
            return  view('cliente.detalhe_produto', compact('produto'));
    }
    public function pedidos(){
        $email= session('logado')['email'];

        $pedidos = Pedidos::where('email_comprador', $email)->get();
        $produtos_nome = array();
        foreach($pedidos as $pedido){

            $produto = Produto::where('id',$pedido->id_produto)->first();
            array_push($produtos_nome , ['nome' => $produto->nome , 'numero' => $produto->id]);
        }

        $total =count($pedidos);

        return view('cliente.meus_pedidos', compact('produtos_nome','total'));
    }
    public function perfil(){
        return view('cliente.perfil');
    }
}
