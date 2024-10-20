<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="\css\pages.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body class="homepage">
    <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
            <img class="Logo img-fluid" id="Logo" src="/img/Logo Branca_M.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse.show" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('events.all') }}">Eventos</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('cart.view')}}">Carrinho</a>
                </li>
                @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link">Sua Conta</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>

                        @if (Route::has('register'))
                    <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Registrar</a>
                    </li>
                        @endif
                    @endauth
            @endif
            </ul>
            </div>
        </div>
        </nav>

<div class="conteudo">
    @yield('content')
</div>

<!-- Scripts (NavBar) -->
<script>
    const navEL = document.querySelector('.navbar');

    window.addEventListener('scroll', () => {
      if (window.scrollY > 56) {
        navEL.classList.add('navbar-scrolled');
      } else if (window.scrollY < 56) {
        navEL.classList.remove('navbar-scrolled');
      }
    })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <footer class="copyr align-content-xl-center">
        <p class="text-center lead"><em>Matheus Martins &copy; 2024</em></p>
    </footer>
  </body>
</html>
