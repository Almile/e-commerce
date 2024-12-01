<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Jobs\FetchAndSaveProdutos;

class ProductController extends Controller
{
    public function index()
    {
        FetchAndSaveProdutos::dispatch();
        $produtos = Produto::all();
        return view('admin/produto', ['produtos' => $produtos]);
    }

    public function create()
    {
        return view('add_produto');
    }

    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'required|string',
        'preco' => 'required|numeric',
        'categoria' => 'required|string',
        'torra' => 'required|string|in:clara,media,escura', // Validações para torra
        'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $produto = new Produto();

    $produto->nome = $request->nome;
    $produto->descricao = $request->descricao;
    $produto->preco = $request->preco;
    $produto->categoria = $request->categoria;
    $produto->torra = $request->torra;
    if ($request->hasFile('imagem')) {
        $imageName = time() . '.' . $request->imagem->extension();
        $request->imagem->move(public_path('images'), $imageName);
        $produto->imagem = 'images/' . $imageName;
    }

    $produto->save();

    return redirect('/admin/produto')->with('success', 'Produto cadastrado com sucesso!');
}


    public function edit($id)
    {
        $produto = Produto::findOrFail($id); // Busca o produto pelo ID
        return view('produto.edit', compact('produto')); // Retorna a view com o produto
    }

    public function update(Request $request, $id)
    {
        
        $produto = Produto::findOrFail($id);
    
        if ($request->hasFile('imagem')) {
            $imageName = time() . '.' . $request->imagem->extension();
            $request->imagem->move(public_path('images'), $imageName);
            $produto->imagem = 'images/' . $imageName;
        }
        $produto = Produto::findOrFail($id);
        $produto->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'categoria' => $request->categoria,
            'torra' => $request->torra,
            'imagem' => $request->hasFile('imagem') ? 'images/' . $imageName : $produto->imagem,
        ]);
        
        // Agora salva a imagem se houver uma nova
        if ($request->hasFile('imagem')) {
            $imageName = time() . '.' . $request->imagem->extension();
            $request->imagem->move(public_path('images'), $imageName);
        }
        
        return redirect()->route('produto')->with('success', 'Produto atualizado com sucesso!');
        
    }
    

        public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        // Remove o arquivo de imagem associado, se existir
        if (file_exists(public_path($produto->imagem))) {
            unlink(public_path($produto->imagem));
        }

        $produto->delete();

        return redirect()->route('produto')->with('success', 'Produto excluído com sucesso!');
    }


}
