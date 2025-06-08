<!-- resources/views/components/tooltip.blade.php -->
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
        class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 z-50 px-5 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg "
        style="white-space: nowrap; display: none;">

        {{ $slot }}

        <!-- Arrow -->
        <div
            class="tooltip-bottom shadow relative before:content-[''] before:absolute before:left-1/2 before:bottom-0 before:-translate-x-1/2 before:translate-y-[calc(100%+5px)] before:border-[15px] before:border-transparent before:border-t-white before:border-b-0">
        </div>
    </div>
</div>
