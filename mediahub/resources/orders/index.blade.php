@extends('layouts.app') 
{{-- Feltételezzük, hogy van egy 'layouts/app.blade.php' fájl a Bootstrap beállítással --}}

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>🛍️ Rendeléseim</h2>
    </div>

    @if ($orders->isEmpty())
        <div class="alert alert-info" role="alert">
            Még nem adtál le egyetlen rendelést sem.
        </div>
    @else
        <div class="row">
            @foreach ($orders as $order)
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Rendelés #{{ $order->id }}</h5>
                            <span class="badge bg-light text-primary fs-6">{{ number_format($order->total_amount, 0, ',', ' ') }} HUF</span>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                **Dátum:** {{ $order->created_at->format('Y. F j. H:i') }} <br>
                                **Fizetési mód:** {{ $order->payment_method }} <br>
                                **Állapot:** @if ($order->paid_at)
                                    <span class="badge bg-success">Fizetve</span>
                                @else
                                    <span class="badge bg-warning text-dark">Fizetésre vár</span>
                                @endif
                            </p>
                            
                            <h6 class="mt-3">Termékek:</h6>
                            <ul class="list-group list-group-flush mb-3">
                                @foreach ($order->items as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $item->product->title ?? 'Törölt termék' }}
                                        <span class="text-muted">{{ number_format($item->price, 0, ',', ' ') }} HUF</span>
                                    </li>
                                @endforeach
                            </ul>
                            
                            <a href="{{ route('orders.show', $order) }}" class="btn btn-outline-primary btn-sm">Részletek megtekintése</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection