@extends('layout')

@section('title', 'Carrinho')

@section('content')
<div class="container">
<h1 class="text-center my-4">Checkout</h1>


    <form action="{{ route('cart.confirmOrder') }}" method="POST">
            @csrf

            <h3>Dados do pedido</h3>

            <div class="form-group row mb-4">
                <div class="col-md-6">
                    <label for="endereco">Endereço de Entrega:</label>
                    <input type="text" name="endereco" id="address" class="form-control inputs" required>
                </div>

                <div class="col-md-6">
                    <label for="metodoPagamento">Método de Pagamento:</label>
                    <select name="metodoPagamento" class="form-control inputs" required>
                        <option value="credit_card">Cartão de Crédito</option>
                        <option value="boleto">Boleto</option>
                    </select>
                </div>
            </div>

            
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço Unitário</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr id="product-{{ $item['id'] }}">
                            <td>{{ $item['nome'] }}</td>
                            <td>R$ {{ number_format($item['preco'], 2, ',', '.') }}</td>
                            <td>
                                <input type="number" name="quantity[{{ $item['id'] }}]" value="{{ $item['quantidade'] }}" min="1" max="10" class="form-control quantity-input" data-id="{{ $item['id'] }}" data-price="{{ $item['preco'] }}" readonly>
                            </td>
                            <td id="subtotal-{{ $item['id'] }}">R$ {{ number_format($item['preco'] * $item['quantidade'], 2, ',', '.') }}</td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-outline-primary">
                    <a href="/cart" class="text-decoration-none">Editar carrinho</a>
                </button>
                <button type="submit" class="btn btn-success">Confirmar Compra</button>
            </div>


        </form>
</div>