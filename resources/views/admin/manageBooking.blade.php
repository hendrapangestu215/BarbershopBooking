<x-app-layout>
    <x-slot name="title">
        {{ __('Manage Bookings') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Bookings') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow my-6">
        <x-success-message />
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Bookings</h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Manage customer appointments and scheduling</p>
            </div>
            <button type="button" onclick="toggleModal('addBookingModal')"
                class="bg-black dark:bg-white text-white dark:text-black px-4 py-2 rounded hover:bg-gray-800 dark:hover:bg-gray-200 flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                Add Booking
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 dark:border-gray-700 text-left">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            BOOKING ID</th>
                        <th
                            class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            CUSTOMER</th>
                        <th
                            class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            SERVICE</th>
                        <th
                            class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            DATE</th>
                        <th
                            class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            TIME</th>
                        <th
                            class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            BARBER</th>
                        <th
                            class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            STATUS</th>
                        <th
                            class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($bookings as $booking)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td
                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                BK-{{ str_pad($booking->id, 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $booking->user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $booking->service->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $booking->barber ? $booking->barber->name : 'No barber assigned' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if ($booking->status == 'confirmed')
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-black dark:bg-white text-white dark:text-black">
                                        Confirmed
                                    </span>
                                @elseif($booking->status == 'cancelled')
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-500 text-white">
                                        Cancelled
                                    </span>
                                @else
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-500 text-white">
                                        Pending
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex items-center space-x-2">
                                    <button onclick="openEditModal({{ $booking->id }})"
                                        class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button onclick="confirmDelete({{ $booking->id }})"
                                        class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                No bookings found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $bookings->links() }}
        </div>
    </div>

    <!-- Add Booking Modal -->
    <div id="addBookingModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 dark:bg-gray-900 dark:bg-opacity-60 hidden overflow-y-auto h-full w-full z-50">
        <div
            class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800 dark:border-gray-700">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">Add New Booking</h3>
                <form action="{{ route('admin.bookings.store') }}" method="POST" class="mt-4 text-left">
                    @csrf
                    <div class="mb-4">
                        <label for="user_id"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Customer:</label>
                        <select name="user_id" id="user_id"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Select Customer</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="service_id"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Service:</label>
                        <select name="service_id" id="service_id"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="hairstyle_id"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Hairstyle
                            (Optional):</label>
                        <select name="hairstyle_id" id="hairstyle_id"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Hairstyle</option>
                            @foreach ($hairstyles as $hairstyle)
                                <option value="{{ $hairstyle->id }}">{{ $hairstyle->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="date"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Date:</label>
                        <input type="date" name="date" id="date"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-4">
                        <label for="time"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Time:</label>
                        <input type="time" name="time" id="time"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="barber_name"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Barber:</label>
                        <select name="barber_id" id="barber_id"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Select Barber</option>
                            @foreach ($barbers as $barber)
                                <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="status"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Status:</label>
                        <select name="status" id="status"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <button type="button" onclick="toggleModal('addBookingModal')"
                            class="bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-black dark:text-gray-200 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-black dark:bg-white hover:bg-gray-800 dark:hover:bg-gray-200 text-white dark:text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Add Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Booking Modal -->
    <div id="editBookingModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 dark:bg-gray-900 dark:bg-opacity-60 hidden overflow-y-auto h-full w-full z-50">
        <div
            class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800 dark:border-gray-700">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">Edit Booking</h3>
                <form id="editBookingForm" action="" method="POST" class="mt-4 text-left">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="edit_user_id"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Customer:</label>
                        <select name="user_id" id="edit_user_id"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Select Customer</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_service_id"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Service:</label>
                        <select name="service_id" id="edit_service_id"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Select Service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_hairstyle_id"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Hairstyle
                            (Optional):</label>
                        <select name="hairstyle_id" id="edit_hairstyle_id"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Hairstyle</option>
                            @foreach ($hairstyles as $hairstyle)
                                <option value="{{ $hairstyle->id }}">{{ $hairstyle->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_date"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Date:</label>
                        <input type="date" name="date" id="edit_date"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_time"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Time:</label>
                        <input type="time" name="time" id="edit_time"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="edit_barber_name"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Barber:</label>
                        <select name="barber_id" id="edit_barber_id"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="">Select Barber</option>
                            @foreach ($barbers as $barber)
                                <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="edit_status"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Status:</label>
                        <select name="status" id="edit_status"
                            class="shadow appearance-none border dark:border-gray-600 rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <button type="button" onclick="toggleModal('editBookingModal')"
                            class="bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-black dark:text-gray-200 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-black dark:bg-white hover:bg-gray-800 dark:hover:bg-gray-200 text-white dark:text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Booking
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 dark:bg-gray-900 dark:bg-opacity-60 hidden overflow-y-auto h-full w-full z-50">
        <div
            class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800 dark:border-gray-700">
            <div class="mt-3 text-center">
                <div class="flex items-center justify-center mb-4">
                    <div class="bg-red-100 dark:bg-red-900 rounded-full p-3">
                        <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Delete Booking</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-gray-500 dark:text-gray-400">Are you sure you want to delete this booking? This
                        action cannot be
                        undone.</p>
                </div>
                <form id="deleteBookingForm" action="" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <div class="flex items-center justify-between px-4 py-3">
                        <button type="button" onclick="toggleModal('deleteModal')"
                            class="bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-black dark:text-gray-200 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Cancel
                        </button>
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Delete
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }

        function openEditModal(bookingId) {
            // Fetch booking data
            fetch(`{{ url('/bookings') }}/${bookingId}/edit`)
                .then(response => response.json())
                .then(data => {
                    // Set form action URL
                    document.getElementById('editBookingForm').action = `{{ url('/bookings') }}/${bookingId}`;

                    // Populate form fields with booking data
                    document.getElementById('edit_user_id').value = data.user_id;
                    document.getElementById('edit_service_id').value = data.service_id;
                    document.getElementById('edit_hairstyle_id').value = data.hairstyle_id || '';
                    document.getElementById('edit_date').value = data.date;
                    document.getElementById('edit_time').value = data.time;
                    document.getElementById('edit_barber_id').value = data.barber_id || '';
                    document.getElementById('edit_status').value = data.status;

                    // Show the modal
                    toggleModal('editBookingModal');
                })
                .catch(error => console.error('Error fetching booking data:', error));
        }

        function confirmDelete(bookingId) {
            document.getElementById('deleteBookingForm').action = `{{ url('/bookings') }}/${bookingId}`;
            toggleModal('deleteModal');
        }
    </script>
</x-app-layout>
