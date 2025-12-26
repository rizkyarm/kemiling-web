@extends('layouts.app')
@section('title', 'Login - ')
@section('content')
    
    <div class="container mx-auto max-w-6xl my-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden md:grid md:grid-cols-2">
            
            <div class="hidden md:block">
                <img class="w-full h-full object-cover" src="images/kemiling-daftar.png?text=Selamat+Datang" alt="Pemandangan Kemiling">
            </div>

            <div class="p-8 md:p-12 lg:p-16">
                <div class="w-full max-w-md mx-auto">
                    
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 text-center">
                            Selamat Datang Kembali
                        </h2>
                        <p class="mt-2 text-center text-sm text-gray-600">
                            Masuk untuk melanjutkan petualangan Anda.
                        </p>
                    </div>

                    <x-auth-session-status class="mt-6 mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="mt-8 space-y-6">
                        @csrf

                        <div>
                            <label for="user_cred" class="sr-only">Email atau Username</label>
                            <input id="user_cred" name="user_cred" type="text" value="{{ old('user_cred') }}" required autofocus autocomplete="username" placeholder="Email atau Username"
                                   class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <x-input-error :messages="$errors->get('user_cred')" class="mt-2" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>

                        <div>
                            <label for="password" class="sr-only">Password</label>
                            <input id="password" name="password" type="password" required autocomplete="current-password" placeholder="Password"
                                   class="appearance-none block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-green-600 hover:text-green-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="{{ route('password.request') }}">
                                    {{ __('Lupa password?') }}
                                </a>
                            @endif
                        </div>
    
                        <div class="pt-2">
                            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-semibold text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all">
                                Login
                            <button>
                        </div>

                        <a href="{{ route('google.redirect') }}"
                            class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 rounded-full border border-gray-300 hover:bg-gray-50">
                            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5" alt="">
                            <span>Masuk dengan Google</span>
                        </a>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="font-medium text-green-600 hover:text-green-500">
                                Daftar di sini
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

