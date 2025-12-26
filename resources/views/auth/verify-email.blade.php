@extends('layouts.app')

@section('title', 'Verifikasi Email - ')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto max-w-xl">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="p-8 md:p-12 lg:p-16 text-center">
                
                <!-- Ikon Email -->
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-6">
                    <i data-lucide="mail-check" class="h-8 w-8 text-green-600"></i>
                </div>

                <!-- Judul dan Deskripsi -->
                <h2 class="text-2xl font-bold text-gray-900">
                    Verifikasi Alamat Email Anda
                </h2>
                <p class="mt-4 text-base text-gray-600">
                    Terima kasih telah mendaftar! Sebelum melanjutkan, bisakah Anda memverifikasi alamat email Anda dengan mengklik tautan yang baru saja kami kirimkan? Jika Anda tidak menerima email, kami akan dengan senang hati mengirimkan yang lain.
                </p>

                <!-- Status Pengiriman Ulang Email -->
                @if (session('status') == 'verification-link-sent')
                    <div class="mt-6 mb-4 font-medium text-sm text-green-600">
                        Tautan verifikasi baru telah berhasil dikirim ke alamat email yang Anda berikan saat pendaftaran.
                    </div>
                @endif

                <!-- Tombol Aksi -->
                <div class="mt-8 flex items-center justify-center space-x-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="inline-flex justify-center rounded-full border border-transparent bg-green-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all">
                            Kirim Ulang Email Verifikasi
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection