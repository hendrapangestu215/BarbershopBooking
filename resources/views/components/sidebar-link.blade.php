@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'flex items-center px-4 py-2 bg-gray-900 text-white rounded-md mb-1'
            : 'flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md mb-1 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
