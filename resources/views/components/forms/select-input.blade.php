@props([
    'color' => 'blue',
    'disabled' => false,
    'extraClass' => '',
    'options' => [], // Array of options for the select input
    'value' => '',
    'label' => 'Here',
    'width' => 'full',
    'fieldName' => null,
])

@php
    $baseClasses = "mt-1 disabled:cursor-not-allowed disabled:opacity-50 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg placeholder-gray-300 focus:ring-$color-500 focus:border-$color-500 block w-$width p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-$color-500 dark:focus:border-$color-500";
    $focusClasses = "focus:ring-$color-500 focus:border-$color-500";
    $placeholderColor = "placeholder-$color-700 dark:placeholder-$color-500";

    $finalClasses = "$baseClasses $focusClasses $placeholderColor $extraClass";

    $bindClass = "{
        'border border-red-500 dark:border-red-500': errors.{$fieldName}
    }";

@endphp

<select {{ $attributes }} @if ($disabled) disabled @endif class="{{ $finalClasses }}"
    :class="{!! $bindClass !!}">
    {{ $slot }}
</select>
