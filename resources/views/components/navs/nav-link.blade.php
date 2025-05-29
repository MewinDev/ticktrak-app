@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'text-blue-500 font-bold bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 dark:text-blue-500 shadow-sm flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 group'
            : 'flex text-gray-900 items-center p-2 rounded-md dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
