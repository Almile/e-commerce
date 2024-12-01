<form action="{{ route('cart.confirmOrder') }}" method="POST">
    @csrf
    <h3>Produtos no carrinho:</h3>
    <ul>
        @foreach ($cart as $item)
            <li>{{ $item['nome'] }} - R$ {{ number_format($item['preco'] * $item['quantidade'], 2, ',', '.') }}</li>
        @endforeach
    </ul>

    <h3>Dados de Entrega:</h3>
    <div class="form-group">
        <label for="endereco">Endereço de Entrega:</label>
        <input type="text" name="endereco" id="address" class="form-control" required>
    </div>

    <h3>Método de Pagamento:</h3>
    <select name="metodoPagamento" class="form-control" required>
        <option value="credit_card">Cartão de Crédito</option>
        <option value="boleto">Boleto</option>
    </select>

    <button type="submit" class="btn btn-primary mt-4">Confirmar Compra</button>
</form>
