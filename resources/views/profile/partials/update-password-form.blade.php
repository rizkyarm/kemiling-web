<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Ganti Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Pastikan Password yang kamu buat Panjang dan Aman, Stay Secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password"class="block text-sm font-medium text-gray-700" >Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" type="text" class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <form method="POST" action="{{ route('profile.send-password-link') }}">
            @csrf
            <button class="btn btn-primary">Kirim link setel kata sandi ke email</button>
        </form>

        <div>
            <label for="update_password_password" class="block text-sm font-medium text-gray-700 mt-4">New Password</label>
            <input id="update_password_password" name="password" type="password" type="text" class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700" >Confirm Password </label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" type="text" class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="inline-flex justify-center rounded-full border border-transparent bg-green-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">{{ __('Save') }}</button>

            @if (session('status') === 'Password Updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
