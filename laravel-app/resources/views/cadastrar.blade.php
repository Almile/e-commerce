<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Carter+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<header>
        <nav class="navbar navbar-expand-lg navbar-default text-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/">Espresso Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="/#produtos">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="/#sobre-nos">Carrinho</a>
                        </li>
                    </ul>
    
                    <div class="d-flex">
                        <a href="/login" class="btn btn-outline-light me-2">Login</a>
                        <a href="/cadastrar" class="btn btn-light">Cadastro</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>    

    <section id="login" class="d-flex justify-content-center align-items-center vh-100">
        <div class="container p-4 shadow-lg rounded" style="max-width: 600px;">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
        <form action="{{ route('cadastrar.post') }}" method="POST">
        @csrf
        <h1 class="text-center mb-4">Cadastro</h1>

        <div class="form-group  mb-3">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group  mb-3">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="row mb-3">
            <div class="form-group md-6">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group md-6">
                <label for="password_confirmation">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group md-4">
                <label for="tipo_usuario">Tipo de acesso</label>
                <select name="tipo_usuario" id="tipo_usuario" class="form-control" required>
                    <option value="comprador">Comprador</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

            <div class="form-group md-8">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    <div class="text-center mt-3">
        <a href="/login">Já tem conta? Fazer login</a>
    </div>

        </div>
    </section>

    <section id="contato" class="bg-light py-5">
    <div class="container gap-3">

        <div class="row">
            <div class="col-md-4">
                <h4>Entre em contato</h4>
                <p>Email: <a href="mailto:contato@empresa.com">contato@empresa.com</a></p>
                <p>Telefone: (11) 1234-5678</p>
            </div>

            <div class="col-md-4 m text-center">
                <h4>Siga nossas redes sociais</h4>
                <div class="d-flex gap-3 mt-3">
                    <a href="https://facebook.com" target="_blank">
                        <img src="{{asset('images/facebook.png')}}" alt="Facebook" style="width: 40px;">
                    </a>
                    <a href="https://instagram.com" target="_blank">
                        <img src="{{asset('images/instagram.png')}}" alt="Instagram" style="width: 40px;">
                    </a>
                    <a href="https://twitter.com" target="_blank">
                        <img src="{{asset('images/x.png')}}" alt="X" style="width: 40px;">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>

