<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            Hapus Akun
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            Setelah akun Anda dihapus, semua data akan dihapus secara permanen. Sebelum menghapus, harap unduh data apa pun yang ingin Anda simpan.
        </p>
    </header>

    <button
        id="open-delete-modal-button"
        class="text-sm text-white hover:text-white underline rounded-full border border-transparent bg-red-600 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white-500 rounded-md"
    >Hapus Akun</button>

    <div
        id="confirm-user-deletion-modal"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden">
        <div id="delete-modal-overlay" class="fixed inset-0 bg-black/50"></div>

        <div class="relative w-full max-w-lg bg-white rounded-2xl shadow-xl transition-all duration-300 transform opacity-0 scale-95">
            <form method="post" action="{{ route('profile.destroy') }}" class="p-8">
                @csrf
                @method('delete')

                <div class="text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                        <i data-lucide="alert-triangle" class="h-6 w-6 text-red-600"></i>
                    </div>
                    <h2 class="mt-4 text-2xl font-bold text-gray-900">
                        Hapus Akun?
                    </h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Aksi ini tidak dapat dibatalkan. Mohon masukkan password Anda untuk mengonfirmasi.
                    </p>
                </div>

                <div class="mt-6">
                    <label for="password" class="sr-only">Password</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-full appearance-none rounded-md border border-gray-300 px-3 py-3 placeholder-gray-500 shadow-sm focus:border-green-500 focus:outline-none focus:ring-green-500 sm:text-sm"
                        placeholder="Masukkan password Anda"
                    />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <button type="button" id="cancel-delete-button" class="inline-flex justify-center rounded-full border-2 border-gray-300 bg-white px-4 py-3 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Batal
                    </button>
                    <button type="submit" class="inline-flex justify-center rounded-full border border-transparent bg-red-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Ya, Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openButton = document.getElementById('open-delete-modal-button');
        const modal = document.getElementById('confirm-user-deletion-modal');
        const overlay = document.getElementById('delete-modal-overlay');
        const cancelButton = document.getElementById('cancel-delete-button');
        const modalPanel = modal.querySelector('div.relative'); 

        const openModal = () => {
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalPanel.classList.remove('opacity-0', 'scale-95');
                modalPanel.classList.add('opacity-100', 'scale-100');
            }, 10); 
        };

        const closeModal = () => {
            modalPanel.classList.remove('opacity-100', 'scale-100');
            modalPanel.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); 
        };

        if (openButton) {
            openButton.addEventListener('click', openModal);
        }
        if (overlay) {
            overlay.addEventListener('click', closeModal);
        }
        if (cancelButton) {
            cancelButton.addEventListener('click', closeModal);
        }
        
        @if($errors->userDeletion->isNotEmpty())
            openModal();
        @endif
    });
</script>

