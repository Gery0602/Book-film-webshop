@extends('layouts.app') 

@section('content')
<div class="container my-5">
    <h2>Termékek Kezelése 📚🎬</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Új Termék Hozzáadása</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cím</th>
                <th>Kategória</th>
                <th>Ár</th>
                <th>Készlet</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ number_format($product->price, 2) }} Ft</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Szerkesztés</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Biztosan törölni szeretnéd?')">Törlés</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection