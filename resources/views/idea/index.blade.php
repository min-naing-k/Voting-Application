<x-app-layout>
  <div class="flex items-center space-x-2 md:space-x-4">
    <div class="w-1/3">
      <select name="category" id="category" class="w-full rounded-md shadow transition duration-150 ease-in border 
      border-transparent foucs:border-blue">
        <option value="">All</option>
        <option value="category_one">Category One</option>
        <option value="category_two">Category Two</option>
        <option value="category_three">Category Three</option>
      </select>
    </div>
    <div class="w-1/3">
      <select name="other_filters" id="other_filters" class="w-full rounded-md shadow transition duration-150 ease-in 
      border border-transparent foucs:border-blue">
        <option value="">Other Filter</option>
        <option value="other_filter_one">Other filter One</option>
        <option value="other_filter_two">Other filter Two</option>
        <option value="other_filter_three">Other filter Threee</option>
      </select>
    </div>
    <div class="w-1/3 relative">
      <input type="search"
        class="w-full border border-transparent pl-8 py-2 pr-4 shadow rounded-md
       placeholder:text-gray-900 focus:placeholder:text-gray-400 focus:border-blue transition duration-150 ease-in"
        placeholder="Find an idea">
      <img src="{{ asset('images/search.png') }}" alt="search-icon" class="w-4 absolute top-1/2 left-2 -translate-y-1/2" />
    </div>
  </div> <!-- End Filter -->

  <!-- Mobile Create Idea Form -->
  <div class="md:hidden fixed bottom-5 right-5 z-50">
    <x-dialog
      alignmentClasses="origin-bottom-right -top-104 -right-2.25"
      width="w-88">
      <x-slot name="trigger">
        <button type="button"
          class="flex items-center justify-center w-36 h-12 text-sm bg-blue text-white
                 font-semibold rounded-full hover:bg-blue-hover transition duration-150 ease-in">
          <svg class="h-5 w-5 -ml-1 text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
          </svg>
          <span class="ml-1">Add an idea</span>
        </button>
      </x-slot>
      <x-slot name="content">
        <div class="text-center mb-4">
          <h3 class="font-semibold text-base">Add an idea</h3>
          <p class="text-xs mt-2">
            Let us know what you would like and we'll take a look over!
          </p>
        </div>
        <form action="#" method="POST" class="space-y-4">
          <div>
            <input type="text" class="text-sm w-full border border-gray-200 bg-gray-100 rounded-md placeholder:text-gray-900 px-4 py-2 focus:border-blue transition duration-100 ease-in"
              placeholder="Your Idea" />
          </div>

          <div>
            <select name="add_category" id="add_category"
              class="w-full bg-gray-100 text-sm px-4 py-2 rounded-md transition duration-100 ease-in border 
                 border-gray-200 foucs:border-blue">
              <option value="">Choose Category</option>
              <option value="category_one">Category One</option>
              <option value="category_two">Category Two</option>
              <option value="category_three">Category Three</option>
            </select>
          </div>

          <div>
            <textarea name="idea" id="idea" cols="30" rows="4"
              class="text-sm w-full border border-gray-200 bg-gray-100 rounded-md placeholder:text-gray-900 px-4 py-2 focus:border-blue transition duration-100 ease-in"
              placeholder="Descripe your idea..."></textarea>
          </div>

          <div class="flex items-center justify-between space-x-3">
            <button type="button"
              class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 
          font-semibold rounded-md border border-gray-200 hover:border-gray-300 transition duration-150 ease-in">
              <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
              </svg>
              <span class="ml-1">Attach</span>
            </button>
            <button type="button"
              class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue text-white 
          font-semibold rounded-md hover:bg-blue-hover transition duration-150 ease-in">
              Submit
            </button>
          </div>
        </form>
      </x-slot>
    </x-dialog>
  </div>

  <div class="ideas-container space-y-6 my-6">
    @foreach ($ideas as $idea)
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
            <div class="font-semibold text-2xl">12</div>
            <div class="text-gray-500">Votes</div>
          </div>
          <div class="mt-8">
            <button class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-md shadow-sm px-4 py-3 border 
          hover:border-gray-300 transition duration-150 ease-in">
              Vote
            </button>
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
                    <div class="text-sm font-bold leading-none">12</div>
                    <div class="text-xxs font-semibold text-gray-400 leading-none">Votes</div>
                  </div>
                  <button type="button"
                    class="w-20 h-10 bg-gray-200 border border-gray-200 font-bold text-xxs 
                  uppercase rounded-xl hover:border-gray-300 transition duration-150 ease-in px-3 py-2 -mx-6">
                    Vote
                  </button>
                </div>

                <div class="flex items-center space-x-2">
                  <div class="{{ Str::kebab($idea->status->name) }} flex items-center justify-center text-xxs font-bold uppercase w-28 h-7 leading-none rounded-lg
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
    @endforeach
  </div> <!-- End Ideas Container -->

  <div class="my-8">
    {{ $ideas->links() }}
  </div>
</x-app-layout>
