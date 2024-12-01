<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\FetchAndSaveProdutos;

class AppController extends Controller
{
    // Exibe a lista de produtos
    public function index()
    {
        return view('login');
    }

    public function exibirUsuarios(){

        $usuarios = User::all();
       return view('admin/usuarios', ['users'=>$usuarios]);
    }

    public function editUsuario($id){
        $usuario = User::findOrFail($id);

        return view('editar', ['user' =>$usuario]);
    }

    public function atualizar(Request $request){
        $usuario = User::findOrFail($request->id);
        $dados = [
            'nome' => $request->name,
            'email' => $request->email
        ];
        $usuario->update($dados);
        return redirect('/usuarios');
    }

    public function delUsuario($id){
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }

    public function comprador()
    {
            FetchAndSaveProdutos::dispatch();

            $produtos = Produto::all();

            return view('comprador/dashboard',  ['produtos' => $produtos]);
        
    }

    public function create()
    {
        return view('admin/add_produto');
    }

}
