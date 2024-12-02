@extends('layout')

@section('title', 'Produtos')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Produtos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="filters">
        <input type="text" class="search-bar" placeholder="Pesquisar produtos..." />
        <select class="category-filter">
            <option value="">Todas as Categorias</option>
            <option value="Gourmet">Gourmet</option>
            <option value="Tradicional">Tradicional</option>
            <option value="Especial">Especial</option>
        </select>
        <select class="torra-filter">
            <option value="">Todas as Torras</option>
            <option value="media">torra média</option>
            <option value="clara">Torra Clara</option>
            <option value="escura">Torra Escura</option>
        </select>
    </div>

    <div class="product-list">
        @foreach($produtos as $produto)
            <div class="product-card" data-torra="{{ $produto->torra }}" data-category="{{ $produto->categoria }}" data-name="{{ $produto->nome }}">
                <img src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" class="product-image">
                <h3 class="product-title">{{ $produto->nome }}</h3>
                <p class="product-description">{{ $produto->descricao }}</p>
                
                <form action="{{ route('cart.add') }}" method="POST" class="btn-card">
                <p class="product-price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $produto->id }}">
                        <button type="submit" class="add-to-cart">
                        <ion-icon name="cart-outline"></ion-icon>
                            adicionar ao carrinho
                        </button>
                    </form>
            </div>
        @endforeach
    </div>
</div>
</div>

@endsection
