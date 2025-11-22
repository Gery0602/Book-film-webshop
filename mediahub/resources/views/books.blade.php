<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Könyvek</title>
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
                        <a class="nav-link" href="/cart">Kosár</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Köszöntelek, {{ Auth::user()->name }}
                </span>
                
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="container text-center">
            <h1>Könyvek</h1>
        </div>
    </div>


</body>

</html>
