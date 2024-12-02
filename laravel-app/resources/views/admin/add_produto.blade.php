
@extends('adm_layout')

@section('title', 'Adicionar Produto')

@section('content')
<div class="container">
<h2 class="text-center my-4">Adicionar Produto</h2>

    <form action="/produtos" method="POST" enctype="multipart/form-data" class="form-control custom-form">
        @csrf
        <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome"  required>
                </div>
    
  
                <div class="mb-3">
                    <label for="imagem" class="form-label">Adicione uma Imagem</label>
                    <input type="file" name="imagem" accept="imagem/*"  class="form-control"  id="imagem" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" required></textarea>
                </div>
            <div class="row mb-3">
            <div class="col-md-4">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" class="form-control" id="preco" placeholder="Preço" name="preco" step="0.01" required>
            </div>

            <div class="col-md-4">
                <label for="categoria" class="form-label">Categoria</label>
                <select  class="form-select" name="categoria" id="categoria"  required>
                    <option value="Gourmet">Gourmet</option>
                    <option value="Tradicional">Tradicional</option>
                    <option value="Especial">Especial</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="torra" class="form-label">Torra</label>
                <select class="form-select" name="torra" id="torra" required>
                    <option value="media">torra média</option>
                    <option value="clara">Torra Clara</option>
                    <option value="escura">Torra Escura</option>
                </select>
            </div>
        </div>    
        
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="/admin/produto" class="btn btn-outline-secondary btn-xl w-100">Cancelar</a>
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-outline-primary btn-xl w-100">Adicionar Produto</button>
            </div>
        </div>

    </form>
</div>

@endsection
