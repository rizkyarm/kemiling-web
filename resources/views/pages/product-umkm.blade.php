@extends('layouts.app')
@section('title', 'Produk UMKM | ')
@section('content')
        <section class="mb-8">
            <div class="relative w-full h-[300px] md:h-[500px] rounded-2xl overflow-hidden mb-4">
                <img id="main-image" src="https://placehold.co/1200x800/e6dace/453830?text=Produk+Anyaman" alt="Main view of woven products" class="w-full h-full object-cover transition-opacity duration-300">
                <div id="image-counter" class="absolute bottom-4 right-4 bg-black bg-opacity-50 text-white text-sm px-3 py-1 rounded-full">1 / 4</div>
            </div>
            <div class="grid grid-cols-4 gap-4">
                <img src="https://placehold.co/400x300/e6dace/453830?text=Produk+1" alt="Thumbnail 1" class="gallery-thumbnail w-full h-24 object-cover rounded-lg active" data-image="https://placehold.co/1200x800/e6dace/453830?text=Produk+Anyaman">
                <img src="https://placehold.co/400x300/d1c0a0/453830?text=Produk+2" alt="Thumbnail 2" class="gallery-thumbnail w-full h-24 object-cover rounded-lg" data-image="https://placehold.co/1200x800/d1c0a0/453830?text=Detail+Produk">
                <img src="https://placehold.co/400x300/c4a99d/453830?text=Produk+3" alt="Thumbnail 3" class="gallery-thumbnail w-full h-24 object-cover rounded-lg" data-image="https://placehold.co/1200x800/c4a99d/453830?text=Variasi">
                <img src="https://placehold.co/400x300/b5ab9c/453830?text=Produk+4" alt="Thumbnail 4" class="gallery-thumbnail w-full h-24 object-cover rounded-lg" data-image="https://placehold.co/1200x800/b5ab9c/453830?text=Kerajinan">
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8">
            
            <div class="lg:col-span-2">
                <div class="bg-white p-6 rounded-2xl border shadow-sm mb-6">
                    <div class="flex flex-col md:flex-row justify-between items-start">
                        <div>
                            <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full mb-2">UMKM</span>
                            <h1 class="text-3xl md:text-4xl font-bold">Kerajinan Anyaman Pandan Bu Siti</h1>
                            <div class="flex items-center mt-2 text-sm text-gray-500">
                                <div class="flex text-yellow-400 mr-2">★★★★☆</div>
                                <span>4/5 (78 ulasan)</span>
                            </div>
                            <div class="flex items-center mt-2 text-sm text-gray-600">
                                <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i>
                                Jl. Kemiling Barat No. 89, Kemiling, Bandar Lampung
                            </div>
                        </div>
                        <div class="mt-4 md:mt-0 md:text-right">
                             <p class="text-2xl font-bold text-green-600">Rp 45.000 - 150.000</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border shadow-sm mb-6">
                    <h2 class="text-2xl font-bold mb-4">Deskripsi</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Kerajinan Anyaman Pandan Bu Siti merupakan usaha kerajinan tangan yang telah berdiri sejak 1995. Memproduksi berbagai produk anyaman dari pandan berkualitas tinggi seperti tas, topi, tempat pensil, dan dekorasi rumah. Setiap produk dibuat dengan tangan oleh pengrajin berpengalaman dengan teknik anyaman tradisional yang telah diwariskan turun temurun. Produk-produk ini tidak hanya cantik dan unik, tetapi juga ramah lingkungan dan tahan lama. Bu Siti juga menerima pesanan custom sesuai dengan kebutuhan dan desain yang diinginkan pelanggan.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border shadow-sm mb-6">
                    <h2 class="text-2xl font-bold mb-4">Keunggulan Produk</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 text-gray-700">
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Produk Handmade</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Ramah Lingkungan</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Custom Order</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Pengrajin Berpengalaman</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Garansi Kualitas</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Konsultasi Desain</div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border shadow-sm">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Ulasan Pengunjung</h2>
                        <button class="btn btn-primary">Tulis Ulasan</button>
                    </div>
                    <div class="space-y-6">
                         <div class="border-b pb-6">
                           <div class="flex items-start">
                                <img src="https://i.pravatar.cc/40?u=sari" alt="Sari Wulandari" class="w-10 h-10 rounded-full mr-4">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-bold">Sari Wulandari</h4>
                                        <span class="text-xs text-gray-500">15 Januari 2024</span>
                                    </div>
                                    <div class="flex items-center my-1 text-yellow-400">★★★★★ <span class="text-gray-500 ml-2 text-sm">(5/5)</span></div>
                                    <p class="text-gray-600">Kualitas anyamannya bagus sekali, rapi dan kuat. Saya pesan tas custom dan hasilnya memuaskan. Pelayanannya juga ramah. Sangat direkomendasikan!</p>
                                </div>
                           </div>
                        </div>
                        <div class="border-b pb-6">
                            <div class="flex items-start">
                                 <img src="https://i.pravatar.cc/40?u=budi" alt="Budi Santoso" class="w-10 h-10 rounded-full mr-4">
                                 <div>
                                     <div class="flex items-center justify-between">
                                         <h4 class="font-bold">Budi Santoso</h4>
                                         <span class="text-xs text-gray-500">12 Januari 2024</span>
                                     </div>
                                     <div class="flex items-center my-1 text-yellow-400">★★★★☆ <span class="text-gray-500 ml-2 text-sm">(4/5)</span></div>
                                     <p class="text-gray-600">Produknya unik dan etnik, cocok untuk oleh-oleh. Pilihan modelnya banyak. Lokasinya agak masuk ke dalam gang, tapi masih mudah ditemukan.</p>
                                 </div>
                            </div>
                         </div>
                    </div>
                    <div class="text-center mt-8">
                        <button class="font-semibold text-green-600 hover:underline">Lihat Ulasan Lainnya</button>
                    </div>
                </div>

            </div>

            <div class="lg:sticky top-24 h-fit mt-8 lg:mt-0">
                <div class="bg-white p-6 rounded-2xl border shadow-sm mb-6">
                    <h2 class="text-2xl font-bold mb-4">Informasi Kontak</h2>
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-start"><i data-lucide="clock" class="w-5 h-5 mr-3 mt-1 flex-shrink-0 text-gray-500"></i><div><span class="font-semibold">Jam Buka</span><br>09:00 - 16:00 WIB</div></li>
                        <li class="flex items-start"><i data-lucide="message-circle" class="w-5 h-5 mr-3 mt-1 flex-shrink-0 text-gray-500"></i><div><span class="font-semibold">WhatsApp</span><br>+62 812 3456 7894</div></li>
                    </ul>
                     <button class="w-full mt-6 btn bg-blue-600 text-white hover:bg-blue-700">Pesan Sekarang</button>
                </div>

                <div class="bg-white p-6 rounded-2xl border shadow-sm">
                    <h2 class="text-2xl font-bold mb-4">Lokasi</h2>
                    <p class="text-gray-600 mb-4">Jl. Kemiling Barat No. 89, Kemiling, Bandar Lampung</p>
                    <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500 text-center text-sm p-4">Google Maps Platform rejected your request. The provided API key is invalid.</p>
                    </div>
                    <button class="w-full mt-4 btn bg-blue-600 text-white hover:bg-blue-700">Petunjuk Arah</button>
                </div>
            </div>
        </div>
        @endsection