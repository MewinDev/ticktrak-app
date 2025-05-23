@props([
    'candidate' => '',
])

<article class="w-full bg-white border border-blue-100 rounded-lg shadow-lg hover:shadow-gray-300 dark:hover:shadow-gray-700 dark:bg-gray-800 dark:border-gray-700 zoom-in p-3">
    <a href="{{ $attributes->get('href') }}" class="group relative overflow-hidden w-full rounded-lg transition">
        <div class="absolute py-1 px-3 -left-5 -top-5 -rotate-[10deg] border border-white black_border bg-blue-500 text-white font-bold">
            Vote #{{ $candidate->can_ballot_number }}
        </div>
        <img src="https://randomuser.me/api/portraits/men/{{ rand(1, 99) }}.jpg" class="w-full"/>
    </a>
    <div class="text-white text-left mt-4">
        <h5 class="text-base md:text-lg text-gray-900 dark:text-white tracking-wide font-bold">{{ $candidate->can_firstname . " ". $candidate->can_lastname }}</h5>
        <span class="text-sm md:text-base text-gray-700 dark:text-gray-400 capitalize">{{ $candidate->position->pos_name }} Candidates</span>
    </div>
</article>
