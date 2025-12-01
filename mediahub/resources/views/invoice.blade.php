<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediaHub: Megrendelés megerősítése</title>

    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            width: 100%;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        @if (isset($isPdf) && $isPdf)
        body {
            background-color: white;
            min-height: auto;
            padding: 0;
        }

        .container {
            box-shadow: none;
            border: 1px solid #ccc;
            border-radius: 0;
            padding: 20px;
        }
        @endif

        h1 {
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            color: #555;
            font-size: 1.25em;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        .message {
            background-color: #e6f7ff;
            color: #007bff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 1.1em;
            text-align: center;
        }

        .details p {
            margin: 5px 0;
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .total-row td {
            font-weight: bold;
            background-color: #e9ecef;
            border-top: 2px solid #007bff;
        }

        .redirect-info,
        .download-link {
            margin-top: 30px;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
        }

        .redirect-info {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .redirect-info a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .redirect-info a:hover {
            text-decoration: underline;
        }

        .download-link a {
            display: inline-block;
            padding: 12px 25px;
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .download-link a:hover {
            background-color: #c82333;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Megrendelés megerősítése és számla</h1>

        <div class="message">
            Rendelése sikeresen feldolgozva.
        </div>

        @php
        $total = 0;
        foreach($all['cart'] as $osszeg) {
            $total += $osszeg->price * $osszeg->product_count;
        }
        @endphp

        <div class="details">
            <h2>Számla adatok</h2>
            <p><strong>Rendelésszám:</strong> {{ $orderId }}</p>
            <p><strong>Dátum:</strong> {{ date('Y.m.d H:i') }}</p>

            <h2>Vásárló adatai</h2>
            <p><strong>Név:</strong> {{ $all['user']->name ?? 'N/A' }}</p>
            <p><strong>E-mail:</strong> {{ $all['user']->email ?? 'N/A' }}</p>
            <p><strong>Cím:</strong> {{ $all['user']->address ?? 'N/A' }}</p>

            <h2>Rendelt termékek</h2>
            <table>
                <thead>
                    <tr>
                        <th>Termék</th>
                        <th>Egységár</th>
                        <th>Mennyiség</th>
                        <th>Összeg</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all['cart'] as $item)
                    <tr>
                        <td>{{ $item->product_name ?? 'N/A' }}</td>
                        <td>{{ number_format($item->price ?? 0, 0, ',', '.') }} Ft</td>
                        <td>{{ $item->product_count ?? 0 }} db</td>
                        <td>{{ number_format(($item->price ?? 0) * ($item->product_count ?? 0), 0, ',', '.') }} Ft</td>
                    </tr>
                    @endforeach

                    <tr class="total-row">
                        <td colspan="3" style="text-align: right;">Fizetett teljes összeg:</td>
                        <td>{{ number_format($total, 0, ',', '.') }} Ft</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if (!isset($isPdf) || !$isPdf)
        <div class="button-container">
            <div class="download-link">
                <a href="{{ route('invoice.download', ['orderId' => $orderId]) }}">
                    Számla letöltése PDF-ben
                </a>
            </div>
        </div>
        @endif

        @if (!isset($isPdf) || !$isPdf)
        <div class="redirect-info">
           <a class="btn btn-primary" href="{{ route('dashboard') }}">Vissza a főoldalra</a>
        </div>
        @endif
    </div>
</body>

</html>