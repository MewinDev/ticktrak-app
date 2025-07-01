<!-- Group Photo -->
<section class="section-card bg-gray-50 dark:bg-gray-800 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
    <div class="flex items-center mb-6">
        <div class="bg-green-100 dark:bg-green-900 p-2 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">Group Photo</h2>
    </div>

    <div class="flex flex-col md:flex-row md:items-start">
        <div class="mb-4 md:mb-0 md:mr-6">
            <div
                class="h-32 w-32 rounded-lg bg-gray-200 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-500"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
        </div>

        <div class="flex-1">
            <p class="text-base text-gray-700 dark:text-gray-200 mb-2">Your group photo helps members recognize your
                group at a glance.
                A good group photo clearly represents what your group is about.</p>

            <div class="md:w-1/2">
                <x-forms.file-input color="gray" label="picture" name="picture" id="picture" type="file"
                    accept=".jpg,.jpeg,.png" placeholder="picture" extraClass="text-lg" />
            </div>

            <p class="mt-2 text-sm text-gray-500 dark:text-gray-300"><strong>Recommended:</strong> Square image, at
                least 512x512
                pixels. SVG, JPG or PNG. Max size of 2MB.</p>
            <div class="space-y-2 space-x-2">
                <x-forms.button type="submit" color="blue" size="md">
                    Upload Photo
                </x-forms.button>
                <x-forms.button type="submit" color="red" size="md" extraClass="dark:bg-opacity-60">
                    Remove Photo
                </x-forms.button>
            </div>

            <p class="text-sm text-gray-500 dark:text-gray-400 mt-4"</p>
        </div>
    </div>
</section>

<script>
    document.getElementById('picture').addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                document.getElementById('picturePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
