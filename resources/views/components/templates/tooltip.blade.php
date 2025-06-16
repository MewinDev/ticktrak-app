@props([
    'location' => 'top', // default to top
])

@php
    $positions = [
        'top' => 'bottom-full left-1/2 -translate-x-1/2 mb-2',
        'bottom' => 'top-full left-1/2 -translate-x-1/2 mt-2',
        'left' => 'right-full top-1/2 -translate-y-1/2 mr-2',
        'right' => 'left-full top-1/2 -translate-y-1/2 ml-2',
    ];
@endphp

<div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false" class="relative inline-block">
    <!-- Trigger -->
    <div>
        {{ $trigger }}
    </div>

    <!-- Tooltip Content -->
    <div x-show="show" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute z-50 px-5 py-2 text-sm font-semibold text-gray-900 bg-gray-50 border border-gray-200 rounded-lg shadow-md {{ $positions[$location] ?? $positions['top'] }}"
        style="white-space: nowrap; display: none">
        {{ $slot }}
    </div>
</div>
