@extends('layouts.app')

@section('content')
<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-bold mb-4">Üdvözöljük az Adminisztrátori Dashboardon!</h2>
        
        <p class="mb-4">Sikeresen bejelentkezett. Kérjük, válasszon a menüpontok közül:</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            {{-- Termékek Kezelése --}}
            <div class="p-4 border rounded-lg shadow-md bg-gray-50 dark:bg-gray-700">
                <h3 class="text-xl font-semibold mb-2">Termékek</h3>
                <p class="mb-3">Kezelje a webshopban megjelenő termékeket.</p>
                <a href="{{ route('admin.products.index') }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium">
                    Terméklista megtekintése &rarr;
                </a>
            </div>
            
            {{-- Rendelések Kezelése (Ha létezik az útvonal) --}}
            <div class="p-4 border rounded-lg shadow-md bg-gray-50 dark:bg-gray-700">
                <h3 class="text-xl font-semibold mb-2">Rendelések</h3>
                <p class="mb-3">Tekintse át a beérkezett vásárlásokat.</p>
                {{-- feltételezve, hogy az útvonal orders.admin.index néven létezik --}}
                {{-- <a href="{{ route('orders.admin.index') }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 font-medium">
                    Rendelések megtekintése &rarr;
                </a> --}}
            </div>
        </div>
    </div>
</div>
@endsection