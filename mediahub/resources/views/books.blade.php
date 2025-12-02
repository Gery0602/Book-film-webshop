<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
    <title>MediaHub:Könyvek</title>
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
                        <a class="nav-link" href="/movies"><i class="bi bi-film"></i> Filmek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/books"><i class="bi bi-journal-bookmark"></i> Könyvek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvas" role="button"
                            aria-controls="offcanvas"><i class="icon-shopping-cart"></i> {{$all['cart_count']}} Kosár</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" id="themeToggle" role="button"><i class="fas fa-moon" id="themeIcon"></i> Téma</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                        <li class="nav-item p-2">
                            <a class="nav-link" href="/admin"><i class="bi bi-person-fill"></i> Felhasználó</a>
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
            <h1>Könyvek</h1>
            <br>
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

        <div class="toast-container position-fixed bottom-0 start-0 p-3">
            <div id="liveToast" class="toast text-bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                
                <div class="toast-body">
                    Sikeresen hozzáadtad a kosárhoz a könyvet.
                </div>
            </div>
        </div>
        

        <div class="row row-cols-auto row-cols-lg-5 g-2 g-lg-3">
            @foreach ($all['books'] as $book)
                <div class="col" id="{{ $book->id }}">
                    <div class="card" style="width: 100%;">
                        <img src="{{$book->img}}" class="card-img-top img-fluid" alt="{{$book->title}}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text"> {{ $book->year }}</p>
                            <p class="card-text">{{ $book->rating }} ★</p>
                            <div class="row">
                                <div class="col">
                                    <form method="POST" action="{{ route('cart.book') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $book->id }}">
                                        <button class="btn btn-primary pick" type="submit" >Kosárba></button>
                                    </form>
                                </div>
                                <div class="col text-center">
                                    <p class="card-text"> {{ $book->price }} Ft</p>
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


        //toast

        const toastLiveExample = document.getElementById('liveToast');
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample);
        
        @if(session('cart_success'))
            toastBootstrap.show();
        @endif
        
        const pickButtons = document.querySelectorAll('.pick');
        
        pickButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.target.closest('form').submit();
            });
        });

    </script>

</body>

<figcaption class="blockquote-footer">
    <cite title="Source Title">Kotor itt járt 2025/11/24</cite>
</figcaption>

</html>