@extends(Auth::user() && Auth::user()->tipo_usuario ? 'adm_layout' : 'layout')

@section('title', 'Editar Dados do Usuário')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Editar Dados</h1>
<div class="align-end">
    <!-- Formulário de exclusão no canto superior direito -->
    <div class="d-flex justify-content-end mb-4 w-60">
        <form action="{{ route('usuario.destroy') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir sua conta?')" >
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger btn-sm">Excluir Conta</button>
        </form>
    </div>

    <!-- Formulário de edição de dados -->
    <form action="{{ route('usuario.update') }}" method="POST" class="form-control custom-form">
        @csrf
        @method('PUT')

        <!-- Nome -->
        <div class="form-group mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="col-md-6">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
        </div>

        <!-- Endereço -->
        <div class="form-group mb-3">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="{{ old('endereco', $user->endereco) }}" required>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <a href="/user" class="btn btn-outline-secondary btn-xl w-100">Cancelar</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-xl w-100">Atualizar</button>
            </div>
        </div>
    </form>
</div></div>
@endsection
