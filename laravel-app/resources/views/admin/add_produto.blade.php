<form action="/produtos" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nome" placeholder="Nome do Produto" required>
    <textarea name="descricao" placeholder="Descrição" required></textarea>
    <input type="number" name="preco" placeholder="Preço" step="0.01" required>
    <input type="file" name="imagem" accept="imagem/*" required>
    <select name="categoria" required>
        <option value="Gourmet">Gourmet</option>
        <option value="Tradicional">Tradicional</option>
        <option value="Especial">Especial</option>
    </select>
    <select name="torra" id="torra" class="form-control" required>
        <option value="media">torra média</option>
        <option value="clara">Torra Clara</option>
        <option value="escura">Torra Escura</option>
    </select>
    <button type="submit">Cadastrar Produto</button>
</form>
<a href="/admin/produto">Cancelar</a>
