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
    <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">MediaHub</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav position-absolute top-0 end-0">
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Bejelentkezés</a>
                    <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Regisztráció</a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            
        </div>
    </main>

</body>

</html>