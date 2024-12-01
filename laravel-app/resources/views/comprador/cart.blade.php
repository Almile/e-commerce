@extends('layout')

@section('title', 'Carrinho')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Carrinho de Compras</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (count($cart) > 0)
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            @foreach ($cart as $item)
                <div class="cart-item">
                    <img src="{{ asset($item['imagem']) }}" alt="{{ $item['nome'] }}">
                    <h3>{{ $item['nome'] }}</h3>
                    <p>Preço: R$ {{ number_format($item['preco'], 2, ',', '.') }}</p>
                    <p>Quantidade: 
                        <input type="number" name="quantity" value="{{ $item['quantidade'] }}" min="1" max="10">
                    </p>
                    <p>Total: R$ {{ number_format($item['preco'] * $item['quantidade'], 2, ',', '.') }}</p>

                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                    <button type="submit" class="btn btn-primary">Atualizar Quantidade</button>
                    <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-danger">Remover</a>
                </div>
            @endforeach
        </form>

        <p><strong>Total: R$ {{ number_format(array_sum(array_map(function ($item) { return $item['preco'] * $item['quantidade']; }, $cart)), 2, ',', '.') }}</strong></p>

        <a href="{{ route('cart.checkout') }}" class="btn btn-success">Ir para Checkout</a>
    @else
        <p>Seu carrinho está vazio!</p>
    @endif
</div>
@endsection
