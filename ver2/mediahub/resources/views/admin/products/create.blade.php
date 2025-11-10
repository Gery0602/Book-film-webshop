@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-900 dark:text-gray-100">Új termék hozzáadása</h1>

    <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg p-6">
        
        {{-- Az útvonal admin.products.store, amit a ProductController@store-ra mutat --}}
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                
                {{-- Név/Cím --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Termék neve/címe</label>
                    <input type="text" name="title" id="title" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 @error('title') border-red-500 @enderror" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Ár --}}
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Ár (Ft)</label>
                    <input type="number" name="price" id="price" required min="0" step="1"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 @error('price') border-red-500 @enderror" value="{{ old('price') }}">
                    @error('price')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                {{-- Leírás --}}
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Leírás</label>
                <textarea name="description" id="description" rows="4" required
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                {{-- Kép feltöltése --}}
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kép</label>
                <input type="file" name="image" id="image" 
                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:text-gray-200 dark:file:bg-gray-700 dark:file:text-indigo-400">
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mt-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Termék Mentése
                </button>
                <a href="{{ route('admin.products.index') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-700">
                    Vissza
                </a>
            </div>
        </form>
    </div>
</div>
@endsection