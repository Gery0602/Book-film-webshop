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


    <title>MediaHub:Checkout</title>
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
                        <button id="themeToggle" class="nav-link ms-2">
                            <i class="fas fa-moon" id="themeIcon"></i>
                        </button>
                    </li>
                </ul>             
            </div>
        </div>
    </nav>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@php
    $subtotal = 0;
    foreach($all['cart'] as $osszeg) {
        $subtotal += $osszeg->price * $osszeg->product_count;
    }

    $shipping = 3500; 
    $tax = 2000;
    

    if ($subtotal >= 10000) {
        $shipping = 0; 
    }

    $total = $subtotal + $shipping + $tax;
@endphp
<div class="container">
    <div class="container text-center">
        <br>
            <h1>Rendelés</h1>
        <br>
        </div>
    <div class="row">
        <div class="col-xl-8">
         @foreach($all['cart'] as $cart)
            <div class="card border shadow-none">
                <div class="card-body">

                    <div class="d-flex align-items-start border-bottom pb-3">
                        <div class="me-4">
                            
                        </div>
                        <div class="flex-grow-1 align-self-center overflow-hidden">
                            <div>
                                <h5 class="text-truncate font-size-18"><a href="#">{{$cart -> product_name}} </a></h5>                              
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-2">
                            <ul class="list-inline mb-0 font-size-16">
                                <li class="list-inline-item">
                                    <form action="{{ route('book.cart.remove', $cart->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-muted p-0">
                                            <i class="mdi mdi-trash-can-outline"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Ár :</p>
                                    <h5 class="mb-0 mt-2"><span class="text-muted me-2"></span>{{$cart -> price}} ft</h5>
                                </div>
                            </div>          
                            <div class="col-md-5">
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Mennyiség:</p>
                                    <div class="d-inline-flex">
                                        <form action="{{ route('cart.updateQuantity', $cart->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <select name="quantity" class="form-select form-select-sm w-xl" onchange="this.form.submit()">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}" {{ $cart->product_count == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                    

                </div>
            </div>
        @endforeach

            <div class="row my-4">
               <div class="my-4 text-center">
                    @if ($shipping == 0)
                        <p class="text-success fw-bold p-2 border border-success rounded">
                    🎉 A szállítás ingyenes, mert a rendelési értéked elérte a 10000 Ft-ot!
                        </p>
                            @else
                            @php
                                $remaining = 10000 - $subtotal;
                            @endphp       
                        <p class="p-2 border border-warning rounded" style="color: #FFC300;">
                    📦 Rendelj még {{ number_format($remaining, 0, ',', ' ') }} Ft értékben a ingyenes szállításhoz!
                        </p>
                    @endif
            </div>
                <div class="col-sm-6">
                    <div class="text-sm-end mt-2 mt-sm-0">
                      <form action="{{ route('checkout.process') }}" method="POST" style="display:inline;">
    @csrf
   <div class="col-sm-6">
    <div class="text-sm-end mt-2 mt-sm-0">
        <form action="{{ route('checkout.process') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-success">
                <i class="mdi mdi-cart-outline me-1"></i> Fizetés
            </button>
        </form>
    </div>
</div> <!-- end col -->

        <div class="col-xl-4">
            <div class="mt-5 mt-lg-0">
                <div class="card border shadow-none">
                    <div class="card-header bg-transparent border-bottom py-3 px-4">
                        <h5 class="font-size-16 mb-0">Teljes rendelés: <span class="float-end"></span></h5>
                    </div>
                    <div class="card-body p-4 pt-2">

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    @foreach($all['cart'] as $osszeg)
                                    <tr>
                                         <td>{{$osszeg -> product_name}} ({{$osszeg -> product_count}}) :</td>
                                        <td class="text-end">{{ $osszeg->price * $osszeg->product_count }} ft</td>
                                    </tr>
                                   @endforeach
                                    <tr>
                                        <td>Szállítás :</td>
                                           <td class="text-end"> 
                                        @if ($shipping == 0)
                                                <span class="text-success fw-bold">Ingyenes</span>
                                            @else
                                                {{ $shipping }} ft
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Adó : </td>
                                        <td class="text-end"> 2000 ft</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <th>Végösszeg :</th>
                                        <td class="text-end">
                                            <span class="fw-bold">
                                                 {{$total}} ft
                                            </span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
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
</html>
