<footer class="bg-gray-800 text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div class="space-y-4">
                <h3 class="text-3xl font-bold">Kemiling</h3>
                <p class="text-gray-400">Portal direktori terpercaya untuk menemukan tempat wisata terbaik dan produk UMKM berkualitas di Kecamatan Kemiling.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i data-lucide="facebook"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i data-lucide="instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i data-lucide="twitter"></i></a>
                </div>
            </div>

            <div>
                <h4 class="text-xl font-semibold mb-4">Menu Utama</h4>
                <ul class="space-y-3 text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="{{ url('/kategori') }}" class="hover:text-white transition">Kategori</a></li>
                    <li><a href="{{ url('/product') }}" class="hover:text-white transition">Daftar Produk</a></li>
                    <li><a href="{{ url('/tentang') }}" class="hover:text-white transition">Tentang Kami</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="text-xl font-semibold mb-4">Kontak</h4>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-start"><i data-lucide="phone" class="w-5 h-5 mr-3 mt-1 flex-shrink-0"></i><span>+62 812 3456 7890</span></li>
                    <li class="flex items-start"><i data-lucide="mail" class="w-5 h-5 mr-3 mt-1 flex-shrink-0"></i><span>info@kemiling.com</span></li>
                    <li class="flex items-start"><i data-lucide="map-pin" class="w-5 h-5 mr-3 mt-1 flex-shrink-0"></i><span>Kecamatan Kemiling, Bandar Lampung</span></li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-700 pt-8 mt-8 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
            <p>&copy; 2024 Kemiling Directory. Semua hak cipta dilindungi.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-white">Kebijakan Privasi</a>
                <a href="#" class="hover:text-white">Syarat Layanan</a>
            </div>
        </div>
    </div>
</footer>
