<header class="header">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <a href="{{ route('home') }}" class="text-3xl font-bold brand-text shrink-0">Kemiling</a>
            
            <nav class="hidden md:flex items-center gap-8">
                <a href="{{ route('home') }}" class="ml-8 {{ request()->is('/') || request()->is('home') ? 'text-green-600 font-semibold' : 'text-gray-600' }} hover:text-green-600 transition">Beranda</a>
                <a href="{{ url('/kategori') }}" class="{{ request()->is('kategori*') ? 'text-green-600 font-semibold' : 'text-gray-600' }} hover:text-green-600 transition">Kategori</a>
                <a href="{{ url('/product') }}" class="{{ request()->is('product*') ? 'text-green-600 font-semibold' : 'text-gray-600' }} hover:text-green-600 transition">Daftar Produk</a>
                <a href="{{ url('/tentang') }}" class="{{ request()->is('tentang*') ? 'text-green-600 font-semibold' : 'text-gray-600' }} hover:text-green-600 transition">Tentang Kami</a>
            </nav>


            <div class="hidden md:flex items-center space-x-3">
                @guest
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-green-600 transition">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endguest

                @auth
                    <a href="{{route('add-product')}}" class="inline-flex items-center px-4 py-2 bg-green-50 text-green-700 border border-green-200 rounded-full font-semibold text-xs hover:bg-green-100 transition ease-in-out duration-150">
                        <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                        Tambah Produk
                    </a>

                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = ! open" class="flex items-center transition ease-in-out duration-150 focus:outline-none">
                            @php
                                $photoPath = Auth::user()->profile_photo_path;
                                $thumbSrc = 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random'; // Default avatar
                                
                                if ($photoPath) {
                                    $fileName = basename($photoPath); 
                                    $thumbPath = 'profile-photos/thumb/' . $fileName;
                                    $thumbSrc = asset('storage/' . $thumbPath);
                                }
                            @endphp
                            
                            <img class="h-10 w-10 rounded-full object-cover" 
                                 src="{{ $thumbSrc }}" 
                                 alt="{{ Auth::user()->name }}">
                        </button>

                        <div x-show="open"
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute z-50 mt-2 w-64 rounded-md shadow-lg origin-top-right right-0"
                             style="display: none;">
                            
                            <div class="rounded-md ring-1 ring-black ring-opacity-5 bg-white">
                                <div class="px-4 py-3 border-b border-gray-200">
                                    <p class="text-sm font-semibold text-gray-800">Halo, {{ Auth::user()->name }}</p>
                                    <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</p>
                                </div>
                                <div class="py-1">
                                    <a href="{{ route('profile.edit') }}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Profil Saya
                                    </a>
                                    <a href="{{route('my-products')}}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Produk Saya
                                    </a>
                                    <a href="{{route('add-product')}}" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                        Tambah Produk
                                    </a>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); this.closest('form').submit();"
                                           class="block w-full px-4 py-2 text-start text-sm leading-5 text-red-600 hover:bg-red-50 focus:outline-none focus:bg-red-50 transition duration-150 ease-in-out">
                                            Logout
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            <button id="mobile-menu-button" class="md:hidden z-[101]">
                <i data-lucide="menu" class="text-gray-800"></i>
            </button>
        </div>
    </div>
</header>

