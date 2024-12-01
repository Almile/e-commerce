@extends('modal')

@section('title', 'Editar Dados do Usuário')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Editar Dados</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('usuario.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nome -->
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <!-- Senha -->
        <div class="form-group">
            <label for="password">Senha (deixe em branco para não alterar)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <!-- Confirmação de Senha -->
        <div class="form-group">
            <label for="password_confirmation">Confirmar Senha</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="{{ old('endereco', $user->endereco) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
    </form>

    <hr>

    <!-- Excluir Conta -->
    <form action="{{ route('usuario.destroy') }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir sua conta?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Excluir Conta</button>
    </form>

    <a href="/user">Cancelar</a>
</div>
@endsection
