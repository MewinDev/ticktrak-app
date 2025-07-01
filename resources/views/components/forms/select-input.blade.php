@props([
    'color' => 'blue',
    'disabled' => false,
    'extraClass' => '',
    'width' => 'full',
    'fieldName' => null,
    'size' => 'sm', // new prop
])

@php
    $sizeClasses =
        [
            'sm' => 'text-sm p-2',
            'md' => 'text-base p-2.5',
            'lg' => 'text-lg p-3',
        ][$size] ?? 'text-base p-2.5';

    $baseClasses = "w-full mt-1 disabled:cursor-not-allowed disabled:opacity-50 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg placeholder-gray-300 focus:ring-$color-500 focus:border-$color-500 block {$width} dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-$color-500 dark:focus:border-$color-500";
    $focusClasses = "focus:ring-$color-500 focus:border-$color-500";
    $placeholderColor = "placeholder-$color-700 dark:placeholder-$color-500";

    $finalClasses = "$baseClasses $focusClasses $placeholderColor $sizeClasses $extraClass";

    $bindClass = "{
        'border border-red-500 dark:border-red-500': errors.{$fieldName}
    }";
@endphp

<select {{ $attributes }} @if ($disabled) disabled @endif class="{{ $finalClasses }}"
    @if ($disabled) :class="{!! $bindClass !!}" @endif>
    {{ $slot }}
</select>
