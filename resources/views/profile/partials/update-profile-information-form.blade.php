<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Informasi Profil
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Perbarui informasi profil dan alamat email akun Anda.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <label class="block text-center text-sm font-medium text-gray-700 mb-2">Foto Profil</label>
            <div class="flex flex-col items-center space-y-4">
                <img class="h-40 w-40 rounded-full object-cover bg-gray-100 ring-4 ring-white shadow-lg" 
                     id="photo-preview"
                     src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}" 
                     alt="{{ Auth::user()->name }}">
                
                <div>
                    <label for="profile_photo" class="cursor-pointer inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-full font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Ubah Foto
                    </label>
                    <input id="profile_photo" name="profile_photo" type="file" class="hidden" onchange="previewImage(event)">
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
            </div>
        </div>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        
        <div>
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input id="username" name="username" type="text" class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm" value="{{ old('username', $user->username) }}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">No. HP</label>
            <input id="phone" name="phone" type="text" class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm" value="{{ old('phone', $user->phone) }}" required autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm" value="{{ old('email', $user->email) }}" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-yellow-800">
                        Alamat email Anda belum terverifikasi.
                        
                        <button form="send-verification" type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 ml-1">
                            Kirim ulang email verifikasi.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            Tautan verifikasi baru telah dikirimkan ke alamat email Anda.
                        </p>
                    @endif
                </div>
            @else
                 <div class="mt-2 flex items-center gap-x-2">
                    <span class="inline-block h-2 w-2 rounded-full bg-green-500"></span>
                    <p class="text-sm text-gray-600">Email terverifikasi.</p>
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 mt-2">
            <button type="submit" class="inline-flex justify-center rounded-full border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Simpan Perubahan</button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">Tersimpan.</p>
            @endif
        </div>
    </form>
    
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('photo-preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</section>
