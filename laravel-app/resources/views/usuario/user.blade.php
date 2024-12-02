@extends(Auth::user() && Auth::user()->tipo_usuario == 'admin' ? 'adm_layout' : 'layout')

@section('title', 'Minha Conta')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Minha Conta</h1>
    <form  method="POST" enctype="multipart/form-data" class="form-control custom-form">
        
    <div class="form-group mb-3">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" readonly>
    </div>

    <div class="form-group mb-3">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}"  readonly>
    </div>

    <div class="row mb-3">
            <div class="col-md-6">
            <a href="/usuario"  class="btn btn-outline-primary btn-xl w-100">Editar dados</a>

            </div>

            <div class="col-md-6">
            <a href="logout"  class="btn btn-outline-danger btn-xl w-100">Fazer Logout</a>
            </div>
        </div>
   
    </form>
</div>
@endsection
