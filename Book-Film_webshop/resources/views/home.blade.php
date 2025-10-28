<x-app-layout>
  
    <div class="relative bg-gradient-to-r from-purple-900 via-blue-900 to-indigo-900 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 animate-fade-in">
                    Könyv &  Film Webshop
                </h1>
                <p class="text-xl md:text-2xl text-gray-200 mb-8">
                    Fedezd fel a legjobb filmeket és könyveket egy helyen!
                </p>
                <div class="flex justify-center space-x-4">
                    <a href="#books" class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition transform hover:scale-105">
                         Könyvek böngészése
                    </a>
                    <a href="#movies" class="bg-red-600 hover:bg-red-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition transform hover:scale-105">
                         Filmek böngészése
                    </a>
                </div>
            </div>
        </div>
       
        <div class="absolute top-0 left-0 w-64 h-64 bg-purple-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 right-0 w-64 h-64 bg-yellow-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-1/2 w-64 h-64 bg-pink-500 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
    </div>

  
    <div class="bg-gray-800 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#featured" class="bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 text-white px-6 py-3 rounded-full font-semibold transition transform hover:scale-105">
                     Kiemelt ajánlataink
                </a>
                <a href="#new-arrivals" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-600 hover:to-cyan-600 text-white px-6 py-3 rounded-full font-semibold transition transform hover:scale-105">
                     Új megjelenések
                </a>
                <a href="#popular" class="bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 text-white px-6 py-3 rounded-full font-semibold transition transform hover:scale-105">
                     Legnépszerűbb
                </a>
            </div>
        </div>
    </div>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

           
            <section id="featured" class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-4xl font-bold text-white mb-2"> Kiemelt Filmek</h2>
                        <p class="text-gray-400">A hét legjobb ajánlatai</p>
                    </div>
                    <a href="{{ route('movies.index') }}" class="text-red-500 hover:text-red-400 font-semibold flex items-center">
                        Összes film
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @forelse($featuredMovies as $movie)
                        <div class="group relative bg-gray-800 rounded-lg overflow-hidden hover:ring-2 hover:ring-red-500 transition-all duration-300 transform hover:scale-105">
                            <a href="{{ route('movies.show', $movie) }}">
                                <div class="aspect-[2/3] bg-gray-700 relative">
                                    @if($movie->poster_image)
                                        <img src="{{ Storage::url($movie->poster_image) }}" 
                                             alt="{{ $movie->title }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <span class="text-6xl">🎬</span>
                                        </div>
                                    @endif
                                    
                                    
                                    <div class="absolute top-2 right-2 bg-red-600 text-white px-2 py-1 rounded text-xs font-bold">
                                        -20%
                                    </div>
                                    
                                   
                                    <div class="absolute bottom-2 left-2 bg-black bg-opacity-75 text-yellow-400 px-2 py-1 rounded text-sm font-semibold">
                                         {{ number_format($movie->rating, 1) }}
                                    </div>
                                </div>
                                
                                <div class="p-4">
                                    <h3 class="text-white font-semibold text-sm mb-1 truncate group-hover:text-red-400 transition">
                                        {{ $movie->title }}
                                    </h3>
                                    <p class="text-gray-400 text-xs mb-2">{{ $movie->release_year }} • {{ $movie->genre }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-green-400 font-bold text-lg">{{ number_format($movie->price, 0) }} Ft</span>
                                        <button class="bg-red-600 hover:bg-red-700 text-white p-2 rounded-full transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-400 text-lg">Nincs kiemelt film jelenleg</p>
                        </div>
                    @endforelse
                </div>
            </section>

           
            <section id="books" class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-4xl font-bold text-white mb-2"> Kiemelt Könyvek</h2>
                        <p class="text-gray-400">Bestseller könyvek a polcainkon</p>
                    </div>
                    <a href="#" class="text-green-500 hover:text-green-400 font-semibold flex items-center">
                        Összes könyv
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                    @forelse($featuredBooks as $book)
                        <div class="group relative bg-gray-800 rounded-lg overflow-hidden hover:ring-2 hover:ring-green-500 transition-all duration-300 transform hover:scale-105">
                            <a href="#">
                                <div class="aspect-[2/3] bg-gray-700 relative">
                                    @if($book->cover_image)
                                        <img src="{{ Storage::url($book->cover_image) }}" 
                                             alt="{{ $book->title }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <span class="text-6xl"></span>
                                        </div>
                                    @endif
                                    
                                   
                                    <div class="absolute top-2 right-2 bg-yellow-500 text-black px-2 py-1 rounded text-xs font-bold">
                                        BESTSELLER
                                    </div>
                                    
                                  
                                    <div class="absolute bottom-2 left-2 bg-black bg-opacity-75 text-yellow-400 px-2 py-1 rounded text-sm font-semibold">
                                         {{ number_format($book->rating, 1) }}
                                    </div>
                                </div>
                                
                                <div class="p-4">
                                    <h3 class="text-white font-semibold text-sm mb-1 truncate group-hover:text-green-400 transition">
                                        {{ $book->title }}
                                    </h3>
                                    <p class="text-gray-400 text-xs mb-2">{{ $book->author }}</p>
                                    <div class="flex items-center justify-between">
                                        <span class="text-green-400 font-bold text-lg">{{ number_format($book->price, 0) }} Ft</span>
                                        <button class="bg-green-600 hover:bg-green-700 text-white p-2 rounded-full transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-12">
                            <p class="text-gray-400 text-lg">Nincs kiemelt könyv jelenleg</p>
                        </div>
                    @endforelse
                </div>
            </section>

            
            <section id="new-arrivals" class="mb-16">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-white mb-2"> Új Megjelenések</h2>
                    <p class="text-gray-400">A legfrissebb filmek és könyvek</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    
                    <div class="bg-gray-800 rounded-lg p-6">
                        <h3 class="text-2xl font-bold text-red-400 mb-4 flex items-center">
                            <span class="bg-red-600 text-white w-8 h-8 rounded-full flex items-center justify-center mr-3">🎬</span>
                            Új Filmek
                        </h3>
                        <div class="space-y-4">
                            @foreach($newMovies->take(4) as $movie)
                                <a href="{{ route('movies.show', $movie) }}" class="flex items-center space-x-4 bg-gray-700 rounded-lg p-3 hover:bg-gray-600 transition group">
                                    <div class="w-16 h-24 bg-gray-600 rounded overflow-hidden flex-shrink-0">
                                        @if($movie->poster_image)
                                            <img src="{{ Storage::url($movie->poster_image) }}" 
                                                 alt="{{ $movie->title }}"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-2xl">🎬</div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-white font-semibold text-sm truncate group-hover:text-red-400 transition">
                                            {{ $movie->title }}
                                        </h4>
                                        <p class="text-gray-400 text-xs">{{ $movie->release_year }} • {{ $movie->genre }}</p>
                                        <div class="flex items-center justify-between mt-1">
                                            <span class="text-yellow-400 text-xs"> {{ number_format($movie->rating, 1) }}</span>
                                            <span class="text-green-400 font-semibold text-sm">{{ number_format($movie->price, 0) }} Ft</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    
                    <div class="bg-gray-800 rounded-lg p-6">
                        <h3 class="text-2xl font-bold text-green-400 mb-4 flex items-center">
                            <span class="bg-green-600 text-white w-8 h-8 rounded-full flex items-center justify-center mr-3"></span>
                            Új Könyvek
                        </h3>
                        <div class="space-y-4">
                            @foreach($newBooks->take(4) as $book)
                                <a href="#" class="flex items-center space-x-4 bg-gray-700 rounded-lg p-3 hover:bg-gray-600 transition group">
                                    <div class="w-16 h-24 bg-gray-600 rounded overflow-hidden flex-shrink-0">
                                        @if($book->cover_image)
                                            <img src="{{ Storage::url($book->cover_image) }}" 
                                                 alt="{{ $book->title }}"
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-2xl"></div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-white font-semibold text-sm truncate group-hover:text-green-400 transition">
                                            {{ $book->title }}
                                        </h4>
                                        <p class="text-gray-400 text-xs truncate">{{ $book->author }}</p>
                                        <div class="flex items-center justify-between mt-1">
                                            <span class="text-yellow-400 text-xs"> {{ number_format($book->rating, 1) }}</span>
                                            <span class="text-green-400 font-semibold text-sm">{{ number_format($book->price, 0) }} Ft</span>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

          
            <section id="popular" class="mb-16">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-white mb-2"> Legnépszerűbb termékek</h2>
                    <p class="text-gray-400">Amit mások is imádnak</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($popularMovies as $movie)
                        <div class="bg-gradient-to-br from-red-900 to-red-700 rounded-lg overflow-hidden hover:shadow-2xl hover:shadow-red-500/50 transition-all duration-300 transform hover:scale-105">
                            <a href="{{ route('movies.show', $movie) }}">
                                <div class="aspect-video bg-black relative">
                                    @if($movie->poster_image)
                                        <img src="{{ Storage::url($movie->poster_image) }}" 
                                             alt="{{ $movie->title }}"
                                             class="w-full h-full object-cover opacity-80">
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute bottom-2 left-2 right-2">
                                        <span class="text-yellow-400 text-sm font-bold"> {{ number_format($movie->rating, 1) }}</span>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-white font-bold mb-1 truncate">{{ $movie->title }}</h3>
                                    <p class="text-red-200 text-xs mb-2">Film • {{ $movie->release_year }}</p>
                                    <span class="text-white font-bold text-xl">{{ number_format($movie->price, 0) }} Ft</span>
                                </div>
                            </a>
                        </div>
                    @endforeach

                    @foreach($popularBooks as $book)
                        <div class="bg-gradient-to-br from-green-900 to-green-700 rounded-lg overflow-hidden hover:shadow-2xl hover:shadow-green-500/50 transition-all duration-300 transform hover:scale-105">
                            <a href="#">
                                <div class="aspect-video bg-black relative">
                                    @if($book->cover_image)
                                        <img src="{{ Storage::url($book->cover_image) }}" 
                                             alt="{{ $book->title }}"
                                             class="w-full h-full object-cover opacity-80">
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent"></div>
                                    <div class="absolute bottom-2 left-2 right-2">
                                        <span class="text-yellow-400 text-sm font-bold"> {{ number_format($book->rating, 1) }}</span>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <h3 class="text-white font-bold mb-1 truncate">{{ $book->title }}</h3>
                                    <p class="text-green-200 text-xs mb-2"> Könyv • {{ $book->author }}</p>
                                    <span class="text-white font-bold text-xl">{{ number_format($book->price, 0) }} Ft</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>

           
            <section class="bg-gradient-to-r from-purple-800 to-pink-800 rounded-2xl p-8 md:p-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                     Iratkozz fel hírlevelünkre!
                </h2>
                <p class="text-gray-200 mb-6 max-w-2xl mx-auto">
                    Legyél az első, aki értesül új megjelenésekről, exkluzív akciókról és ajándékokról!
                </p>
                <form class="max-w-md mx-auto flex gap-2">
                    @csrf
                    <input type="email" placeholder="E-mail címed" 
                           class="flex-1 px-4 py-3 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-black px-6 py-3 rounded-lg font-bold transition">
                        Feliratkozás
                    </button>
                </form>
            </section>

        </div>
    </div>

   
    <style>
        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(20px, -50px) scale(1.1); }
            50% { transform: translate(-20px, 20px) scale(0.9); }
            75% { transform: translate(50px, 50px) scale(1.05); }
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</x-app-layout>