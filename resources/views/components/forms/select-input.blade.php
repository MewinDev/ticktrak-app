@props([
    'color' => 'blue',
    'disabled' => false,
    'extraClass' => '',
    'options' => [], // Array of options for the select input
    'value' => '',
    'label' => 'Here',
    'width' => 'full',
])

@php
    $classes = "mt-1 disabled:cursor-not-allowed disabled:opacity-50 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-$width p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";

    $finalClasses = "$classes $extraClass";
@endphp

<select @if ($disabled) disabled @endif class="{{ $finalClasses }}">
    <option value="">{{ $label }}</option>
    @foreach ($options as $key => $name)
        <option value="{{ $key }}" @if ($value == $key) selected @endif>
            {{ ucfirst($name) }}
        </option>
    @endforeach
</select>
