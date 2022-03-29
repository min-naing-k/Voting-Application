<div class="idea-container-button-container">
  <div class="idea-container bg-white flex rounded-lg shadow mt-4 px-3 py-3 md:py-4 md:px-4">
    <div class="flex flex-col md:flex-row flex-1 md:px-2 md:py-6">
      <div class="flex items-center md:items-start flex-shrink-0">
        <a href="#" class="flex-shrink-0">
          <img src="{{ $idea->user->getAvator() }}" alt="" class="w-14 h-14 rounded-md">
        </a>
        <h4 class="md:hidden ml-3 text-xl font-semibold">
          <a href="#" class="hover:underline">{{ $idea->title }}</a>
        </h4>
      </div>
      <div class="md:ml-4 flex-1">
        <h4 class="hidden md:block text-xl font-semibold">
          {{ $idea->title }}
        </h4>
        <div class="text-gray-600 mt-3">
          {{ $idea->description }}
        </div>
        <div class="flex flex-col md:flex-row md:items-center justify-between mt-3 md:mt-6">
          <div class="flex items-center text-xs font-semibold space-x-1 md:space-x-2 text-gray-400">
            <div class="hidden md:inline-block font-bold text-gray-900">{{ $idea->user_id === auth()->id() ? 'You' : $idea->user->name }}</div>
            <div class="hidden md:inline-block">&bull;</div>
            <div>{{ $idea->created_at->diffForHumans() }}</div>
            <div>&bull;</div>
            <div>{{ $idea->category->name }}</div>
            <div>&bull;</div>
            <div class="text-gray-900">3 Comments</div>
          </div>
          <div class="flex items-center justify-between space-x-2 mt-8 md:mt-0">
            <div class="flex items-center md:hidden">
              <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                <div class="text-sm font-bold leading-none @if ($hasVoted) text-v-blue @endif">{{ $votesCount }}</div>
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
              <div class="{{ Str::kebab($idea->status->name) }} flex items-center justify-center text-xxs font-bold uppercase w-28 h-7 rounded-lg
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
  </div> <!-- End Idea Container -->

  <div class="buttons-container flex items-center justify-end md:justify-between mt-6">
    <div class="flex items-center md:space-x-3 md:ml-6">
      <x-dialog
        class="hidden md:block"
        align="left"
        width="w-104">
        <x-slot name="trigger">
          <button type="button"
            class="flex items-center justify-center w-32 h-11 text-xs bg-v-blue text-white
              font-semibold rounded-md hover:bg-v-blue-hover transition duration-150 ease-in">
            Reply
          </button>
        </x-slot>
        <x-slot name="content">
          <form action="#" method="POST" class="space-y-4">
            <div>
              <textarea name="post_comment" id="post_comment" cols="30" rows="4"
                class="w-full text-sm bg-gray-100 rounded-md placeholder:text-gray-400 
              border border-gray-200 foucs:border-blue transition duration-150 ease-in px-4 py-2"
                placeholder="Go ahead, don't be shy. Share your thoughts..."></textarea>
            </div>
            <div class="flex items-center space-x-3">
              <button type="button" @click="open = false"
                class="flex items-center justify-center w-1/2 h-11 text-xs bg-v-blue text-white
              font-semibold rounded-md hover:bg-v-blue-hover transition duration-150 ease-in">
                Post Comment
              </button>
              <button type="button" @click="open = false"
                class="flex items-center justify-center w-32 h-11 text-xs bg-gray-200 
            font-semibold rounded-md border border-gray-200 hover:border-gray-300 transition duration-150 ease-in">
                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
                <span class="ml-1">Attach</span>
              </button>
            </div>
          </form>
        </x-slot>
      </x-dialog>
      @can('change status')
        <livewire:set-status :idea="$idea" />
      @endcan
    </div>
    <div class="hidden md:flex items-center space-x-3">
      <div class="bg-white text-center px-3 py-2 font-semibold rounded-lg shadow-sm">
        <div class="text-xl leading-snug {{ $hasVoted ? 'text-v-blue' : '' }}">{{ $votesCount }}</div>
        <div class="text-gray-400 text-xs leading-none">Votes</div>
      </div>
      <div>
        {{-- Desktop --}}
        @if ($hasVoted)
          <button type="button"
            wire:click.prevent="vote"
            class="flex items-center justify-center w-36 h-11 text-xs bg-v-blue text-white
            font-semibold rounded-md uppercase hover:bg-v-blue-hover transition duration-150 ease-in">
            Voted
          </button>
        @else
          <button type="button"
            wire:click.prevent="vote"
            class="flex items-center justify-center w-36 h-11 text-xs bg-gray-200 
            font-semibold rounded-md uppercase border border-gray-200 hover:border-gray-300 transition duration-150 ease-in">
            Vote
          </button>
        @endif
      </div>
    </div>
  </div> <!-- End Button Container -->
</div>
