<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <title>MediaHub:Filmek</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dashboard">MediaHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/movies">Filmek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/books">Könyvek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvas" role="button"
                            aria-controls="offcanvas"><i class="icon-shopping-cart"></i> {{$all['cart_count']}}</a>
                    </li>
                    <li class="nav-item">
                        <button id="themeToggle" class="nav-link ms-2">
                            <i class="fas fa-moon" id="themeIcon"></i>
                        </button>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item p-2">
                            Köszöntelek, {{ Auth::user()->name }}
                        </li>
                        <li class="nav-item p-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-outline-danger" type="submit">Kijelentkezést</button>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    <div class="container">

        <div class="container text-center">
            <h1>Filmek</h1>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas" aria-labelledby="offcanvasLabel">
            <div class="offcanvas-body">
                <div class="offcanvas-header">
                    <h3 class="offcanvas-title">Kosár</h3>
                </div>
                <div class="offcanvas-body">
                    <!--{{ $sum = 0 }}-->
                    @foreach ($all['cart'] as $book)
                        <div class="col p-1" id="{{ $book->id }}">
                            <div class="card" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $book->product_name }}</h5>
                                    <p class="card-text"> {{ $book->product_count }}x</p>
                                    <p class="card-text"> {{ $book->price }} Ft</p>
                                </div>
                            </div>
                        </div>
                        <!--{{ $sum = $sum + $book->price }}-->
                    @endforeach
                </div>
                <h4>Végösszeg: {{ $sum }} Ft</h4>
                <div class="offcanvas-bottom bottom-0 p-3">
                    <a class="btn btn-success" href="/checkout">Checkout</a>
                </div>
                
            </div>
        </div>


        <div class="row row-cols-auto row-cols-lg-5 g-2 g-lg-3">
            @foreach ($all['movies'] as $movie)
                <div class="col" id="{{ $movie->id }}">
                    <div class="card" style="width: 100%;">
                        <img src="{{$movie->img}}" class="card-img-top img-fluid" alt="{{$movie->title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text"> {{ $movie->year }}</p>
                            <p class="card-text">{{ $movie->rating }} ★</p>
                            <div class="row">
                                <div class="col">
                                    <form method="POST" action="{{ route('cart.movie') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $movie->id }}">
                                        <button class="btn btn-primary pick" type="submit">Kosárba></button>
                                    </form>
                                </div>
                                <div class="col text-center">
                                    <p class="card-text"> {{ $movie->price }} Ft</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const html = document.documentElement;

        // Load saved theme or default to light
        let currentTheme = 'light';
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            currentTheme = savedTheme;
            html.setAttribute('data-bs-theme', currentTheme);
            updateIcon(currentTheme);
        }

        function updateIcon(theme) {
            if (theme === 'dark') {
                themeIcon.className = 'fas fa-sun';
            } else {
                themeIcon.className = 'fas fa-moon';
            }
        }

        themeToggle.addEventListener('click', () => {
            currentTheme = currentTheme === 'light' ? 'dark' : 'light';
            html.setAttribute('data-bs-theme', currentTheme);
            localStorage.setItem('theme', currentTheme);
            updateIcon(currentTheme);
        });
    </script>

</body>

<figcaption class="blockquote-footer">
    <cite title="Source Title">Kotor itt járt 2025/11/24</cite>
</figcaption>

</html>