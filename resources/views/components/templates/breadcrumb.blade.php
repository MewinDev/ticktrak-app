@props([
  'breadcrumb' => []
])

<nav class="flex" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
    @foreach ($breadcrumb as $index => $item)
      @if ($index === 0)
        <li class="inline-flex items-center">
          <a href="{{ $item['link'] }}" class="inline-flex items-center text-sm sm:text-base font-medium text-gray-900 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500">
            <svg class="w-4 h-4 me-2.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
              <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
              <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
            </svg>
            {{ $item['name'] }}
          </a>
        </li>
      @elseif ($index < count($breadcrumb) - 1)
        <li aria-current="page">
          <div class="flex items-center">
            <a href="{{ $item['link'] }}" class="inline-flex items-center text-sm sm:text-base font-medium text-gray-900 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-4 h-4 me-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
              {{ $item['name'] }}
            </a>
          </div>
        </li>
      @else
        <li>
          <div class="flex items-center text-gray-900 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-4 h-4 me-2">
              <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
            <span class="text-sm sm:text-base font-medium text-gray-700 hover:text-gray-900 md:ms-2 dark:text-gray-400 dark:hover:text-gray-300">{{ $item['name'] }}</span>
          </div>
        </li>
      @endif
    @endforeach
  </ol>
</nav>
