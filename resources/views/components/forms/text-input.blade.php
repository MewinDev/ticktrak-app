@props([
    'color' => 'blue',
    'disabled' => false,
    'extraClass' => '',
    'fieldName' => null,
    'size' => 'sm', // new prop
])

@php
    $sizeClasses = [
        'sm' => 'text-sm p-2 rounded-md',
        'md' => 'text-base p-3 rounded-lg',
        'lg' => 'text-lg p-4 rounded-xl',
    ];
    $baseClasses = "mt-1 disabled:cursor-not-allowed disabled:opacity-50 border border-gray-300 text-gray-900 placeholder-$color-700 focus:ring-$color-500 bg-gray-50 dark:bg-gray-700 focus:border-$color-500 block w-full dark:text-white dark:placeholder-gray-400 dark:border-gray-600";
    $focusClasses = "focus:ring-$color-500 focus:border-$color-500";
    $placeholderColor = "placeholder-$color-700 dark:placeholder-$color-500";

    $sizeClass = $sizeClasses[$size] ?? $sizeClasses['md'];
    $finalClasses = "{$baseClasses} {$focusClasses} {$placeholderColor} {$sizeClass} {$extraClass}";

    $bindClass = "{
        'border border-red-500 dark:border-red-500': errors.{$fieldName}
    }";
@endphp

<input {{ $attributes }} @if ($disabled) disabled @endif class="{{ $finalClasses }}"
    @if ($disabled) :class="{!! $bindClass !!}" @endif autocomplete="off" />
