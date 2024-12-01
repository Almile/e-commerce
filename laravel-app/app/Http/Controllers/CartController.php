<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\item_pedido;



class CartController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Produto::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produto não encontrado.');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantidade']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'nome' => $product->nome,
                'preco' => $product->preco,
                'imagem' => $product->imagem,
                'quantidade' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('comprador/cart', compact('cart'));
    }

    // Atualizar a quantidade de um item no carrinho
    public function updateCart(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            // Atualizar a quantidade
            $cart[$productId]['quantidade'] = $quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }

    // Remover item do carrinho
    public function removeFromCart($productId)
    {
        $cart = session()->get('cart', []);

        // Verifica se o produto está no carrinho
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.show');
    }

    // Página de checkout
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('comprador/checkout', compact('cart'));
    }

    public function confirmOrder(Request $request)
    {
        $cart = session()->get('cart', []);
    
        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Seu carrinho está vazio.');
        }
    
        $totalPedido = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['preco'] * $item['quantidade']);
        }, 0);
    
        $pedido = Pedido::create([
            'id_usuario' => auth()->id(),
            'endereco_entrega' => $request->input('endereco'),
            'metodo_pagamento' => $request->input('metodoPagamento'),
            'valor_pedido' => $totalPedido,
        ]);
    
        foreach ($cart as $item) {
            $pedido->items()->create([
                'id_produto' => $item['id'],
                'quantidade' => $item['quantidade'],
                'preco' => $item['preco'],
            ]);
        }
    
        session()->forget('cart');
    
        return redirect()->route('orders.history')->with('success', 'Compra realizada com sucesso!');
    }
    
    public function history()
{
    $pedidos = Pedido::where('id_usuario', auth()->id()) ->with('items.produto')->get();

    return view('comprador/order_history', compact('pedidos'));
}

}
