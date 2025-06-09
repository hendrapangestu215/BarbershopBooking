<x-app-layout>
    <x-slot name="title">
        {{ __('Manage Hairstyle') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Hairstyle') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success message -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 dark:bg-green-800 dark:border-green-700 dark:text-green-300 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Header section -->
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h3 class="text-xl text-gray-900 dark:text-gray-100 font-bold">All Hairstyle</h3>
                    <p class="text-gray-500 dark:text-gray-400">Manage hairstyles for customers</p>
                </div>
                <button id="addHairstyleBtn" type="button"
                    class="bg-black dark:bg-white text-white dark:text-black px-4 py-2 rounded hover:bg-gray-800 dark:hover:bg-gray-200">
                    + Add New Hairstyle
                </button>
            </div>

            <!-- Hairstyle grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($hairstyles as $hairstyle)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                        <div class="p-4">
                            <div
                                class="mb-4 h-48 bg-gray-300 dark:bg-gray-700 rounded-md flex items-center justify-center overflow-hidden">
                                @if ($hairstyle->image)
                                    <img src="{{ asset('storage/' . $hairstyle->image) }}" alt="{{ $hairstyle->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="text-gray-500 dark:text-gray-400 text-center">No Image</div>
                                @endif
                            </div>
                            <h3 class="text-lg text-gray-900 dark:text-gray-100 font-bold">{{ $hairstyle->name }}</h3>
                            <div class="flex items-center mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $hairstyle->rating)
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-300 dark:text-gray-600 fill-current"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    @endif
                                @endfor
                                <span
                                    class="ml-1 text-sm text-gray-700 dark:text-gray-300">{{ $hairstyle->rating }}</span>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                                {{ Str::limit($hairstyle->description, 100) }}</p>
                            <div class="flex space-x-2">
                                <button type="button" data-hairstyle-id="{{ $hairstyle->id }}"
                                    class="edit-hairstyle-btn text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md hover:bg-blue-100 dark:hover:bg-opacity-20 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd"
                                            d="M2 15.25V18h2.75l8.172-8.172-2.75-2.75L2 15.25zM4.414 17H3v-1.414l7.586-7.586 1.414 1.414L4.414 17z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Edit
                                </button>
                                <button type="button" data-hairstyle-id="{{ $hairstyle->id }}"
                                    class="delete-hairstyle-btn text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md hover:bg-red-100 dark:hover:bg-opacity-20 flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                                    </svg>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Add Hairstyle Modal -->
    <div id="addHairstyleModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="addModalBackdrop"></div>

            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-md mx-auto z-50 overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Hairstyle</h3>
                        <button type="button"
                            class="close-modal text-gray-400 hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-6">Create a new hairstyle for your barbershop
                    </p>

                    <form id="addHairstyleForm" action="{{ route('admin.hairstyle.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="add_name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hairstyle
                                Name</label>
                            <input type="text" name="name" id="add_name"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="add_description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                            <textarea name="description" id="add_description" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="add_rating"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Popularity
                                Rating
                                (1-5)</label>
                            <input type="number" name="rating" id="add_rating" min="1" max="5"
                                step="0.1"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image</label>
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-24 h-24 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center overflow-hidden">
                                    <img id="add_image_preview" class="hidden w-full h-full object-cover">
                                    <svg id="add_image_placeholder" class="w-8 h-8 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <label for="add_image"
                                        class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                        Upload Image
                                    </label>
                                    <input type="file" name="image" id="add_image" accept="image/*"
                                        class="hidden" required>
                                    <p class="text-xs text-gray-500 mt-1">Recommended size: 600x600 pixels</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 pt-3 border-t dark:border-gray-700">
                            <button type="button"
                                class="close-modal px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-black dark:bg-white text-white dark:text-black rounded-md hover:bg-gray-800 dark:hover:bg-gray-200">
                                Create Hairstyle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Hairstyle Modal -->
    <div id="editHairstyleModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="editModalBackdrop"></div>

            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-md mx-auto z-50 overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Hairstyle</h3>
                        <button type="button"
                            class="close-modal text-gray-400 hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-100">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form id="editHairstyleForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_hairstyle_id" name="id">

                        <div class="mb-4">
                            <label for="edit_name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hairstyle
                                Name</label>
                            <input type="text" name="name" id="edit_name"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="edit_description"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                            <textarea name="description" id="edit_description" rows="3"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="edit_rating"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Popularity
                                Rating
                                (1-5)</label>
                            <input type="number" name="rating" id="edit_rating" min="1" max="5"
                                step="0.1"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                                required>
                        </div>

                        <div class="mb-4">
                            <label
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image</label>
                            <div class="flex items-center space-x-4">
                                <div
                                    class="w-24 h-24 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center overflow-hidden">
                                    <img id="edit_image_preview" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <label for="edit_image"
                                        class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                        Change Image
                                    </label>
                                    <input type="file" name="image" id="edit_image" accept="image/*"
                                        class="hidden">
                                    <p class="text-xs text-gray-500 mt-1">Recommended size: 600x600 pixels</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 pt-3 border-t dark:border-gray-700">
                            <button type="button"
                                class="close-modal px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-black dark:bg-white text-white dark:text-black rounded-md hover:bg-gray-800 dark:hover:bg-gray-200">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteHairstyleModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="deleteModalBackdrop"></div>

            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-sm mx-auto z-50 overflow-hidden">
                <div class="p-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="bg-red-100 dark:bg-red-900 rounded-full p-3">
                            <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>

                    <h3 class="text-lg font-medium text-center text-gray-900 dark:text-gray-100 mb-2">Delete Hairstyle
                    </h3>
                    <p class="text-sm text-center text-gray-500 dark:text-gray-400 mb-6">Are you sure you want to
                        delete this
                        hairstyle? This action cannot be undone.</p>

                    <form id="deleteHairstyleForm" action="" method="POST"
                        class="flex justify-center space-x-3">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            class="close-modal px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Add Hairstyle Modal
                const addHairstyleBtn = document.getElementById('addHairstyleBtn');
                const addHairstyleModal = document.getElementById('addHairstyleModal');
                const addImageInput = document.getElementById('add_image');
                const addImagePreview = document.getElementById('add_image_preview');
                const addImagePlaceholder = document.getElementById('add_image_placeholder');

                // Edit Hairstyle Modal
                const editHairstyleModal = document.getElementById('editHairstyleModal');
                const editHairstyleForm = document.getElementById('editHairstyleForm');
                const editImageInput = document.getElementById('edit_image');
                const editImagePreview = document.getElementById('edit_image_preview');

                // Delete Hairstyle Modal
                const deleteHairstyleModal = document.getElementById('deleteHairstyleModal');
                const deleteHairstyleForm = document.getElementById('deleteHairstyleForm');

                // Close Modal Buttons
                const closeModalButtons = document.querySelectorAll('.close-modal');

                // Open Add Modal
                addHairstyleBtn.addEventListener('click', function() {
                    addHairstyleModal.classList.remove('hidden');
                });

                // Handle Image Preview for Add Modal
                addImageInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            addImagePreview.src = e.target.result;
                            addImagePreview.classList.remove('hidden');
                            addImagePlaceholder.classList.add('hidden');
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });

                // Open Edit Modal
                document.querySelectorAll('.edit-hairstyle-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const hairstyleId = this.dataset.hairstyleId;

                        // Fetch hairstyle data
                        fetch(`{{ url('/hairstyle') }}/${hairstyleId}/edit`)
                            .then(response => response.json())
                            .then(data => {
                                // Populate form
                                document.getElementById('edit_hairstyle_id').value = data.id;
                                document.getElementById('edit_name').value = data.name;
                                document.getElementById('edit_description').value = data
                                    .description;
                                document.getElementById('edit_rating').value = data.rating;

                                // Update image preview
                                if (data.image) {
                                    editImagePreview.src = `/storage/${data.image}`;
                                    editImagePreview.classList.remove('hidden');
                                }

                                // Update form action URL
                                editHairstyleForm.action = `{{ url('/hairstyle') }}/${data.id}`;

                                // Show modal
                                editHairstyleModal.classList.remove('hidden');
                            })
                            .catch(error => {
                                console.error('Error fetching hairstyle data:', error);
                            });
                    });
                });

                // Handle Image Preview for Edit Modal
                editImageInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            editImagePreview.src = e.target.result;
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });

                // Open Delete Modal
                document.querySelectorAll('.delete-hairstyle-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const hairstyleId = this.dataset.hairstyleId;
                        deleteHairstyleForm.action = `{{ url('/hairstyle') }}/${hairstyleId}`;
                        deleteHairstyleModal.classList.remove('hidden');
                    });
                });

                // Close Modals
                closeModalButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        addHairstyleModal.classList.add('hidden');
                        editHairstyleModal.classList.add('hidden');
                        deleteHairstyleModal.classList.add('hidden');
                    });
                });

                // Close Modal when clicking on backdrop
                document.getElementById('addModalBackdrop').addEventListener('click', function() {
                    addHairstyleModal.classList.add('hidden');
                });

                document.getElementById('editModalBackdrop').addEventListener('click', function() {
                    editHairstyleModal.classList.add('hidden');
                });

                document.getElementById('deleteModalBackdrop').addEventListener('click', function() {
                    deleteHairstyleModal.classList.add('hidden');
                });
            });
        </script>
    @endpush
</x-app-layout>
