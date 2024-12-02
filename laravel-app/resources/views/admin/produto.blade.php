@extends('adm_layout')

@section('title', 'Produtos')

@section('content')
<div class="container" id="container">

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


<div class="decorative-border">
    <table>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr data-torra="{{ $produto->torra }}" data-category="{{ $produto->categoria }}" data-name="{{ $produto->nome }}">
                    <td>
                        <img src="{{ $produto->imagem }}" alt="{{ $produto->nome }}" class="img-thumbnail"  style="max-width: 60px;">
                    </td>
                    <td><div class="desc">{{ $produto->nome }}</div></td>
                    <td>{{ $produto->categoria }}</td>
                    <td> <div class="desc">{{ $produto->descricao }}</div></td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td >
                        <div class="actions">
                        <a href="{{ route('produto.edit', $produto->id) }}" class="button">Editar</a>
                        <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este produto?')" class="button">Excluir</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


</div>
@endsection
