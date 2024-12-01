@extends('adm_layout')

@section('title', 'Produtos')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Produtos</h1>
  
<a href="/create">Adicionar novo produto</a>

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
    <select class="torra-filter"  id="torra-filter">
        <option value="">Todas as Torras</option>
        <option value="media">torra média</option>
        <option value="clara">Torra Clara</option>
        <option value="escura">Torra Escura</option>
    </select>
</div>


<div class="product-list">
    @foreach($produtos as $produto)
        <div class="product-card"  data-torra="{{ $produto->torra }}" data-category="{{ $produto->categoria }}" data-name="{{ $produto->nome }}">
            <div class="card-top">
                <span>{{ $produto->categoria }}</span>
                
            </div>
            <img src="{{ $produto->imagem }}" alt="Café Premium" class="product-image">
            <h3 class="product-title">{{ $produto->nome }}</h3>
            <p class="product-description">{{ $produto->descricao }}</p>
            <p class="product-price">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            

            <a href="{{ route('produto.edit', $produto->id) }}">Editar</a>
            <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
            </form>

        </div>
    @endforeach
</div>

</div>
@endsection
