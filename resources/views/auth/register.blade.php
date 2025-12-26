@extends('layouts.app')
@section('title', 'Daftar - ')
@section('content')

    <div class="container mx-auto max-w-6xl my-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden md:grid md:grid-cols-2">
            
            <div class="hidden md:block">
                <img class="w-full h-full object-cover" src="images/kemiling-daftar.png?text=Bergabunglah+Bersama+Kami" alt="Pemandangan Hijau Kemiling">
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

                    <form method="POST" action="{{ route('register') }}" class="mt-8 space-y-4">
                        @csrf

                        <div>
                            <label for="name" class="sr-only">Nama Lengkap</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nama Lengkap"
                                   class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <label for="username" class="sr-only">Username</label>
                            <input id="username" name="username" type="text" value="{{ old('username') }}" required autocomplete="username" placeholder="Username"
                                   class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>

                        <div>
                            <label for="email" class="sr-only">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"
                                   class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" required autocomplete="new-password" placeholder="Password"
                                   class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <label for="password_confirmation" class="sr-only">Konfirmasi Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" placeholder="Konfirmasi Password"
                                   class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
    
                        <div class="pt-2">
                            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-semibold text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                                Daftar
                            </button>                                       
                        </div>

                        <a href="{{ route('google.redirect') }}"
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-full border border-gray-300 hover:bg-gray-50">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5" alt="">
                        <span>Masuk dengan Google</span>
                        </a>
                    </form>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="font-medium text-green-600 hover:text-green-500 underline">
                                Login di sini
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

