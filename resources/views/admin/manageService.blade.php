<x-app-layout>
    <x-slot name="title">
        {{ __('Manage Service') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Service') }}
        </h2>
    </x-slot>

    <body class="bg-gray-100 dark:bg-gray-900 p-6">
        <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <!-- Success message -->
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 dark:bg-green-800 dark:border-green-700 dark:text-green-300 px-4 py-3 rounded relative"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Services</h1>
                    <p class="text-gray-500 dark:text-gray-400 text-sm">Manage barber services for customers</p>
                </div>
                <button id="addServiceBtn"
                    class="bg-black dark:bg-white text-white dark:text-black px-4 py-2 rounded hover:bg-gray-800 dark:hover:bg-gray-200">+
                    Add New Service</button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-300/50 dark:border-gray-700/50 text-left p-6">
                    <tr>
                        <th colspan="5" class="text-xl font-bold pl-2 py-2 text-gray-900 dark:text-gray-100">All
                            Services</th>
                    </tr>
                    <tbody class="text-sm">
                        <tr class="border-b text-gray-500 dark:text-gray-400">
                            <th class="py-2 text-center w-64">NAME</th>
                            <th class="py-2 text-center w-40">PRICE</th>
                            <th class="py-2 text-center w-80">DESCRIPTION</th>
                            <th class="py-2 text-center w-40">FEATURED</th>
                            <th class="py-2 text-center w-64">ACTIONS</th>
                        </tr>

                        @forelse($services as $service)
                            <tr
                                class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 text-sm pl-2">
                                <td class="py-3 pl-2 text-center text-gray-900 dark:text-gray-100">{{ $service->name }}
                                </td>
                                <td class="text-center text-gray-900 dark:text-gray-100">${{ $service->price }}</td>
                                <td class="text-center text-gray-900 dark:text-gray-100">{{ $service->description }}
                                </td>
                                <td class="text-center text-gray-900 dark:text-gray-100">
                                    @if (is_array($service->featured) && count($service->featured) > 0)
                                        {{ implode(', ', array_slice($service->featured, 0, 2)) }}
                                        @if (count($service->featured) > 2)
                                            <span title="{{ implode(', ', $service->featured) }}">...</span>
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-2">
                                        <button data-service-id="{{ $service->id }}"
                                            class="edit-service-btn text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md mr-2 flex items-center gap-1">
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
                                        <button data-service-id="{{ $service->id }}"
                                            class="delete-service-btn text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                                            </svg>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-700 text-sm pl-2">
                                <td colspan="5" class="py-4 text-center text-gray-500 dark:text-gray-400">No services
                                    available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add Service Modal -->
        <div id="addServiceModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="addModalBackdrop"></div>

                <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-md mx-auto z-50 overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Add New Service</h2>
                            <button type="button"
                                class="close-modal text-gray-400 hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm mb-6">Create a new service for your
                            barbershop</p>

                        <form id="addServiceForm" action="{{ route('admin.service.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Service
                                    Name</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                            </div>

                            <div class="mb-4">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                                <textarea id="description" name="description" rows="3" required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div>
                                    <label for="price"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price
                                        ($)</label>
                                    <input type="number" id="price" name="price" step="0.01" min="0"
                                        required
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="duration"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Duration
                                        (minutes)</label>
                                    <input type="number" id="duration" name="duration" min="1" required
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Features</label>
                                <div id="features-container">
                                    <div class="flex items-center mb-2">
                                        <input type="text" name="featured[]" placeholder="Add a feature"
                                            class="flex-grow px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                        <button type="button"
                                            class="ml-2 p-2 bg-gray-200 dark:bg-gray-600 rounded-md remove-feature"
                                            style="display: none;">
                                            <svg class="h-5 w-5 text-gray-600 dark:text-gray-300" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <button type="button" id="add-feature"
                                    class="mt-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 px-3 py-1 rounded-md text-sm">
                                    Add
                                </button>
                            </div>

                            <div class="flex justify-end gap-3">
                                <button type="button"
                                    class="close-modal px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">Cancel</button>
                                <button type="submit"
                                    class="px-4 py-2 bg-black dark:bg-white text-white dark:text-black rounded-md hover:bg-gray-800 dark:hover:bg-gray-200">Create
                                    Service</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Service Modal -->
        <div id="editServiceModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="editModalBackdrop"></div>

                <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-md mx-auto z-50 overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Edit Service</h2>
                            <button type="button"
                                class="close-modal text-gray-400 hover:text-gray-600 dark:text-gray-300 dark:hover:text-gray-100">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>

                        <form id="editServiceForm" action="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="edit_name"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Service
                                    Name</label>
                                <input type="text" id="edit_name" name="name" required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                            </div>

                            <div class="mb-4">
                                <label for="edit_description"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                                <textarea id="edit_description" name="description" rows="3" required
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white"></textarea>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div>
                                    <label for="edit_price"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price
                                        ($)</label>
                                    <input type="number" id="edit_price" name="price" step="0.01"
                                        min="0" required
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                </div>
                                <div>
                                    <label for="edit_duration"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Duration
                                        (minutes)</label>
                                    <input type="number" id="edit_duration" name="duration" min="1" required
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Features</label>
                                <div id="edit-features-container">
                                    <!-- Features will be added here dynamically -->
                                </div>

                                <button type="button" id="edit-add-feature"
                                    class="mt-2 bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-800 dark:text-gray-200 px-3 py-1 rounded-md text-sm">
                                    Add
                                </button>
                            </div>

                            <div class="flex justify-end gap-3">
                                <button type="button"
                                    class="close-modal px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">Cancel</button>
                                <button type="submit"
                                    class="px-4 py-2 bg-black dark:bg-white text-white dark:text-black rounded-md hover:bg-gray-800 dark:hover:bg-gray-200">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Service Modal -->
        <div id="deleteServiceModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="deleteModalBackdrop"></div>

                <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-sm mx-auto z-50 overflow-hidden">
                    <div class="p-6">
                        <div class="flex justify-center mb-4">
                            <div class="bg-red-100 dark:bg-red-900 rounded-full p-3">
                                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <h3 class="text-lg font-medium text-center text-gray-900 dark:text-gray-100 mb-2">Delete
                            Service</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 text-center mb-6">Are you sure you want to
                            delete this service?
                            This action cannot be undone.</p>

                        <form id="deleteServiceForm" action="" method="POST"
                            class="flex justify-center gap-3">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                class="close-modal px-4 py-2 bg-gray-200 dark:bg-gray-600 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-300 dark:hover:bg-gray-500">Cancel</button>
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Modal elements
                const addServiceBtn = document.getElementById('addServiceBtn');
                const addServiceModal = document.getElementById('addServiceModal');
                const editServiceModal = document.getElementById('editServiceModal');
                const deleteServiceModal = document.getElementById('deleteServiceModal');

                // Forms
                const addServiceForm = document.getElementById('addServiceForm');
                const editServiceForm = document.getElementById('editServiceForm');
                const deleteServiceForm = document.getElementById('deleteServiceForm');

                // Features containers
                const featuresContainer = document.getElementById('features-container');
                const editFeaturesContainer = document.getElementById('edit-features-container');

                // Open Add Service Modal
                addServiceBtn.addEventListener('click', function() {
                    addServiceModal.classList.remove('hidden');
                });

                // Open Edit Service Modal
                document.querySelectorAll('.edit-service-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const serviceId = this.getAttribute('data-service-id');

                        // Fetch service data
                        fetch(`{{ url('/services') }}/${serviceId}/edit`)
                            .then(response => response.json())
                            .then(service => {
                                // Populate form fields
                                document.getElementById('edit_name').value = service.name;
                                document.getElementById('edit_description').value = service
                                    .description;
                                document.getElementById('edit_price').value = service.price;
                                document.getElementById('edit_duration').value = service.duration;

                                // Set form action
                                editServiceForm.action = `{{ url('/services') }}/${service.id}`;

                                // Clear and populate features
                                editFeaturesContainer.innerHTML = '';

                                if (service.featured && service.featured.length > 0) {
                                    service.featured.forEach(feature => {
                                        addFeatureField(editFeaturesContainer, feature);
                                    });
                                } else {
                                    addFeatureField(editFeaturesContainer, '');
                                }

                                // Show/hide remove buttons
                                updateRemoveButtons(editFeaturesContainer);

                                // Show modal
                                editServiceModal.classList.remove('hidden');
                            })
                            .catch(error => console.error('Error:', error));
                    });
                });

                // Open Delete Service Modal
                document.querySelectorAll('.delete-service-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const serviceId = this.getAttribute('data-service-id');
                        deleteServiceForm.action = `{{ url('/services') }}/${serviceId}`;
                        deleteServiceModal.classList.remove('hidden');
                    });
                });

                // Close modals
                document.querySelectorAll('.close-modal').forEach(button => {
                    button.addEventListener('click', function() {
                        addServiceModal.classList.add('hidden');
                        editServiceModal.classList.add('hidden');
                        deleteServiceModal.classList.add('hidden');
                    });
                });

                // Close modal when clicking backdrop
                document.getElementById('addModalBackdrop').addEventListener('click', function() {
                    addServiceModal.classList.add('hidden');
                });

                document.getElementById('editModalBackdrop').addEventListener('click', function() {
                    editServiceModal.classList.add('hidden');
                });

                document.getElementById('deleteModalBackdrop').addEventListener('click', function() {
                    deleteServiceModal.classList.add('hidden');
                });

                // Add feature field
                document.getElementById('add-feature').addEventListener('click', function() {
                    addFeatureField(featuresContainer, '');
                    updateRemoveButtons(featuresContainer);
                });

                // Add feature field (edit modal)
                document.getElementById('edit-add-feature').addEventListener('click', function() {
                    addFeatureField(editFeaturesContainer, '');
                    updateRemoveButtons(editFeaturesContainer);
                });

                // Remove feature field
                featuresContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-feature')) {
                        e.target.closest('.flex').remove();
                        updateRemoveButtons(featuresContainer);
                    }
                });

                // Remove feature field (edit modal)
                editFeaturesContainer.addEventListener('click', function(e) {
                    if (e.target.closest('.remove-feature')) {
                        e.target.closest('.flex').remove();
                        updateRemoveButtons(editFeaturesContainer);
                    }
                });

                // Helper function to add a feature field
                function addFeatureField(container, value) {
                    const featureDiv = document.createElement('div');
                    featureDiv.className = 'flex items-center mb-2';
                    featureDiv.innerHTML = `
                    <input type="text" name="featured[]" value="${value}" placeholder="Add a feature" class="flex-grow px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white">
                    <button type="button" class="ml-2 p-2 bg-gray-200 dark:bg-gray-600 rounded-md remove-feature">
                        <svg class="h-5 w-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                `;
                    container.appendChild(featureDiv);
                }

                // Helper function to update remove buttons visibility
                function updateRemoveButtons(container) {
                    const removeButtons = container.querySelectorAll('.remove-feature');
                    if (removeButtons.length === 1) {
                        removeButtons[0].style.display = 'none';
                    } else {
                        removeButtons.forEach(button => {
                            button.style.display = 'block';
                        });
                    }
                }
            });
        </script>
    </body>
</x-app-layout>
