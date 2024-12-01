<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showCadastro()
    {
        return view('cadastrar');
    }
    
    public function cadastrar(Request $request)
    {
        
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo_usuario = $request->tipo_usuario;
        $usuario->endereco = $request->endereco;
        $usuario->save();

        return redirect('/')->with('success', 'Usuário cadastrado com sucesso!');
    }
    
    public function showLoginForm()
    {
        return view('login');
    }

    // Processar o login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);

            if ($user->tipo_usuario === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('comprador.dashboard'); 
        }

        return redirect()->back()->with('error', 'Credenciais inválidas.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
