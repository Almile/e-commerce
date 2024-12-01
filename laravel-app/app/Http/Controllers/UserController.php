<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $user = Auth::user();
        return view('usuario/user', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('usuario.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $dados = [
        $user->name = $request->name,
        $user->email = $request->email,
        $user->password = Hash::make($request->password),
        $user->endereco = $request->endereco,
        ];

        $user->update($dados);

        return redirect()->route('user')->with('success', 'Dados atualizados com sucesso!');
    }

    public function destroy()
    {
        $user = Auth::user();

        $user->delete();

        Auth::logout();

        return redirect('/')->with('success', 'Conta excluída com sucesso.');
    }
}
