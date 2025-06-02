@props([
    'type' => 'button',
    'color' => 'blue',
    'size' => 'sm',
    'outline' => false,
    'disabled' => false,
    'extraClass' => '',
])

@php
    $base = 'font-medium rounded-lg focus:outline-none focus:ring-4 text-center';
    $disable = 'disabled:cursor-not-allowed disabled:opacity-50';

    // Sizes
    $sizeClasses = [
        'xs' => 'text-xs px-3 py-1',
        'sm' => 'text-sm px-4 py-1.5',
        'md' => 'text-base px-4 py-2',
        'lg' => 'text-lg px-4 py-2',
        'xl' => 'text-xl px-4 py-2',
    ];
    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['sm'];

    // Color themes
    $colorThemes = [
        'blue' => [
            'solid' =>
                'text-white bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
            'outline' =>
                'text-blue-700 border border-blue-700 hover:bg-blue-800 hover:text-white focus:ring-blue-300 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800',
        ],
        'gray' => [
            'solid' =>
                'text-gray-900 bg-gray-50 border border-gray-300 hover:bg-gray-100 focus:ring-gray-100 dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700',
            'outline' =>
                'text-gray-900 border border-gray-800 hover:bg-gray-900 hover:text-white focus:ring-gray-300 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800',
        ],
        'white' => [
            'solid' =>
                'text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-gray-100 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700',
            'outline' =>
                'text-gray-900 border border-gray-300 hover:bg-gray-100 focus:ring-gray-100 dark:border-gray-600 dark:text-white dark:hover:bg-gray-700',
        ],
        'green' => [
            'solid' =>
                'text-white bg-green-700 hover:bg-green-800 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
            'outline' =>
                'text-green-700 border border-green-700 hover:bg-green-800 hover:text-white focus:ring-green-300 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800',
        ],
        'red' => [
            'solid' =>
                'text-white bg-red-700 hover:bg-red-800 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900',
            'outline' =>
                'text-red-700 border border-red-700 hover:bg-red-800 hover:text-white focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900',
        ],
        'purple' => [
            'solid' =>
                'text-white bg-purple-700 hover:bg-purple-800 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900',
            'outline' =>
                'text-purple-700 border border-purple-700 hover:bg-purple-800 hover:text-white focus:ring-purple-300 dark:border-purple-500 dark:text-purple-500 dark:hover:text-white dark:hover:bg-purple-600 dark:focus:ring-purple-900',
        ],
    ];

    // Final class composition
    $theme = $colorThemes[$color][$outline ? 'outline' : 'solid'] ?? $colorThemes['blue']['solid'];
    $finalClass = "$base $sizeClass $disable $theme $extraClass";
@endphp

<button type="{{ $type }}" class="{{ $finalClass }}" @if ($disabled) disabled @endif
    {{ $attributes }}>
    {{ $slot }}
</button>
