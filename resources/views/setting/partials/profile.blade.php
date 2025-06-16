<div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-600 p-5 rounded-md">
    <header>
        <h2 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-50">Profile Picture</h2>
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Upload a profile picture for the candidate.</p>
    </header>

    <form method="post" action="{{ route('setting.updateProfile') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex flex-col md:flex-col lg:flex-row items-start gap-5 mt-3">
            <img id="profilePreview"
                src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('images/logo.png') }}"
                alt="candidate-profile"
                class="w-28 h-28 object-cover rounded-md border border-gray-300 dark:border-gray-600" />

            <div class="w-full">
                <x-forms.file-input color="gray" label="Profile" name="profile" id="profile" type="file"
                    accept=".jpg,.jpeg,.png" placeholder="Profile" />

                <p class="mt-2 text-sm text-gray-500 dark:text-gray-300">SVG, JPG or PNG. Max size of 2MB.</p>

                <x-forms.input-error :messages="$errors->get('profile')" class="mt-2" />

                <div class="flex items-center gap-3 mt-4">
                    <x-forms.button type="submit" extraClass="whitespace-nowrap">
                        {{ __('Save Profile') }}
                    </x-forms.button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    document.getElementById('profile').addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('profilePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
