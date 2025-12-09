<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

</html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

    <title>MediaHub:Dashboard</title>
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
                        <a class="nav-link" href="" id="themeToggle" role="button"><i class="fas fa-moon"
                                id="themeIcon"></i> Téma</a>
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
        <h1 class="text-center mb-4">Köszöntelek, {{ Auth::user()->name }}</h1>
    </div>


    <div class="container border rounded-3">
        <h3 class="text-center">Rendelés előzmények</h3>
        <br>
        @foreach ($orders as $order)
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <strong>Rendelési azonosító:</strong> {{ $order->order_number }}
                        </div>
                        <div class="col-md-4">
                            <strong>Fizetve:</strong> {{ $order->paid_at }}
                        </div>
                        <div class="col-md-4">
                            <strong>Összeg:</strong> {{ $order->total_amount }} Ft
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


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

        const picks = document.querySelectorAll('.pick');
        picks.forEach(pick => {
            pick.addEventListener('click', (e) => {

            })
        })

    </script>
</body>



</html>