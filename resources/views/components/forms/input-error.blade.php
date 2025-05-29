@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@else
    <p {{ $attributes->merge(['class' => 'text-red-500 text-sm dark:text-red-500']) }}>
    </p>
@endif
