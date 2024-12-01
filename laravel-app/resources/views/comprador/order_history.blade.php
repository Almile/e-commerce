@extends('layout')

@section('title', 'Histórico de Compras')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Histórico de Compras</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($pedidos->isEmpty())
        <p>Você ainda não realizou nenhuma compra.</p>
    @else
        @foreach ($pedidos as $pedido)
            <div class="order">
                <h3>Pedido - {{ $pedido->created_at->format('d/m/Y H:i') }}</h3>
                <p><strong>Endereço de Entrega:</strong> {{ $pedido->endereco_entrega }}</p>
                <p><strong>Método de Pagamento:</strong> {{ $pedido->metodo_pagamento }}</p>
                <p><strong>Total:</strong> R$ {{ number_format($pedido->valor_pedido, 2, ',', '.') }}</p>

                <h4>Itens:</h4>
                <ul>
                    @foreach ($pedido->items as $item)
                        <li>{{ $item->produto->nome }} - Quantidade: {{ $item->quantidade }} - Preço: R$ {{ number_format($item->preco * $item->quantidade, 2, ',', '.') }}</li>
                    @endforeach
                </ul>
            </div>
            <hr>
        @endforeach
    @endif
</div>
@endsection
