@extends('layouts.app')

@section('title', 'Tambah Produk Baru | ')

@section('content')
<div class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl border shadow-sm">
            
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Tambahkan Produk Anda
                </h1>
                <p class="mt-2 text-sm text-gray-600">
                    Isi detail di bawah ini untuk mendaftarkan tempat wisata atau produk UMKM Anda di platform kami.
                </p>
            </header>

            <form method="POST" action="{{ route('store-product') }}" class="space-y-8" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Produk / Tempat Wisata</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required
                           class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
                           placeholder="Contoh: Villa LDR, Keripik Pisang Enak">
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select id="category_id" name="category_id" required
                            class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm">
                        <option value="" disabled selected>Pilih Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="description" name="description" rows="5" required
                              class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
                              placeholder="Jelaskan secara detail tentang produk atau tempat wisata Anda...">{{ old('description') }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat Singkat</label>
                    <input id="address" name="address" type="text" value="{{ old('address') }}" required
                           class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
                           placeholder="Contoh: Kemiling Permai, Jl. Teuku Cik Ditiro">
                    <x-input-error class="mt-2" :messages="$errors->get('address')" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="md:col-span-2">
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga (Rp)</label>
                        <input id="price" name="price" type="number" step="1000" value="{{ old('price') }}" required
                               class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
                               placeholder="Contoh: 150000">
                        <x-input-error class="mt-2" :messages="$errors->get('price')" />
                    </div>
                    <div>
                        <label for="price_unit" class="block text-sm font-medium text-gray-700">Satuan Harga</label>
                        <select id="price_unit" name="price_unit" required
                                class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm">
                            <option value="" disabled {{ old('price_unit') ? '' : 'selected' }}>Pilih Satuan</option>
                            <option value="/malam" {{ old('price_unit') == '/malam' ? 'selected' : '' }}>/malam</option>
                            <option value="/orang" {{ old('price_unit') == '/orang' ? 'selected' : '' }}>/orang</option>
                            <option value="/pack" {{ old('price_unit') == '/pack' ? 'selected' : '' }}>/pack</option>
                            <option value="/porsi" {{ old('price_unit') == '/porsi' ? 'selected' : '' }}>/porsi</option>
                            <option value="/item" {{ old('price_unit') == '/item' ? 'selected' : '' }}>/item</option>
                            <option value="/tiket" {{ old('price_unit') == '/tiket' ? 'selected' : '' }}>/tiket</option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('price_unit')" />
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Utama (Thumbnail)</label>
                    <div class="flex flex-col items-center justify-center w-full">
                        <img id="image-preview" src="https://placehold.co/600x400/e2e8f0/94a3b8?text=Pilih+Gambar" class="h-64 w-full rounded-lg object-cover bg-gray-100 mb-4" alt="Image preview">
                        <label for="image" class="cursor-pointer inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-full font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
                            Pilih Gambar Utama
                        </label>
                        <input id="image" name="image" type="file" class="hidden" onchange="previewSingleImage(event, 'image-preview')" accept="image/jpeg,image/png,image/webp" required>
                        <p class="text-xs text-gray-500 mt-2">PNG, JPG, WEBP hingga 2MB.</p>
                        <x-input-error class="mt-2" :messages="$errors->get('image')" />
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Galeri (Opsional, bisa lebih dari satu)</label>
                    <div class="flex flex-col items-center justify-center w-full">
                        <input id="gallery" name="gallery[]" type="file" multiple
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                               onchange="previewMultipleImages(event, 'gallery-preview-container')" accept="image/jpeg,image/png,image/webp">
                        <div id="gallery-preview-container" class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 w-full">
                        </div>
                        @foreach($errors->get('gallery.*') as $messages)
                            @foreach($messages as $message)
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @endforeach
                        @endforeach
                    </div>
                </div>

                <div>
                    <label for="place_search" class="block text-sm font-medium text-gray-700">Cari Lokasi (Google Maps)</label>
                    <input id="place_search" type="text"
                        placeholder="Cari nama tempat, alamat..."
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm">

                    <p class="mt-2 text-xs text-gray-500">
                        Tips: ketik nama lokasi lalu pilih dari saran. Kamu juga bisa klik peta, atau geser markernya.
                    </p>

                    <div
                        id="map"
                        class="mt-4 w-full h-72 rounded-lg border border-gray-200"
                        data-old-lat="{{ old('latitude') }}"
                        data-old-lng="{{ old('longitude') }}"
                        data-country="id"   
                    ></div>

                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                            <input id="latitude" name="latitude" type="number" step="0.0000001"
                                value="{{ old('latitude') }}"
                                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
                                placeholder="-6.2">
                            <x-input-error class="mt-2" :messages="$errors->get('latitude')" />
                        </div>
                        <div>
                            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                            <input id="longitude" name="longitude" type="number" step="0.0000001"
                                value="{{ old('longitude') }}"
                                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
                                placeholder="106.8">
                            <x-input-error class="mt-2" :messages="$errors->get('longitude')" />
                        </div>
                    </div>
                </div>


                <div class="flex items-center pt-6 border-t border-gray-200">
                    <button type="submit" class="w-full inline-flex justify-center rounded-full border border-transparent bg-green-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    
    function previewSingleImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById(previewId);
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewMultipleImages(event, containerId) {
        const container = document.getElementById(containerId);
        container.innerHTML = '';
        
        if (event.target.files) {
            Array.from(event.target.files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.classList.add('relative', 'w-full', 'h-32');
                    
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('h-full', 'w-full', 'rounded-lg', 'object-cover');
                    
                    imgWrapper.appendChild(img);
                    container.appendChild(imgWrapper);
                }
                reader.readAsDataURL(file);
            });
        }
    }

    
</script>


@endsection

@push('scripts')
  <script>
    function previewSingleImage(event, previewId){  }
    function previewMultipleImages(event, containerId){  }
  </script>

  <script
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&libraries=places&callback=__initMaps"
    async defer>
  </script>
@endpush


