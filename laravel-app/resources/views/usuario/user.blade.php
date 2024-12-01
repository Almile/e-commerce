@extends('modal')

@section('title', 'Minha Conta')

@section('content')
<div class="container">
    <h1 class="text-center my-4"> Minha Conta</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <a href="/usuario">editar dados</a>

</div>
@endsection
