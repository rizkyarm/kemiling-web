@extends('layouts.app')

@section('title', 'Jelajahi Keindahan Lokal ')
    
@section('content')
    
        <section class="py-20 text-center bg-white">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Jelajahi Keindahan Kemiling</h1>
                <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Temukan tempat wisata menarik dan produk UMKM terbaik di Kecamatan Kemiling</p>
                
                <div class="max-w-2xl mx-auto search-container">
                    <span class="absolute left-4 text-gray-400">
                       <i data-lucide="search"></i>
                    </span>
                    <input type="text" placeholder="Cari tempat wisata atau produk UMKM..." class="search-input">
                    <button class="btn btn-primary search-btn">Cari</button>
                </div>
            </div>
        </section>

        @if($recommendations->isNotEmpty())
        <section class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-8">Rekomendasi untuk Anda</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($recommendations as $product)
                        <a href="{{ route('product.show', $product) }}" class="card-link">
                            <div class="card">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                    @if($product->category)
                                    <span class="card-tag tag-umkm">{{ $product->category->name }}</span>
                                    @endif
                                </div>
                                <div class="p-5">
                                    <h3 class="text-xl font-semibold mb-2 truncate">{{ $product->name }}</h3>
                                    <div class="flex items-center text-sm text-gray-500 mb-2">
                                        <div class="flex text-yellow-400 mr-1">★★★★★</div> ({{ $product->rating }}/5)
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 mb-3 truncate">
                                        <i data-lucide="map-pin" class="w-4 h-4 mr-2 flex-shrink-0"></i> {{ $product->address }}
                                    </div>
                                    <p class="text-lg font-bold text-green-600">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                        <span class="text-sm font-normal text-gray-500">{{ $product->price_unit }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if($attractions->isNotEmpty())
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-8">Tempat Wisata Terbaru</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($attractions as $product)
                         <a href="{{ route('product.show', $product) }}" class="card-link">
                            <div class="card">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                    @if($product->category)
                                    <span class="card-tag tag-wisata">{{ $product->category->name }}</span>
                                    @endif
                                </div>
                                <div class="p-5">
                                    <h3 class="text-xl font-semibold mb-2 truncate">{{ $product->name }}</h3>
                                    <div class="flex items-center text-sm text-gray-500 mb-2">
                                        <div class="flex text-yellow-400 mr-1">★★★★★</div> ({{ $product->rating }}/5)
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 mb-3 truncate">
                                        <i data-lucide="map-pin" class="w-4 h-4 mr-2 flex-shrink-0"></i> {{ $product->address }}
                                    </div>
                                    <p class="text-lg font-bold text-green-600">
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                        <span class="text-sm font-normal text-gray-500">{{ $product->price_unit }}</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                @if($allProducts->isNotEmpty())
                <section class="py-16">
                    <div class="container mx-auto px-4">
                        <h2 class="text-3xl font-bold mb-8">Jelajahi Semua Pilihan</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                            @foreach($allProducts as $product)
                                <a href="{{ route('product.show', $product) }}" class="card-link">
                                    <div class="card">
                                        <div class="relative">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                            @if($product->category)
                                            <span class="card-tag tag-umkm">{{ $product->category->name }}</span>
                                            @endif
                                        </div>
                                        <div class="p-5">
                                            <h3 class="text-xl font-semibold mb-2 truncate">{{ $product->name }}</h3>
                                            <div class="flex items-center text-sm text-gray-500 mb-2">
                                                <div class="flex text-yellow-400 mr-1">★★★★★</div> ({{ $product->rating }}/5)
                                            </div>
                                            <div class="flex items-center text-sm text-gray-600 mb-3 truncate">
                                                <i data-lucide="map-pin" class="w-4 h-4 mr-2 flex-shrink-0"></i> {{ $product->address }}
                                            </div>
                                            <p class="text-lg font-bold text-green-600">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                                <span class="text-sm font-normal text-gray-500">{{ $product->price_unit }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </section>
                @endif

                <div class="text-center mt-12">
                    <a href="{{ route('product') }}" class="btn btn-primary">Lihat Semua Tempat Wisata</a>
                </div>
            </div>
        </section>
        @endif

@endsection
