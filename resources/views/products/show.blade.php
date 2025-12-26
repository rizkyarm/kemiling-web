@extends('layouts.app')

@section('title', $product->name . ' | ')

@section('content')

<div class="bg-gray-50">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-8">                
                <div class="lg:col-span-3">
                    <div class="bg-white p-4 rounded-2xl border shadow-sm">
                        <div class="mb-4">
                            <img id="main-image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-96 object-cover rounded-xl">
                        </div>
                        <div class="grid grid-cols-5 gap-3">
                            <div>
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Thumbnail Utama" class="w-full h-24 object-cover rounded-md cursor-pointer border-2 border-green-500" onclick="changeImage('{{ asset('storage/' . $product->image) }}', this)">
                            </div>
                            @if($product->images)
                                @foreach($product->images as $image)
                                    <div>
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Galeri Produk" class="w-full h-24 object-cover rounded-md cursor-pointer border-2 border-transparent hover:border-green-500" onclick="changeImage('{{ asset('storage/' . $image->path) }}', this)">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <div class="bg-white p-6 rounded-2xl border shadow-sm">
                        @if($product->category)
                            <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold mb-3 px-2.5 py-1 rounded-full">{{ $product->category->name }}</span>
                        @endif
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <div class="flex text-yellow-400 mr-2">★★★★★</div> ({{ $product->rating }}/5)
                        </div>
                        <p class="text-4xl font-extrabold text-green-600 mb-4">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                            <span class="text-lg font-medium text-gray-500">{{ $product->price_unit }}</span>
                        </p>
                        <div class="flex items-center text-gray-600 mb-6">
                            <i data-lucide="map-pin" class="w-5 h-5 mr-2 text-gray-400"></i>
                            <span>{{ $product->address }}</span>
                        </div>
                        <a href="#" class="btn btn-primary w-full mb-6 inline-flex items-center justify-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4 shrink-0"></i>
                            <span>Hubungi Penjual</span>
                        </a>

                        <div class="flex items-center p-4 bg-gray-50 rounded-lg border">
                            @php
                                $photoPath = $product->user->profile_photo_path;
                                $thumbSrc = 'https://ui-avatars.com/api/?name=' . urlencode($product->user->name) . '&background=random';
                                if ($photoPath) {
                                    $fileName = basename($photoPath);
                                    $thumbPath = 'profile-photos/thumb/' . $fileName;
                                    $thumbSrc = asset('storage/' . $thumbPath);
                                }
                            @endphp
                            <img class="h-12 w-12 rounded-full object-cover mr-4" src="{{ $thumbSrc }}" alt="{{ $product->user->name }}">
                            <div>
                                <p class="font-semibold text-gray-800">{{ $product->user->name }}</p>
                                <p class="text-sm text-gray-500">Penjual Terverifikasi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-5 mt-4">
                    <div class="bg-white p-6 rounded-2xl border shadow-sm">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4">Deskripsi Produk</h2>
                        <div class="prose max-w-none text-gray-600">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>
                </div>

                @if($product->latitude && $product->longitude)
                <div class="bg-white p-6 rounded-2xl border shadow-sm mt-8 lg:col-span-5">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Lokasi</h2>
                        <div class="hidden sm:flex gap-3">
                            <a href="https://www.google.com/maps/search/?api=1&query={{ $product->latitude }},{{ $product->longitude }}"
                            target="_blank" rel="noopener"
                            class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-full border border-gray-300 text-sm font-medium hover:bg-gray-50">
                            <i data-lucide="map" class="w-4 h-4 shrink-0"></i>
                            <span>Buka di Google Maps</span>
                            </a>
                            <a href="https://www.google.com/maps/dir/?api=1&destination={{ $product->latitude }},{{ $product->longitude }}"
                            target="_blank" rel="noopener"
                            class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-full border border-gray-300 text-sm font-medium hover:bg-gray-50">
                            <i data-lucide="navigation" class="w-4 h-4 shrink-0"></i>
                            <span>Petunjuk Arah</span>
                            </a>
                        </div>
                    </div>

                    <div id="product-map" class="w-full h-[28rem] md:h-[36rem] rounded-2xl border"></div>

                    <div class="mt-4 sm:hidden flex flex-wrap gap-3">
                        <a href="https://www.google.com/maps/search/?api=1&query={{ $product->latitude }},{{ $product->longitude }}"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-full border border-gray-300 text-sm font-medium hover:bg-gray-50 w-full">
                        <i data-lucide="map" class="w-4 h-4 shrink-0"></i>
                        <span>Buka di Google Maps</span>
                        </a>
                        <a href="https://www.google.com/maps/dir/?api=1&destination={{ $product->latitude }},{{ $product->longitude }}"
                        target="_blank" rel="noopener"
                        class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-full border border-gray-300 text-sm font-medium hover:bg-gray-50 w-full">
                        <i data-lucide="navigation" class="w-4 h-4 shrink-0"></i>
                        <span>Petunjuk Arah</span>
                        </a>
                    </div>
                </div>
                @endif


            </div>

            @if($relatedProducts->isNotEmpty())
            <div class="mt-16">
                <div class="border-t pt-12">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">Anda Mungkin Juga Suka</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach($relatedProducts as $relatedProduct)
                            <a href="{{ route('product.show', $relatedProduct) }}" class="card-link block">
                                <div class="card h-full flex flex-col">
                                    <div class="relative">
                                        <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" class="w-full h-48 object-cover">
                                        @if($relatedProduct->category)
                                            <span class="card-tag tag-umkm">{{ $relatedProduct->category->name }}</span>
                                        @endif
                                    </div>
                                    <div class="p-5 flex-grow flex flex-col">
                                        <h3 class="text-xl font-semibold mb-2 truncate">{{ $relatedProduct->name }}</h3>
                                        <div class="flex items-center text-sm text-gray-600 mb-3 truncate">
                                            <i data-lucide="map-pin" class="w-4 h-4 mr-2 flex-shrink-0"></i> 
                                            {{ $relatedProduct->address }}
                                        </div>
                                        <p class="text-lg font-bold text-green-600 mt-auto pt-2">
                                            Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}
                                            <span class="text-sm font-normal text-gray-500">{{ $relatedProduct->price_unit }}</span>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>



<script>
    function changeImage(newSrc, clickedThumbnail) {
        document.getElementById('main-image').src = newSrc;

        const thumbnails = document.querySelectorAll('.grid.grid-cols-5 img');
        thumbnails.forEach(thumb => {
            thumb.classList.remove('border-green-500');
            thumb.classList.add('border-transparent');
        });
        
        clickedThumbnail.classList.add('border-green-500');
        clickedThumbnail.classList.remove('border-transparent');
    }
</script>

@endsection

@push('scripts')
<script>
  function __initProductShowMap() {
    var el = document.getElementById('product-map');
    if (!el) return;

    var lat = {{ $product->latitude ?? 'null' }};
    var lng = {{ $product->longitude ?? 'null' }};
    if (lat === null || lng === null) return;

    var pos = { lat: parseFloat(lat), lng: parseFloat(lng) };

    var map = new google.maps.Map(el, {
      center: pos,
      zoom: 15,
      mapTypeControl: false,
      streetViewControl: false,
      fullscreenControl: true,
    });

    new google.maps.Marker({
      position: pos,
      map: map,
      title: @json($product->name),
    });

    if (window.lucide && typeof lucide.createIcons === 'function') {
      lucide.createIcons();
    }
  }
</script>
<script
  src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&callback=__initProductShowMap"
  async defer>
</script>
@endpush
