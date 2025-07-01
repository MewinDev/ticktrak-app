@props(['active', 'color' => 'blue'])

@php
    $colorClass = match ($color) {
        'red' => 'text-red-500 dark:text-red-400',
        'green' => 'text-green-500 dark:text-green-400',
        'yellow' => 'text-yellow-500 dark:text-yellow-400',
        default => 'text-blue-500 dark:text-blue-400',
    };

    $classes =
        $active ?? false
            ? "$colorClass font-bold bg-white dark:bg-gray-700 border border-gray-200 dark:border-gray-600 shadow-sm flex items-center p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 group"
            : 'flex text-gray-900 items-center p-2 rounded-md dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
