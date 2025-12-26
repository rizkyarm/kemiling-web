@extends('layouts.app')

@section('title', 'Semua Produk | ')

@section('content')
<div class="bg-gray-50">
    <div class="container mx-auto px-4 py-8 md:py-12">
        <section class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Daftar Produk & Wisata</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Temukan berbagai produk UMKM berkualitas dan destinasi wisata menarik di Kecamatan Kemiling</p>
        </section>

        <section class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8 mb-12">
            <div class="bg-white p-6 rounded-2xl border text-center">
                <i data-lucide="store" class="mx-auto w-10 h-10 text-blue-500 mb-3"></i>
                <p class="text-3xl font-bold">{{ $stats['umkm'] }}</p>
                <p class="text-gray-500">Total Produk UMKM</p>
            </div>
             <div class="bg-white p-6 rounded-2xl border text-center">
                <i data-lucide="palmtree" class="mx-auto w-10 h-10 text-green-500 mb-3"></i>
                <p class="text-3xl font-bold">{{ $stats['wisata'] }}</p>
                <p class="text-gray-500">Destinasi Wisata</p>
            </div>
             <div class="bg-white p-6 rounded-2xl border text-center">
                <i data-lucide="utensils" class="mx-auto w-10 h-10 text-orange-500 mb-3"></i>
                <p class="text-3xl font-bold">{{ $stats['kuliner'] }}</p>
                <p class="text-gray-500">Kuliner Lokal</p>
            </div>
             <div class="bg-white p-6 rounded-2xl border text-center">
                <i data-lucide="gem" class="mx-auto w-10 h-10 text-purple-500 mb-3"></i>
                <p class="text-3xl font-bold">{{ $stats['kerajinan'] }}</p>
                <p class="text-gray-500">Kerajinan Tangan</p>
            </div>
        </section>

        <section class="bg-white p-6 rounded-2xl border mb-8">
             <div class="mb-6">
                <h3 class="font-semibold mb-3">Kategori</h3>
                <div id="filter-container" class="flex flex-wrap gap-2">
                    <button class="filter-btn active" data-filter="semua">Semua Produk ({{ $products->total() }})</button>
                    @foreach($categories as $category)
                        <button class="filter-btn" data-filter="{{ $category->slug }}">{{ $category->name }} ({{ $category->products_count }})</button>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="flex justify-between items-center mb-6">
            <p class="text-gray-600">Menampilkan <span class="font-semibold">{{ $products->count() }}</span> dari <span class="font-semibold">{{ $products->total() }}</span> produk</p>
        </div>
        
        <section id="card-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <a href="{{ route('product.show', $product) }}" class="card-link block bg-white rounded-2xl border overflow-hidden product-card" data-category="{{ $product->category->slug ?? '' }}">
                    <div class="relative">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        @if($product->category)
                        <span class="absolute top-3 left-3 bg-green-100 text-green-800 text-xs font-semibold px-2 py-1 rounded-full">{{ $product->category->name }}</span>
                        @endif
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="font-bold text-lg mb-1 truncate">{{ $product->name }}</h3>
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <div class="flex text-yellow-400 mr-1">★★★★★</div>({{ $product->rating }}/5)
                        </div>
                        <div class="flex items-center text-sm text-gray-600 mb-3 truncate">
                            <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>{{ $product->address }}
                        </div>
                        <p class="font-semibold text-green-600 mt-auto">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                            <span class="text-sm font-normal text-gray-500">{{ $product->price_unit }}</span>
                        </p>
                    </div>
                </a>
            @empty
                <div class="col-span-1 lg:col-span-4 text-center bg-white p-12 rounded-xl border">
                    <h2 class="text-2xl font-semibold text-gray-700">Tidak Ada Produk Ditemukan</h2>
                    <p class="text-gray-500 mt-2">Coba gunakan filter yang berbeda atau tambahkan produk baru.</p>
                </div>
            @endforelse
        </section>

        <!-- Pagination Links -->
        <nav class="mt-12">
            {{ $products->links() }}
        </nav>
        
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterContainer = document.getElementById('filter-container');
    const cards = document.querySelectorAll('#card-grid .card-link');

    filterContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('filter-btn')) {
            filterContainer.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            e.target.classList.add('active');

            const filter = e.target.getAttribute('data-filter');

            cards.forEach(card => {
                if (filter === 'semua' || card.getAttribute('data-category') === filter) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    });
});
</script>

