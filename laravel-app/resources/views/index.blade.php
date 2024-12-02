
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
                <a class="navbar-brand" href="#">Espresso Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="#produtos">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="#sobre-nos">Carrinho</a>
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

<main>
    <section id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4">Sua loja de café favorita!</h1>
                    <p>Inspirado na pop star Sabrina Carpenter e sua música de sucesso, Espresso.</p>
                    <p>Confira nossos cafés, lanches e aproveite as promoções incríveis!</p>
                </div>
                <div class="col-md-6 text-center">
                    <img src="images/sabrina-carpenter.png" alt="sabrina carpenter imagem" class="img-arredondada">
                </div>
            </div>
        </div>
    </section>

    <section id="produtos">
    <div class="container">
        <h2 class="mb-5">Destaques</h2>
        <div class="row g-4">
            
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="images/cafe_organico.png" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <h5 class="card-title">Café Orgânico</h5>
                        <p class="card-text">Aspectos sensoriais diferenciados, acidez equilibrada e doçura natural.</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="preco">R$30,99</p>
                            <button class="btn btn-carrinho">
                                <img src="images/cart.png" width="18px"> Adicionar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100">
                    <img src="images/cafe_gourmet.png" class="card-img-top" alt="Produto 2">
                    <div class="card-body">
                        <h5 class="card-title">Café Gourmet</h5>
                        <p class="card-text">Aspectos sensoriais diferenciados, acidez equilibrada e doçura natural.</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="preco">R$30,99</p>
                            <button class="btn btn-carrinho">
                                <img src="images/cart.png" width="18px"> Adicionar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100">
                    <img src="images/cafe_tradicional.png" class="card-img-top" alt="Produto 3">
                    <div class="card-body">
                        <h5 class="card-title">Café Tradicional</h5>
                        <p class="card-text">Aspectos sensoriais diferenciados, acidez equilibrada e doçura natural.</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="preco">R$30,99</p>
                            <button class="btn btn-carrinho">
                                <img src="images/cart.png" width="18px"> Adicionar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100">
                    <img src="images/cafe_special.png" class="card-img-top" alt="Produto 4">
                    <div class="card-body">
                        <h5 class="card-title">Café Special</h5>
                        <p class="card-text">Aspectos sensoriais diferenciados, acidez equilibrada e doçura natural.</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="preco">R$30,99</p>
                            <button class="btn btn-carrinho">
                                <img src="images/cart.png" width="18px"> Adicionar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sobre-nos">
        <div class="container">
            <h2>Sobre Nós</h2>
            <p>Somos uma empresa dedicada a oferecer a melhor experiência aos nossos clientes.</p>
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
</main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>