<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') Kemiling </title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta name="gmaps-api-key" content="{{ config('services.google.maps_api_key') }}">


</head>

<body>
    @include('components.header')
    <div id="nav-overlay" class="nav-overlay"></div>
    <div id="mobile-menu" class="mobile-nav">
    <div class="flex flex-col gap-6">
        <a href="{{ url('/') }}" class="text-2xl font-bold brand-text">Kemiling</a>
        <nav class="flex flex-col gap-3 text-lg">
            <a href="{{ url('/') }}" class="text-gray-700 hover:text-green-600">Beranda</a>
            <a href="{{ url('/kategori') }}" class="text-gray-700 hover:text-green-600">Kategori</a>
            <a href="{{ url('/product') }}" class="text-gray-700 hover:text-green-600">Daftar Produk</a>
            <a href="{{ url('/tentang') }}" class="text-gray-700 hover:text-green-600">Tentang Kami</a>
        </nav>
    </div>  
        <div class="mt-auto border-t pt-6">
            @guest
                <div class="flex flex-col space-y-4">
                    <a href="{{ route('login') }}" class="text-center font-semibold text-gray-600 hover:text-green-600 transition py-3 px-6 border border-gray-300 rounded-full">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                </div>
            @endguest
            @auth
                <div class="flex items-center space-x-4">
                    <a href="{{ route('profile.edit') }}">
                        <img class="h-12 w-12 rounded-full object-cover"
                             src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}"
                             alt="{{ Auth::user()->name }}">
                    </a>
                    <div>
                        <a href="{{ route('profile.edit') }}" class="font-bold text-gray-800">{{ Auth::user()->name }}</a>
                        <form method="POST" action="{{ route('logout') }}" class="mt-1">
                            @csrf
                            <button type="submit" class="text-sm text-red-500 hover:underline">Logout</button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
    
    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script src="{{ asset('assets/script.js') }}"></script>
    @stack('scripts')
</body>
</html>