<x-app-layout>
    <x-slot name="title">
        {{ __('Manage Bookings') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Bookings') }}
        </h2>
    </x-slot>

    <body class="bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-4">
            <div>
            <h1 class="text-2xl font-bold">Bookings</h1>
            <p class="text-gray-500 text-sm">Manage customer appointments and scheduling</p>
            </div>
        <button class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">+ Add Booking</button>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-300/50 text-left">
         <tr>
        <th colspan="8" class="text-xl font-bold pl-2 py-2">All Bookings</th>
      </tr>
        <tbody class="text-sm">
          <tr class="border-b text-gray-500">
            <th class="py-2 pl-2 text-center w-24">BOOKING ID</th>
            <th class="py-2 text-center w-32">CUSTOMER</th>
            <th class="py-2 text-center w-32">SERVICE</th>
            <th class="py-2 text-center w-32">DATE</th>
            <th class="py-2 text-center w-24">TIME</th>
            <th class="py-2 text-center w-24">BARBER</th>
            <th class="py-2 text-center w-32">STATUS</th>
            <th class="py-2 text-center w-24">ACTIONS</th>
          </tr>

          <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-1001</td>
            <td class="text-center">Testing1</td>
            <td class="text-center">Classic Haircut</td>
            <td class="text-center">29 Mei 2025</td>
            <td class="text-center">09:00</td>
            <td class="text-center">Alex</td>
            <td class="text-center"><span class="bg-black text-white text-xs px-3 py-1 rounded-full">Confirmed</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

          <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-1002</td>
            <td class="text-center">Testing2</td>
            <td class="text-center">Premium Package</td>
            <td class="text-center">29 Mei 2025</td>
            <td class="text-center">13:30</td>
            <td class="text-center">Ryan</td>
            <td class="text-center"><span class="bg-black text-white text-xs px-3 py-1 rounded-full">Confirmed</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

          <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-1003</td>
            <td class="text-center">Testing3</td>
            <td class="text-center">Beard Trim</td>
            <td class="text-center">29 Mei 2025</td>
            <td class="text-center">10:00</td>
            <td class="text-center">Wahid</td>
            <td class="text-center"><span class="bg-black text-white text-xs px-3 py-1 rounded-full">Confirmed</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

          <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-1004</td>
            <td class="text-center">Testing4</td>
            <td class="text-center">Hot Towel Shave</td>
            <td class="text-center">29 Mei 2025</td>
            <td class="text-center">14:30</td>
            <td class="text-center">Danu</td>
            <td class="text-center"><span class="bg-black text-white text-xs px-3 py-1 rounded-full">Confirmed</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

          <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-1005</td>
            <td class="text-center">Testing5</td>
            <td class="text-center">Classic Haircut</td>
            <td class="text-center">29 Mei 2025</td>
            <td class="text-center">15:00</td>
            <td class="text-center">Billy</td>
            <td class="text-center"><span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Cancelled</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

          <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-1006</td>
            <td class="text-center">Testing6</td>
            <td class="text-center">Kids Haircut</td>
            <td class="text-center">29 Mei 2025</td>
            <td class="text-center">15:30</td>
            <td class="text-center">Irfan</td>
            <td class="text-center"><span class="bg-black text-white text-xs px-3 py-1 rounded-full">Confirmed</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

          <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-1007</td>
            <td class="text-center">Testing7</td>
            <td class="text-center">Classic Haircut</td>
            <td class="text-center">30 Mei 2025</td>
            <td class="text-center">09:30</td>
            <td class="text-center">Dewa</td>
            <td class="text-center"><span class="bg-black text-white text-xs px-3 py-1 rounded-full">Confirmed</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

          <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-1008</td>
            <td class="text-center">Testing8</td>
            <td class="text-center">Premium Package</td>
            <td class="text-center">30 Mei 2025</td>
            <td class="text-center">13:00</td>
            <td class="text-center">Alex</td>
            <td class="text-center"><span class="bg-black text-white text-xs px-3 py-1 rounded-full">Confirmed</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

          <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-1009</td>
            <td class="text-center">Testing9</td>
            <td class="text-center">Beard Trim</td>
            <td class="text-center">30 Mei 2025</td>
            <td class="text-center">14:00</td>
            <td class="text-center">Ryan</td>
            <td class="text-center"><span class="bg-black text-white text-xs px-3 py-1 rounded-full">Confirmed</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

         <tr class="border-b hover:bg-gray-50 text-sm pl-2">
            <td class="py-3 pl-2 text-center">BK-10010</td>
            <td class="text-center">Testing10</td>
            <td class="text-center">Hot Towel Shave</td>
            <td class="text-center">30 Mei 2025</td>
            <td class="text-center">17:00</td>
            <td class="text-center">Wahid</td>
            <td class="text-center"><span class="bg-red-500 text-white text-xs px-3 py-1 rounded-full">Confirmed</span></td>
            <td class="text-center"><span class="text-gray-500 text-lg">⋯</span></td>
          </tr>

        </tbody>

    </body>
</x-app-layout>
