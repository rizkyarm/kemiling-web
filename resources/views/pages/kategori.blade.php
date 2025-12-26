@extends('layouts.app')

@section('title', 'Kategori | ')

@section('content')
    <section class="py-16 text-center bg-white border-b">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Kategori</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Jelajahi berbagai kategori tempat wisata dan produk UMKM terbaik di Kecamatan Kemiling</p>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="bg-white p-4 rounded-xl border shadow-sm mb-12">
                <h3 class="text-lg font-semibold mb-4">Filter Kategori</h3>
                <div id="filter-container" class="flex flex-wrap gap-3">
                    <button class="filter-btn active" data-filter="semua">Semua ({{ $products->count() }})</button>
                    @foreach($categories as $category)
                        <button class="filter-btn" data-filter="{{ $category->slug }}">{{ $category->name }} ({{ $category->products_count }})</button>
                    @endforeach
                </div>
            </div>

            <div id="card-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($products as $product)
                    <a href="{{ route('product.show', $product) }}" class="card-link block" data-category="{{ $product->category->slug ?? '' }}">
                        <div class="card h-full flex flex-col">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                                @if($product->category)
                                    <span class="card-tag tag-umkm">{{ $product->category->name }}</span>
                                @endif
                            </div>
                            <div class="p-5 flex-grow flex flex-col">
                                <h3 class="text-xl font-semibold mb-2 truncate">{{ $product->name }}</h3>
                                <div class="flex items-center text-sm text-gray-600 mb-3 truncate">
                                    <i data-lucide="map-pin" class="w-4 h-4 mr-2 flex-shrink-0"></i> 
                                    {{ $product->address }}
                                </div>
                                <p class="text-lg font-bold text-green-600 mt-auto pt-2">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                    <span class="text-sm font-normal text-gray-500">{{ $product->price_unit }}</span>
                                </p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-span-1 lg:col-span-4 text-center bg-white p-12 rounded-xl border">
                        <h2 class="text-2xl font-semibold text-gray-700">Belum Ada Produk</h2>
                        <p class="text-gray-500 mt-2">Saat ini belum ada produk atau tempat wisata dalam kategori ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterContainer = document.getElementById('filter-container');
    const cardGrid = document.getElementById('card-grid');
    const cards = cardGrid.querySelectorAll('.card-link');

    filterContainer.addEventListener('click', function (e) {
        if (e.target.classList.contains('filter-btn')) {
            filterContainer.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });

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