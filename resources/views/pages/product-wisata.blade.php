@extends('layouts.app')
@section('title', 'Wisata Di ')
@section('content')
<section class="mb-8">
            <div class="relative w-full h-[300px] md:h-[500px] rounded-2xl overflow-hidden mb-4">
                <img id="main-image" src="https://placehold.co/1200x800/8d7358/ffffff?text=Villa+LDR" alt="Main view of Villa LDR" class="w-full h-full object-cover transition-opacity duration-300">
                <div id="image-counter" class="absolute bottom-4 right-4 bg-black bg-opacity-50 text-white text-sm px-3 py-1 rounded-full">1 / 4</div>
            </div>
            <div class="grid grid-cols-4 gap-4">
                <img src="https://placehold.co/400x300/8d7358/ffffff?text=Villa+LDR" alt="Thumbnail 1" class="gallery-thumbnail w-full h-24 object-cover rounded-lg active" data-image="https://placehold.co/1200x800/8d7358/ffffff?text=Villa+LDR">
                <img src="https://placehold.co/400x300/a7c4a0/ffffff?text=Area+Santai" alt="Thumbnail 2" class="gallery-thumbnail w-full h-24 object-cover rounded-lg" data-image="https://placehold.co/1200x800/a7c4a0/ffffff?text=Area+Santai">
                <img src="https://placehold.co/400x300/a9d2d5/ffffff?text=Kolam+Renang" alt="Thumbnail 3" class="gallery-thumbnail w-full h-24 object-cover rounded-lg" data-image="https://placehold.co/1200x800/a9d2d5/ffffff?text=Kolam+Renang">
                <img src="https://placehold.co/400x300/d5b59d/ffffff?text=Interior" alt="Thumbnail 4" class="gallery-thumbnail w-full h-24 object-cover rounded-lg" data-image="https://placehold.co/1200x800/d5b59d/ffffff?text=Interior">
            </div>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-8">
            
            <div class="lg:col-span-2">
                <div class="bg-white p-6 rounded-2xl border shadow-sm mb-6">
                    <div class="flex flex-col md:flex-row justify-between items-start">
                        <div>
                            <span class="inline-block bg-green-100 text-green-800 text-sm font-semibold px-3 py-1 rounded-full mb-2">Tempat Wisata</span>
                            <h1 class="text-3xl md:text-4xl font-bold">Villa LDR</h1>
                            <div class="flex items-center mt-2 text-sm text-gray-500">
                                <div class="flex text-yellow-400 mr-2">★★★★★</div>
                                <span>5/5 (128 ulasan)</span>
                            </div>
                        </div>
                        <div class="mt-4 md:mt-0 md:text-right">
                             <p class="text-2xl font-bold text-green-600">Rp 150.000/malam</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border shadow-sm mb-6">
                    <h2 class="text-2xl font-bold mb-4">Deskripsi</h2>
                    <p class="text-gray-600 leading-relaxed">
                        Villa LDR menawarkan pengalaman menginap yang tak terlupakan di tengah keindahan alam Kemiling. Dengan arsitektur tradisional yang memadukan kearifan lokal dan fasilitas modern, villa ini menjadi pilihan sempurna untuk liburan keluarga atau retreat romantis. Dikelilingi oleh pemandangan hijau yang asri dan udara segar pegunungan, villa LDR memberikan ketenangan yang sulit ditemukan di tengah hiruk pikuk kota. Fasilitas lengkap termasuk kolam renang, taman yang indah, dan area BBQ untuk pengalaman yang lebih berkesan.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-2xl border shadow-sm mb-6">
                    <h2 class="text-2xl font-bold mb-4">Fasilitas</h2>
                    <div class="grid grid-cols-2 gap-4 text-gray-700">
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Wi-Fi Gratis</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Kolam Renang</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Parkir Gratis</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Area BBQ</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Taman</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> AC</div>
                        <div class="flex items-center"><i data-lucide="check" class="w-5 h-5 mr-2 text-green-500"></i> Kamar Mandi Dalam</div>
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
                                    <p class="text-gray-600">Tempat yang sangat indah dan nyaman! Pemandangannya luar biasa dan fasilitasnya lengkap. Staff yang ramah dan pelayanan yang memuaskan. Sangat direkomendasikan untuk liburan keluarga.</p>
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
                                     <p class="text-gray-600">Lokasi strategis dan mudah diakses. Tempat bersih dan terawat dengan baik. Hanya saja parkiran agak terbatas saat weekend. Overall pengalaman yang menyenangkan.</p>
                                 </div>
                            </div>
                         </div>
                         <div>
                            <div class="flex items-start">
                                 <img src="https://i.pravatar.cc/40?u=maya" alt="Maya Putri" class="w-10 h-10 rounded-full mr-4">
                                 <div>
                                     <div class="flex items-center justify-between">
                                         <h4 class="font-bold">Maya Putri</h4>
                                         <span class="text-xs text-gray-500">10 Januari 2024</span>
                                     </div>
                                     <div class="flex items-center my-1 text-yellow-400">★★★★★ <span class="text-gray-500 ml-2 text-sm">(5/5)</span></div>
                                     <p class="text-gray-600">Spot foto yang keren banget! Instagram-worthy sekali. Cocok untuk yang suka fotografi. Tempatnya juga tidak terlalu ramai jadi bisa foto dengan leluasa.</p>
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
                    <ul class="space-y-3 text-gray-700">
                        <li class="flex items-start"><i data-lucide="clock" class="w-5 h-5 mr-3 mt-1 flex-shrink-0 text-gray-500"></i><div><span class="font-semibold">Jam Buka</span><br>24 Jam</div></li>
                        <li class="flex items-start"><i data-lucide="phone" class="w-5 h-5 mr-3 mt-1 flex-shrink-0 text-gray-500"></i><div><span class="font-semibold">Telepon</span><br>+62 812 3456 7890</div></li>
                        <li class="flex items-start"><i data-lucide="mail" class="w-5 h-5 mr-3 mt-1 flex-shrink-0 text-gray-500"></i><div><span class="font-semibold">Email</span><br>info@villaldr.com</div></li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-2xl border shadow-sm">
                    <h2 class="text-2xl font-bold mb-4">Lokasi</h2>
                    <p class="text-gray-600 mb-4">Jl. Kemiling Permai No. 45, Kemiling, Bandar Lampung</p>
                    <div class="w-full h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                        <p class="text-gray-500 text-center text-sm p-4">Google Maps Platform rejected your request. The provided API key is invalid.</p>
                    </div>
                    <button class="w-full mt-4 btn bg-blue-600 text-white hover:bg-blue-700">Petunjuk Arah</button>
                </div>
            </div>
        </div>
        @endsection