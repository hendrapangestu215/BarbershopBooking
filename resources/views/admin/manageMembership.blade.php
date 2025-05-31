<x-app-layout>
    <x-slot name="title">
        {{ __('Manage Membership') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Membership') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h3 class="text-xl font-bold">Membership</h3>
                            <p class="text-gray-500 dark:text-gray-400">Manage membership for customers</p>
                        </div>
                        <button id="addMembershipBtn" type="button"
                            class="bg-black text-white px-4 py-2 rounded-md hover:bg-gray-800">
                            + Add Membership
                        </button>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-800">
                            <thead>
                                <tr class="text-left border-b border-gray-200 dark:border-gray-700">
                                    <th class="py-3 px-4">NAME</th>
                                    <th class="py-3 px-4">EMAIL</th>
                                    <th class="py-3 px-4">ROLE</th>
                                    <th class="py-3 px-4">STATUS</th>
                                    <th class="py-3 px-4">JOIN DATE</th>
                                    <th class="py-3 px-4">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($memberships as $membership)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="py-3 px-4">{{ $membership->user->name }}</td>
                                        <td class="py-3 px-4">{{ $membership->user->email }}</td>
                                        <td class="py-3 px-4">{{ $membership->role }}</td>
                                        <td class="py-3 px-4">
                                            @if ($membership->status == 'Active')
                                                <span class="px-2 py-1 bg-green-400 text-white rounded-md">
                                                    {{ $membership->status }}
                                                </span>
                                            @elseif($membership->status == 'Inactive')
                                                <span class="px-2 py-1 bg-red-400 text-white rounded-md">
                                                    {{ $membership->status }}
                                                </span>
                                            @elseif($membership->status == 'Suspended')
                                                <span class="px-2 py-1 bg-gray-400 text-white rounded-md">
                                                    {{ $membership->status }}
                                                </span>
                                            @else
                                                <span class="px-2 py-1 bg-blue-400 text-white rounded-md">
                                                    {{ $membership->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4">{{ $membership->join_date->format('Y-m-d') }}</td>
                                        <td class="py-3 px-4">
                                            <div class="flex space-x-2">
                                                <button type="button"
                                                    class="edit-membership-btn text-blue-500 flex items-center"
                                                    data-membership-id="{{ $membership->id }}">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                    Edit
                                                </button>
                                                <button type="button"
                                                    class="delete-membership-btn text-red-500 flex items-center"
                                                    data-membership-id="{{ $membership->id }}">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 px-4 text-center text-gray-500">
                                            No membership records found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $memberships->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Membership Modal -->
    <div id="addMembershipModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="addModalBackdrop"></div>

            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-md mx-auto z-50 overflow-hidden">
                <div class="flex justify-between items-center p-4 border-b dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Membership</h3>
                    <button type="button" class="close-modal text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form id="addMembershipForm" action="{{ route('admin.membership.store') }}" method="POST"
                    class="p-4">
                    @csrf

                    <div class="mb-4">
                        <label for="add_user_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">User</label>
                        <select id="add_user_id" name="user_id"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                            <option value="">Select a user</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="add_role"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Role</label>
                        <select id="add_role" name="role"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                            <option value="Member">Member</option>
                            <option value="Premium">Premium</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="add_status"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                        <select id="add_status" name="status"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Suspended">Suspended</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="add_join_date"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Join Date</label>
                        <input type="date" id="add_join_date" name="join_date"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="flex justify-end space-x-3 pt-3 border-t dark:border-gray-700">
                        <button type="button"
                            class="close-modal px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Create Membership
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Membership Modal -->
    <div id="editMembershipModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" id="editModalBackdrop"></div>

            <div class="bg-white dark:bg-gray-800 rounded-lg w-full max-w-md mx-auto z-50 overflow-hidden">
                <div class="flex justify-between items-center p-4 border-b dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Membership</h3>
                    <button type="button" class="close-modal text-gray-400 hover:text-gray-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form id="editMembershipForm" method="POST" class="p-4">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_membership_id" name="membership_id">
                    <input type="hidden" id="edit_user_id" name="user_id">

                    <div class="mb-4">
                        <label for="edit_user_display"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">User</label>
                        <input type="text" id="edit_user_display"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 bg-gray-100"
                            disabled readonly>
                    </div>

                    <div class="mb-4">
                        <label for="edit_role"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Role</label>
                        <select id="edit_role" name="role"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                            <option value="Member">Member</option>
                            <option value="Premium">Premium</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="edit_status"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Status</label>
                        <select id="edit_status" name="status"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Suspended">Suspended</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="edit_join_date"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Join Date</label>
                        <input type="date" id="edit_join_date" name="join_date"
                            class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            required>
                    </div>

                    <div class="flex justify-end space-x-3 pt-3 border-t dark:border-gray-700">
                        <button type="button"
                            class="close-modal px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Update Membership
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteMembershipModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
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

                    <h3 class="text-center text-lg font-medium text-gray-900 dark:text-white mb-2">Delete Membership
                    </h3>
                    <p class="text-center text-gray-500 dark:text-gray-400 mb-6">Are you sure you want to delete this
                        membership? This action cannot be undone.</p>

                    <form id="deleteMembershipForm" method="POST" class="flex justify-center space-x-3">
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
                // Add Membership Modal
                const addMembershipBtn = document.getElementById('addMembershipBtn');
                const addMembershipModal = document.getElementById('addMembershipModal');

                // Edit Membership Modal
                const editMembershipModal = document.getElementById('editMembershipModal');
                const editMembershipForm = document.getElementById('editMembershipForm');

                // Delete Membership Modal
                const deleteMembershipModal = document.getElementById('deleteMembershipModal');
                const deleteMembershipForm = document.getElementById('deleteMembershipForm');

                // Close Modal Buttons
                const closeModalButtons = document.querySelectorAll('.close-modal');

                // Open Add Modal
                addMembershipBtn.addEventListener('click', function() {
                    addMembershipModal.classList.remove('hidden');
                });

                // Open Edit Modal
                document.querySelectorAll('.edit-membership-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const membershipId = this.dataset.membershipId;

                        // Fetch membership data
                        fetch(`/admin/membership/${membershipId}/edit-data`)
                            .then(response => response.json())
                            .then(data => {
                                // Populate form
                                document.getElementById('edit_membership_id').value = data.id;
                                document.getElementById('edit_user_id').value = data.user_id;

                                // Find the user in the table to display their name
                                const userName = document.querySelector(
                                        `[data-membership-id="${data.id}"]`)
                                    .closest('tr')
                                    .querySelector('td:first-child')
                                    .textContent;

                                document.getElementById('edit_user_display').value = userName;
                                document.getElementById('edit_role').value = data.role;
                                document.getElementById('edit_status').value = data.status;
                                document.getElementById('edit_join_date').value = data.join_date;

                                // Update form action URL
                                editMembershipForm.action = `/admin/membership/${data.id}`;

                                // Show modal
                                editMembershipModal.classList.remove('hidden');
                            })
                            .catch(error => {
                                console.error('Error fetching membership data:', error);
                            });
                    });
                });

                // Open Delete Modal
                document.querySelectorAll('.delete-membership-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const membershipId = this.dataset.membershipId;
                        deleteMembershipForm.action = `/admin/membership/${membershipId}`;
                        deleteMembershipModal.classList.remove('hidden');
                    });
                });

                // Close Modals
                closeModalButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        addMembershipModal.classList.add('hidden');
                        editMembershipModal.classList.add('hidden');
                        deleteMembershipModal.classList.add('hidden');
                    });
                });

                // Close Modal when clicking on backdrop
                document.getElementById('addModalBackdrop').addEventListener('click', function() {
                    addMembershipModal.classList.add('hidden');
                });

                document.getElementById('editModalBackdrop').addEventListener('click', function() {
                    editMembershipModal.classList.add('hidden');
                });

                document.getElementById('deleteModalBackdrop').addEventListener('click', function() {
                    deleteMembershipModal.classList.add('hidden');
                });
            });
        </script>
    @endpush
</x-app-layout>
