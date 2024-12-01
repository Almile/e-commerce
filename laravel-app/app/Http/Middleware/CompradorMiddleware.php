<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompradorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e é comprador
        if (Auth::check() && Auth::user()->tipo_usuario === 'comprador') {
            return $next($request);
        }

        // Redireciona para a página inicial com mensagem de erro, se não for comprador
        return redirect('/')->with('error', 'Acesso negado. Apenas compradores podem acessar esta área.');
    }
}
