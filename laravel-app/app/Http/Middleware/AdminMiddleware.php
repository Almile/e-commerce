<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e é administrador
        if (Auth::check() && Auth::user()->tipo_usuario === 'admin') {
            return $next($request);
        }

        // Redireciona para a página inicial com mensagem de erro, se não for admin
        return redirect('/')->with('error', 'Acesso negado. Apenas administradores podem acessar esta área.');
    }
}
