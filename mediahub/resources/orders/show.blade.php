@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Rendelés #{{ $order->id }} Részletei</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Vissza a rendelésekhez</a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Termékek</h5>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($order->items as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                **{{ $item->product->title ?? 'Törölt termék' }}** <br>
                                <small class="text-muted">{{ $item->product->creator ?? 'Ismeretlen előadó' }} ({{ $item->product->type ?? 'Ismeretlen típus' }})</small>
                            </div>
                            <span class="text-success fw-bold">{{ number_format($item->price, 0, ',', ' ') }} HUF</span>
                        </li>
                    @endforeach
                </ul>
                <div class="card-footer text-end fw-bold fs-5">
                    Összesen: {{ number_format($order->total_amount, 0, ',', ' ') }} HUF
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Rendelés adatok</h5>
                </div>
                <div class="card-body">
                    <p>
                        **Rendelés dátuma:** {{ $order->created_at->format('Y. F j. H:i') }} <br>
                        **Fizetési mód:** {{ $order->payment_method }} <br>
                        **Fizetve:** @if ($order->paid_at)
                            <span class="badge bg-success">Igen ({{ $order->paid_at->format('Y. F j.') }})</span>
                        @else
                            <span class="badge bg-danger">Nem</span>
                        @endif
                    </p>
                    <hr>
                    <h6>Felhasználó adatai:</h6>
                    <p class="mb-0">
                        **Név:** {{ $order->user->name }} <br>
                        **Email:** {{ $order->user->email }} <br>
                        **Cím:** {{ $order->user->postal_code }}, {{ $order->user->city }}, {{ $order->user->address }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection