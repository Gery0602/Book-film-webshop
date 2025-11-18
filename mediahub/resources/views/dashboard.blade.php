<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Index</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MediaHub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Filmek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Könyvek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kosár</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Köszöntelek, {{ Auth::user()->name }}
                    <form method="POST" action="{{ route('logout') }}"><Button class="btn btn-outline-danger">Kijelentkezés</Button></form>
                </span>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row row-cols-auto">

            @foreach ($movies as $movie)
                <div class="card " style="width: 20%;">
                    <img src="{{$movie->img}}" class="card-img-top" alt="{{$movie->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text"> {{ $movie->year }}</p>
                        <a href="" class="btn btn-primary">Kosárba</a>
                    </div>
                </div>

            @endforeach





        </div>
    </div>




</body>


</html>

