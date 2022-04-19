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
          @admin
            @if ($idea->spam_reports > 0)
              <p class="text-red-500 text-sm font-semibold mb-2">Spam Reports: {{ $idea->spam_reports }}</p>
            @endif
          @endadmin
          {!! nl2br(e($idea->description)) !!}
        </div>
      </div>
      <div class="flex flex-col md:flex-row md:items-center justify-between mt-2 md:mt-6">
        <div class="flex items-center text-xs font-semibold space-x-1 md:space-x-2 text-gray-400">
          <div>
            <abbr title="like">
              <button wire:click.prevent="like" type="button" class="bg-gray-100 text-gray-300 border px-2 py-1 rounded-xl hover:border-gray-300 transition ease-in duration-150">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
              </button>
            </abbr>
          </div>
          <div>{{ $idea->created_at->diffForHumans() }}</div>
          <div>&bull;</div>
          <div>{{ $idea->category->name }}</div>
          <div>&bull;</div>
          <div class="text-gray-900">{{ $idea->comments_count }} comments</div>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Idea Container -->
