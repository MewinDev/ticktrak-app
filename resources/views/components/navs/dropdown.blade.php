@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white dark:bg-gray-600'])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left start-0';
            break;
        case 'right':
            $alignmentClasses = 'origin-top-right end-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'bottom':
            $alignmentClasses = 'origin-bottom';
            break;
        case 'top-right':
            $alignmentClasses = 'origin-top-right end-0';
            break;
        case 'bottom-right':
            $alignmentClasses = 'origin-bottom-right end-0';
            break;
        case 'top-left':
            $alignmentClasses = 'origin-top-left start-0';
            break;
        case 'bottom-left':
            $alignmentClasses = 'origin-bottom-left start-0';
            break;
        default:
            $alignmentClasses = 'origin-top-right end-0';
            break;
    }

    switch ($width) {
        case '48':
            $width = 'w-48';
            break;
    }
@endphp

<div class="relative cursor-pointer" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <template>
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 w-32 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"
            style="display: none;" @click="open = false">
            <div
                class="rounded-md ring-1 ring-black ring-opacity-5 divide-y divide-gray-200 dark:divide-gray-600 {{ $contentClasses }}">
                {{ $content }}
            </div>
        </div>
    </template>
</div>
