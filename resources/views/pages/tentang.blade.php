@extends('layouts.app')
@section('title', 'Tentang | ')
@section('content')
        <section class="bg-white">
            <div class="container mx-auto px-4 py-16 md:py-24 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang Kemiling Directory</h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Misi kami adalah menjadi jembatan digital yang menghubungkan pesona wisata dan kekayaan produk UMKM Kecamatan Kemiling kepada dunia.</p>
            </div>
        </section>

        <section class="container mx-auto px-4 py-16">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://placehold.co/600x400/a7c4a0/ffffff?text=Tim+Kemiling" alt="Tim Kemiling" class="rounded-2xl shadow-lg w-full">
                </div>
                <div class="space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold mb-3">Visi Kami</h2>
                        <p class="text-gray-600 leading-relaxed">Menjadi portal direktori utama yang terpercaya dan terlengkap untuk mempromosikan serta mengangkat potensi ekonomi kreatif dan pariwisata di Kecamatan Kemiling.</p>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold mb-3">Misi Kami</h2>
                        <ul class="list-disc list-inside space-y-2 text-gray-600">
                            <li>Memberikan informasi yang akurat dan menarik tentang destinasi wisata.</li>
                            <li>Menyediakan platform bagi UMKM lokal untuk memperluas jangkauan pasar.</li>
                            <li>Mendorong pertumbuhan ekonomi lokal melalui teknologi digital.</li>
                            <li>Membangun komunitas yang peduli dan mendukung produk lokal.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white py-16">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold">Kenapa Memilih Platform Kami?</h2>
                    <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Kami berdedikasi untuk memberikan yang terbaik bagi pengguna dan para pelaku usaha di Kemiling.</p>
                </div>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="text-center p-6">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mx-auto mb-4">
                            <i data-lucide="sparkles" class="w-8 h-8 text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Informasi Terkurasi</h3>
                        <p class="text-gray-600">Setiap tempat dan produk telah kami verifikasi untuk memastikan kualitas dan keakuratan informasi.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mx-auto mb-4">
                            <i data-lucide="heart-handshake" class="w-8 h-8 text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Mendukung Ekonomi Lokal</h3>
                        <p class="text-gray-600">Dengan menggunakan platform kami, Anda secara langsung membantu pertumbuhan UMKM dan pariwisata lokal.</p>
                    </div>
                    <div class="text-center p-6">
                        <div class="flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mx-auto mb-4">
                            <i data-lucide="mouse-pointer-click" class="w-8 h-8 text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Mudah Digunakan</h3>
                        <p class="text-gray-600">Tampilan yang intuitif dan ramah pengguna memudahkan Anda menemukan apa yang Anda cari dengan cepat.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="container mx-auto px-4 py-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold">Tim di Balik Layar</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Kami adalah sekelompok individu yang bersemangat untuk memajukan Kemiling.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white rounded-2xl border overflow-hidden text-center team-card">
                    <img src="https://i.pravatar.cc/300?u=adi" alt="Adi Saputra" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg">Adi Saputra</h3>
                        <p class="text-green-600">Founder & CEO</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border overflow-hidden text-center team-card">
                    <img src="https://i.pravatar.cc/300?u=citra" alt="Citra Lestari" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg">Citra Lestari</h3>
                        <p class="text-green-600">Head of Marketing</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl border overflow-hidden text-center team-card">
                    <img src="https://i.pravatar.cc/300?u=bima" alt="Bima Eka" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg">Bima Eka</h3>
                        <p class="text-green-600">Lead Developer</p>
                    </div>
                </div>
                 <div class="bg-white rounded-2xl border overflow-hidden text-center team-card">
                    <img src="https://i.pravatar.cc/300?u=dewi" alt="Dewi Anggraini" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-lg">Dewi Anggraini</h3>
                        <p class="text-green-600">Community Manager</p>
                    </div>
                </div>
            </div>
        </section>
@endsection