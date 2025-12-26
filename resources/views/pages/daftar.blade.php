@extends('layout.app')

@section('title', 'Daftar - ')

@section('content')

<div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto max-w-6xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden md:grid md:grid-cols-2">
            
            <div class="hidden md:block">
                <img class="w-full h-full object-cover" src="https://placehold.co/800x1000/b8d8a2/ffffff?text=Bergabunglah+Bersama+Kami" alt="Pemandangan Hijau Kemiling">
            </div>

            <div class="p-8 md:p-12 lg:p-16">
                <div class="w-full max-w-md mx-auto">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 text-center">
                            Buat Akun Baru
                        </h2>
                        <p class="mt-2 text-center text-sm text-gray-600">
                            Mulai petualangan Anda di Kemiling hari ini.
                        </p>
                    </div>
    
                    <form class="mt-8 space-y-4" action="{{ route('daftar') }}" method="POST">
                        @csrf

                        <div>
                            <label for="name" class="sr-only">Nama Lengkap</label>
                            <input id="name" name="name" type="text" autocomplete="name" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Nama Lengkap" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email-address" class="sr-only">Alamat Email</label>
                            <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Alamat Email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                         <div>
                            <label for="phone-number" class="sr-only">Nomor Telepon</label>
                            <input id="phone-number" name="phone" type="tel" autocomplete="tel" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Nomor Telepon" value="{{ old('phone') }}">
                             @error('phone')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Password">
                             @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                         <div>
                            <label for="password-confirmation" class="sr-only">Konfirmasi Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="appearance-none relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm" placeholder="Konfirmasi Password">
                        </div>
    
                        <div class="pt-2">
                            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Daftar
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun?
                            <a href="{{ url('/login') }}" class="font-medium text-green-600 hover:text-green-500">
                                Login di sini
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
