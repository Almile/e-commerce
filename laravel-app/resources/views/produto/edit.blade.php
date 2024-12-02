@extends('adm_layout')

@section('title', 'Editar Produto')

@section('content')
<div class="container">
<h2 class="text-center my-4">Editar Produto</h2>

    <form action="{{ route('produto.update', $produto->id) }}" method="POST" enctype="multipart/form-data" class="form-control custom-form">
        @csrf
        @method('PUT')
        <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $produto->nome }}" required>
                </div>
            <div class="row mb-4">
            <!-- Coluna da imagem -->
            <div class="col-md-3">
                @if($produto->imagem)
                    <img src="{{ asset($produto->imagem) }}" alt="Imagem do Produto" class="img-thumbnail mt-3" style="max-width: 100%;">
                @endif
            </div>
            <div class="col-md-9">
    
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" class="form-control" id="imagem" name="imagem">
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" required>{{ $produto->descricao }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
            <div class="col-md-4">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" class="form-control" id="preco" name="preco" value="{{ $produto->preco }}" step="0.01" required>
            </div>

            <div class="col-md-4">
                <label for="categoria" class="form-label">Categoria</label>
                <select class="form-select" id="categoria" name="categoria" required>
                    <option value="Gourmet" {{ $produto->categoria == 'Gourmet' ? 'selected' : '' }}>Gourmet</option>
                    <option value="Tradicional" {{ $produto->categoria == 'Tradicional' ? 'selected' : '' }}>Tradicional</option>
                    <option value="Especial" {{ $produto->categoria == 'Especial' ? 'selected' : '' }}>Especial</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="torra" class="form-label">Torra</label>
                <select class="form-select" id="torra" name="torra" required>
                    <option value="media" {{ $produto->torra == 'media' ? 'selected' : '' }}>Média</option>
                    <option value="clara" {{ $produto->torra == 'clara' ? 'selected' : '' }}>Clara</option>
                    <option value="escura" {{ $produto->torra == 'escura' ? 'selected' : '' }}>Escura</option>
                </select>
            </div>
        </div>
        </div>   

        <button type="submit" class="btn btn-outline-primary  w-100 btn-xl">Atualizar Produto</button>
    </form>
</div>

@endsection
