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
          @admin
          @if ($idea->spam_reports > 0)
            <p class="text-red-500 text-sm font-semibold mb-2">Spam Reports: {{ $idea->spam_reports }}</p>
          @endif
          @endadmin
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
            <div class="text-gray-900">{{ $idea->comments->count() }} comments</div>
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
              @auth
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
                    @can('update', $idea)
                      <button
                        @click.prevent="$dispatch('open-edit-modal')"
                        type="button"
                        class="hover:bg-gray-100 px-5 py-3 block w-full text-left font-semibold transition duration-150 ease-in">
                        Edit an idea
                      </button>
                    @endcan
                    @can('delete', $idea)
                      <button
                        @click.prevent="$dispatch('open-delete-modal')"
                        type="button"
                        class="hover:bg-gray-100 px-5 py-3 block w-full text-left font-semibold transition duration-150 ease-in">
                        Delete idea
                      </button>
                    @endcan
                    <button
                      @click.prevent="$dispatch('open-mark-idea-as-spam-modal')"
                      type="button"
                      class="hover:bg-gray-100 px-5 py-3 block w-full text-left font-semibold transition duration-150 ease-in">
                      Mark as spam
                    </button>
                    @admin
                    @if ($idea->spam_reports > 0)
                      <button
                        @click.prevent="$dispatch('open-reset-idea-spam-reports-modal')"
                        type="button"
                        class="hover:bg-gray-100 px-5 py-3 block w-full text-left font-semibold transition duration-150 ease-in">
                        Reset spam reports
                      </button>
                    @endif
                    @endadmin
                  </x-slot>
                </x-dropdown>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End Idea Container -->

  <div class="buttons-container flex items-center justify-end md:justify-between mt-6">
    <div class="flex items-center md:space-x-3 md:ml-6">
      <livewire:create-comment :idea="$idea" />
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
