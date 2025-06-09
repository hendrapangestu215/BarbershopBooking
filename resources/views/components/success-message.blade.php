@if (session('success'))
    <div id="successMessage" class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4">
        <div class="flex">
            <div class="py-1">
                <svg class="w-6 h-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div>
                <p class="font-bold">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
            <div class="ml-auto">
                <button type="button" onclick="document.getElementById('successMessage').remove();"
                    class="text-green-700">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif
