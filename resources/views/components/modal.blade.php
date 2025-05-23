@props([
    'name',
    'title' => '',
    'show' => false,
    'maxWidth' => '2xl',
    'focusable' => false,
    'closeOnClickAway' => true,
])

@php
$widthClass = [
    'sm' => 'max-w-sm',
    'md' => 'max-w-md',
    'lg' => 'max-w-lg',
    'xl' => 'max-w-xl',
    '2xl' => 'max-w-2xl',
    '3xl' => 'max-w-3xl',
    '4xl' => 'max-w-4xl',
    '5xl' => 'max-w-5xl',
][$maxWidth] ?? 'max-w-2xl';
@endphp

<div
    x-data="{
        show: @js($show),
        focusables() {
            return [...$el.querySelectorAll('a, button, input:not([type=hidden]), textarea, select, details, [tabindex]:not([tabindex=-1])')]
                .filter(el => !el.hasAttribute('disabled'));
        },
        firstFocusable() { return this.focusables()[0]; },
        lastFocusable() { return this.focusables().slice(-1)[0]; },
        nextFocusable() {
            const i = this.focusables().indexOf(document.activeElement) + 1;
            return this.focusables()[i] || this.firstFocusable();
        },
        prevFocusable() {
            const i = this.focusables().indexOf(document.activeElement) - 1;
            return this.focusables()[i] || this.lastFocusable();
        },
    }"
    x-init="$watch('show', value => {
        document.body.classList.toggle('overflow-y-hidden', value);
        {{ $focusable ? 'if (value) setTimeout(() => firstFocusable()?.focus(), 100);' : '' }}
    })"
    x-on:open-modal.window="show = $event.detail === '{{ $name }}'"
    x-on:close-modal.window="show = $event.detail === '{{ $name }}' ? false : show"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="!$event.shiftKey && nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    class="fixed inset-0 z-50 overflow-y-auto px-4 py-6 sm:px-0 mt-10"
    aria-labelledby="modal-title-{{ $name }}"
    aria-modal="true"
    role="dialog"
    style="display: none;"
>
    <!-- Backdrop -->
    <div
        x-show="show"
        class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @if($closeOnClickAway) x-on:click="show = false" @endif
    ></div>

    <!-- Modal Panel -->
    <div
        x-show="show"
        class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $widthClass }} sm:mx-auto"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-4 py-3 border-b border-gray-300 dark:border-gray-700">
            <h3 id="modal-title-{{ $name }}" class="text-lg font-bold text-gray-900 dark:text-white uppercase">
                {{ $title }}
            </h3>
            <button
                type="button"
                x-on:click="$dispatch('close-modal', '{{ $name }}')"
                class="text-gray-400 hover:text-gray-600 dark:hover:text-white"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <span class="sr-only">Close</span>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-7 overflow-y-auto max-h-[75vh]">
            {{ $slot }}
        </div>

        <!-- Modal Footer -->
        @if(trim($footer ?? ''))
            <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 text-right">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
