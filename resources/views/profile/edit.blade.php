@extends('layouts.app')

@section('title', 'Profil Saya - ')

@section('content')
    <div class="bg-white">
        <div class="container mx-auto max-w-4xl py-12 px-4 sm:px-6 lg:px-8">
            <header class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    Pengaturan Profil
                </h1>
                <p class="mt-1 text-sm text-gray-600">
                    Kelola informasi akun, password, dan pengaturan privasi Anda.
                </p>
            </header>

            <div class="space-y-8">
                <div class="p-4 sm:p-8 border border-gray-200 rounded-2xl">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="p-4 sm:p-8 border border-gray-200 rounded-2xl">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="p-4 sm:p-8 border border-gray-200 rounded-2xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection

