<x-app-layout>
    <x-slot name="title">
        {{ __('Manage Service') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Service') }}
        </h2>
    </x-slot>

    <body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <div>
            <h1 class="text-2xl font-bold">Services</h1>
            <p class="text-gray-500 text-sm">Manage barber services for customers</p>
            </div>
        <button class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">+ Add New Service</button>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300/50 text-left p-6">
         <tr>
        <th colspan="5" class="text-xl font-bold pl-2 py-2">All Services</th>
      </tr>
        <tbody class="text-sm">
            <tr class="border-b text-gray-500">
            <th class="py-2 text-center w-64">NAME</th>
            <th class="py-2 text-center w-40">PRICE</th>
            <th class="py-2 text-center w-80">DESCRIPTION</th>
            <th class="py-2 text-center w-40">FEATURED</th>
            <th class="py-2 text-center w-64">ACTIONS</th>
            </tr>

            <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">Classic Haircut</td>
            <td class="text-center">$20</td>
            <td class="text-center">Traditional haircut with clippers and scissors</td>
            <td class="text-center">Consultation</td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-2">
                    <button class="text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md p-2 rounded hover:bg-sky-400 mr-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 15.25V18h2.75l8.172-8.172-2.75-2.75L2 15.25zM4.414 17H3v-1.414l7.586-7.586 1.414 1.414L4.414 17z" clip-rule="evenodd" />
                    </svg>
                        Edit
                    </button>
                    <button class="text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md p-2 rounded hover:bg-red-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                    </svg>
                        Delete
                    </button>
                </div>
            </td>
            </tr>

            <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">Beard Trim</td>
            <td class="text-center">$15</td>
            <td class="text-center">Shape and trim your beard to perfection</td>
            <td class="text-center">Consultation</td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-2">
                    <button class="text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md p-2 rounded hover:bg-sky-400 mr-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 15.25V18h2.75l8.172-8.172-2.75-2.75L2 15.25zM4.414 17H3v-1.414l7.586-7.586 1.414 1.414L4.414 17z" clip-rule="evenodd" />
                    </svg>
                        Edit
                    </button>
                    <button class="text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md p-2 rounded hover:bg-red-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                    </svg>
                        Delete
                    </button>
                </div>
            </td>
            </tr>

         <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">Premium Package</td>
            <td class="text-center">$45</td>
            <td class="text-center">Complete grooming experience</td>
            <td class="text-center">Consultation</td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-2">
                    <button class="text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md p-2 rounded hover:bg-sky-400 mr-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 15.25V18h2.75l8.172-8.172-2.75-2.75L2 15.25zM4.414 17H3v-1.414l7.586-7.586 1.414 1.414L4.414 17z" clip-rule="evenodd" />
                    </svg>
                        Edit
                    </button>
                    <button class="text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md p-2 rounded hover:bg-red-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                    </svg>
                        Delete
                    </button>
                </div>
            </td>
            </tr>

         <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">Kids Haircut</td>
            <td class="text-center">$42</td>
            <td class="text-center">Haircut for children under 12 year old</td>
            <td class="text-center">Consultation</td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-2">
                    <button class="text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md p-2 rounded hover:bg-sky-400 mr-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 15.25V18h2.75l8.172-8.172-2.75-2.75L2 15.25zM4.414 17H3v-1.414l7.586-7.586 1.414 1.414L4.414 17z" clip-rule="evenodd" />
                    </svg>
                        Edit
                    </button>
                    <button class="text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md p-2 rounded hover:bg-red-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                    </svg>
                        Delete
                    </button>
                </div>
            </td>
            </tr>

         <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">Hot Towel Shave</td>
            <td class="text-center">$30</td>
            <td class="text-center">Traditional straight razor shave</td>
            <td class="text-center">Consultation</td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-2">
                    <button class="text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md p-2 rounded hover:bg-sky-400 mr-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 15.25V18h2.75l8.172-8.172-2.75-2.75L2 15.25zM4.414 17H3v-1.414l7.586-7.586 1.414 1.414L4.414 17z" clip-rule="evenodd" />
                    </svg>
                        Edit
                    </button>
                    <button class="text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md p-2 rounded hover:bg-red-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                    </svg>
                        Delete
                    </button>
                </div>
            </td>
            </tr>

            <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">Hair Coloring</td>
            <td class="text-center">$60</td>
            <td class="text-center">Professional hair coloring service</td>
            <td class="text-center">Consultation</td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-2">
                    <button class="text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md p-2 rounded hover:bg-sky-400 mr-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 15.25V18h2.75l8.172-8.172-2.75-2.75L2 15.25zM4.414 17H3v-1.414l7.586-7.586 1.414 1.414L4.414 17z" clip-rule="evenodd" />
                    </svg>
                        Edit
                    </button>
                    <button class="text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md p-2 rounded hover:bg-red-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                    </svg>
                        Delete
                    </button>
                </div>
            </td>
            </tr>

            <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">Smoothing</td>
            <td class="text-center">$31</td>
            <td class="text-center">Smooth your hair</td>
            <td class="text-center">Consultation</td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-2">
                    <button class="text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md p-2 rounded hover:bg-sky-400 mr-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 15.25V18h2.75l8.172-8.172-2.75-2.75L2 15.25zM4.414 17H3v-1.414l7.586-7.586 1.414 1.414L4.414 17z" clip-rule="evenodd" />
                    </svg>
                        Edit
                    </button>
                    <button class="text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md p-2 rounded hover:bg-red-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                    </svg>
                        Delete
                    </button>
                </div>
            </td>
            </tr>

            <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">Beard Sculpting</td>
            <td class="text-center">$42</td>
            <td class="text-center">Style your own beard</td>
            <td class="text-center">Consultation</td>
            <td class="px-6 py-4 text-center">
                <div class="flex justify-center gap-2">
                    <button class="text-[#00B4EB] px-3 py-1 border border-[#00B4EB] rounded-md p-2 rounded hover:bg-sky-400 mr-2 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 15.25V18h2.75l8.172-8.172-2.75-2.75L2 15.25zM4.414 17H3v-1.414l7.586-7.586 1.414 1.414L4.414 17z" clip-rule="evenodd" />
                    </svg>
                        Edit
                    </button>
                    <button class="text-[#FF2929] px-3 py-1 border border-[#FF2929] rounded-md p-2 rounded hover:bg-red-500 flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6M14 11v6M6 7l1 12a2 2 0 002 2h6a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                    </svg>
                        Delete
                    </button>
                </div>
            </td>
            </tr>

          
    </body>
</x-app-layout>
