<div
  x-data="{ target: null, ignore: ['button', 'svg', 'path', 'a'] }"
  @click="
    target = $event.target.tagName.toLowerCase();
    if(!ignore.includes(target)) {
      $event.target.closest('.idea-container').querySelector('.idea-link').click();
    }
  "
  class="idea-container bg-white flex rounded-lg shadow cursor-pointer hover:shadow-card transition duration-150 ease-in">
  <div class="hidden md:flex flex-col justify-between border-r border-gray-100 px-5 py-8">
    <div class="text-center">
      <div class="font-semibold text-2xl @if ($hasVoted) text-v-blue @endif">{{ $votesCount }}</div>
      <div class="text-gray-500">Votes</div>
    </div>
    <div class="mt-8">
      {{-- Desktop --}}
      @if ($hasVoted)
        <button wire:click.prevent="vote" class="w-20 bg-v-blue text-white font-bold text-xxs uppercase rounded-md shadow-sm px-4 py-3
          hover:bg-v-blue-hover transition duration-150 ease-in">
          Voted
        </button>
      @else
        <button wire:click.prevent="vote" class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-md shadow-sm px-4 py-3 border 
          hover:border-gray-300 transition duration-150 ease-in">
          Vote
        </button>
      @endif
    </div>
  </div>
  <div class="flex flex-col md:flex-row flex-1 px-3 py-3 md:px-2 md:py-6">
    <div class="flex items-center md:items-start flex-shrink-0">
      <a href="#" class="flex-shrink-0">
        <img src="{{ $idea->user->getAvator() }}" alt="" class="w-14 h-14 rounded-md">
      </a>
      <h4 class="md:hidden ml-3 text-xl font-semibold">
        <a href="{{ route('idea.show', $idea) }}" class="idea-link hover:underline">{{ $idea->title }}</a>
      </h4>
    </div>
    <div class="md:mx-4 flex flex-col justify-between flex-1">
      <div>
        <h4 class="hidden md:block text-xl font-semibold">
          <a href="{{ route('idea.show', $idea) }}" class="hover:underline">{{ $idea->title }}</a>
        </h4>
        <div class="text-gray-600 mt-3 line-clamp-3">
          {{ $idea->description }}
        </div>
      </div>
      <div class="flex flex-col md:flex-row md:items-center justify-between mt-2 md:mt-6">
        <div class="flex items-center text-xs font-semibold space-x-1 md:space-x-2 text-gray-400">
          <div>{{ $idea->created_at->diffForHumans() }}</div>
          <div>&bull;</div>
          <div>{{ $idea->category->name }}</div>
          <div>&bull;</div>
          <div class="text-gray-900">3 Comments</div>
        </div>
        <div class="flex items-center justify-between space-x-2 mt-8 md:mt-0">
          <div class="flex items-center md:hidden">
            <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
              <div
                class="text-sm font-bold leading-none @if ($hasVoted) text-v-blue @endif">{{ $votesCount }}</div>
              <div class="text-xxs font-semibold text-gray-400 leading-none">Votes</div>
            </div>
            {{-- Mobile --}}
            @if ($hasVoted)
              <button type="button"
                wire:click.prevent="vote"
                class="w-20 h-10 bg-v-blue text-white font-bold text-xxs 
                  uppercase rounded-xl hover:bg-v-blue-hover transition duration-150 ease-in px-3 py-2 -mx-6">
                Voted
              </button>
            @else
              <button type="button"
                wire:click.prevent="vote"
                class="w-20 h-10 bg-gray-200 border border-gray-200 font-bold text-xxs 
                  uppercase rounded-xl hover:border-gray-300 transition duration-150 ease-in px-3 py-2 -mx-6">
                Vote
              </button>
            @endif
          </div>

          <div class="flex items-center space-x-2">
            <div
              class="{{ Str::kebab($idea->status->name) }} flex items-center justify-center text-xxs font-bold uppercase w-28 h-7 leading-none rounded-lg
                text-center py-2 px-4">
              {{ $idea->status->name }}
            </div>
            <x-dropdown alignmentClasses="origin-top-right right-0 md:origin-top-left md:left-0">
              <x-slot name="trigger">
                <button
                  class="relative bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center h-7
                      transition duration-150 ease-in py-2 px-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                  </svg>
                </button>
              </x-slot>
              <x-slot name="content">
                <x-dropdown-link href="#">Mark as spam</x-dropdown-link>
                <x-dropdown-link href="#">Mark as delete</x-dropdown-link>
              </x-slot>
            </x-dropdown>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Idea Container -->
