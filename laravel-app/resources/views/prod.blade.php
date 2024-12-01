@extends('layout')

@section('title', 'Produtos de Café')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Produtos de Café</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        @foreach ($produtos as $produto)
            <div class="col-md-4">
                <div class="product-card">
                    <img src="{{ $produto->imagem }}" alt="{{ $produto->nome }}" class="img-fluid">
                    <h3>{{ $produto->nome }}</h3>
                    <p>R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    <a href="{{ $produto->link }}" class="btn btn-primary" target="_blank">Ver no Mercado Livre</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
