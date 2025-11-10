@extends('layouts.app') 

@section('content')
<div class="container my-5">
    <h1>Főoldal: Terméklista</h1>
    
    @if($products->isEmpty())
        <p>Jelenleg nincs feltöltött termék. <a href="{{ route('login') }}">Jelentkezz be admin</a>, hogy feltölthess!</p>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $product->image_url ?? 'https://via.placeholder.com/150' }}" class="card-img-top" alt="{{ $product->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{{ number_format($product->price) }} Ft</p>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info">Részletek</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection