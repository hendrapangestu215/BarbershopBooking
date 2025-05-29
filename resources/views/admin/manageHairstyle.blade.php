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
            <!-- Header section -->
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h3 class="text-xl text-white font-bold">All Hairstyle</h3>
                    <p class="text-white">Manage hairstyles for customers</p>
                </div>
                <button id="addHairstyleBtn" type="button"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 active:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    + Add New Hairstyle
                </button>
            </div>

            <!-- Hairstyle grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($hairstyles as $hairstyle)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
                        <div class="p-4">
                            <div
                                class="mb-4 h-48 bg-gray-300 rounded-md flex items-center justify-center overflow-hidden">
                                @if ($hairstyle->image)
                                    <img src="{{ asset('storage/' . $hairstyle->image) }}" alt="{{ $hairstyle->name }}"
                                        class="w-full h-full object-cover">
                                @else
                                    <div class="text-gray-500 text-center">No Image</div>
                                @endif
                            </div>
                            <h3 class="text-lg text-white font-bold">{{ $hairstyle->name }}</h3>
                            <div class="flex items-center mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $hairstyle->rating)
                                        <svg class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    @endif
                                @endfor
                                <span class="ml-1 text-sm text-white">{{ $hairstyle->rating }}</span>
                            </div>
                            <p class="text-sm text-white mb-3">
                                {{ Str::limit($hairstyle->description, 100) }}</p>
                            <div class="flex space-x-2">
                                <button type="button" data-hairstyle-id="{{ $hairstyle->id }}"
                                    class="edit-hairstyle-btn px-3 py-1 bg-blue-100 text-blue-600 rounded-md hover:bg-blue-200 transition">
                                    Edit
                                </button>
                                <button type="button" data-hairstyle-id="{{ $hairstyle->id }}"
                                    class="delete-hairstyle-btn px-3 py-1 bg-red-100 text-red-600 rounded-md hover:bg-red-200 transition">
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
                <div class="flex justify-between items-center p-4 border-b dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Hairstyle</h3>
                    <button type="button" class="close-modal text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form id="addHairstyleForm" action="{{ route('admin.hairstyle.store') }}" method="POST"
                    enctype="multipart/form-data" class="p-4">
                    @csrf
                    <div class="mb-4">
                        <label for="add_name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hairstyle
                            Name</label>
                        <input type="text" name="name" id="add_name"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="add_description"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                        <textarea name="description" id="add_description" rows="3"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="add_rating"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Popularity Rating
                            (1-5)</label>
                        <input type="number" name="rating" id="add_rating" min="1" max="5"
                            step="0.1"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
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
                                    class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer">
                                    Upload Image
                                </label>
                                <input type="file" name="image" id="add_image" accept="image/*" class="hidden"
                                    required>
                                <p class="text-xs text-gray-500 mt-1">Recommended size: 600x600 pixels</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-3 border-t dark:border-gray-700">
                        <button type="button"
                            class="close-modal px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Create Hairstyle
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Hairstyle Modal -->
    <div id="editHairstyleModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="editModalBackdrop"></div>

            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-md mx-auto z-50 overflow-hidden">
                <div class="flex justify-between items-center p-4 border-b dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Hairstyle</h3>
                    <button type="button" class="close-modal text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form id="editHairstyleForm" action="" method="POST" enctype="multipart/form-data"
                    class="p-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_hairstyle_id" name="id">

                    <div class="mb-4">
                        <label for="edit_name"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Hairstyle
                            Name</label>
                        <input type="text" name="name" id="edit_name"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="edit_description"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                        <textarea name="description" id="edit_description" rows="3"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="edit_rating"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Popularity Rating
                            (1-5)</label>
                        <input type="number" name="rating" id="edit_rating" min="1" max="5"
                            step="0.1"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Image</label>
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-24 h-24 bg-gray-200 dark:bg-gray-700 rounded flex items-center justify-center overflow-hidden">
                                <img id="edit_image_preview" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <label for="edit_image"
                                    class="inline-flex items-center px-3 py-2 border border-gray-300 dark:border-gray-600 shadow-sm text-sm font-medium rounded-md text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 cursor-pointer">
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
                            class="close-modal px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteHairstyleModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="deleteModalBackdrop"></div>

            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-sm mx-auto z-50 overflow-hidden">
                <div class="p-4">
                    <div class="flex items-center justify-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                    </div>

                    <h3 class="text-center text-lg font-medium text-gray-900 dark:text-white mb-2">Delete Hairstyle
                    </h3>
                    <p class="text-center text-gray-500 dark:text-gray-400 mb-6">Are you sure you want to delete this
                        hairstyle? This action cannot be undone.</p>

                    <form id="deleteHairstyleForm" action="" method="POST"
                        class="flex justify-center space-x-3">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            class="close-modal px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-red-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
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
                        fetch(`/admin/hairstyle/${hairstyleId}/edit`)
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
                                editHairstyleForm.action = `/admin/hairstyle/${data.id}`;

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
                        deleteHairstyleForm.action = `/admin/hairstyle/${hairstyleId}`;
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
