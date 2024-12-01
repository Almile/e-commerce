<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class HomeController extends Controller
{
    // Exibe a página inicial (Home)
    public function index()
    {
        // Obter produtos para exibir na home
        $produtos = Produto::all();  // Pode ser filtrado para mostrar produtos em destaque
        return view('home', compact('produtos'));
    }

    // Exibe a página Sobre Nós
    public function about()
    {
        return view('sobre');
    }

    // Exibe a página de Contato
    public function contact()
    {
        return view('contato');
    }
}
