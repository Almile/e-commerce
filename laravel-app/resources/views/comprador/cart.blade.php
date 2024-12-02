@extends('layout')

@section('title', 'Carrinho')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Carrinho de Compras</h1>

    @if (count($cart) > 0)
        <form action="{{ route('cart.update') }}" method="POST" id="cart-form">
            @csrf
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Preço Unitário</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr id="product-{{ $item['id'] }}">
                            <td>
                                <img src="{{ asset($item['imagem']) }}" alt="{{ $item['nome'] }}" style="width: 60px; height: 60px; object-fit: cover;">
                            </td>
                            <td>{{ $item['nome'] }}</td>
                            <td>R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                            <td>
                                <input type="number" name="quantity[{{ $item['id'] }}]" value="{{ $item['quantidade'] }}" min="1" max="10" class="form-control quantity-input" data-id="{{ $item['id'] }}" data-price="{{ $item['preco'] }}">
                            </td>
                            <td id="subtotal-{{ $item['id'] }}">R$ {{ number_format($item['preco'] * $item['quantidade'], 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-outline-danger btn-sm">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <p class="text-center h4">
              <strong>Total: R$ <span id="total">{{ number_format(array_sum(array_map(function ($item) { return $item['preco'] * $item['quantidade']; }, $cart)), 2, ',', '.') }}</span></strong>
            </p>
            <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-success btn">Ir para Checkout</button>
</div>

</form>
    @else
        <p class="text-center">Seu carrinho está vazio!</p>
    @endif
</div>


@endsection
