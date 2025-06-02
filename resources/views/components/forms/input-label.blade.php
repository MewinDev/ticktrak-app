@props(['value', 'extraClass' => ''])

<label
    {{ $attributes->merge(['class' => 'cursor-pointer w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
