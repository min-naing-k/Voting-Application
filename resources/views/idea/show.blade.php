<x-app-layout>
  <div>
    <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
      <svg class="w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
      </svg>
      <span class="ml-2">All Ideas {{ $backText }}</span>
    </a>
  </div>

  <!-- Mobile Reply to Comment button -->
  <div class="md:hidden fixed bottom-5 right-5 z-10">
    <x-dialog
      alignmentClasses="origin-bottom-right -top-57 -right-2.25"
      width="w-88">
      <x-slot name="trigger">
        <button type="button"
          class="flex items-center justify-center w-36 h-12 text-sm bg-v-blue text-white
                   font-semibold rounded-full hover:bg-v-blue-hover transition duration-150 ease-in">
          Reply to idea
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
  </div>

  <livewire:idea-show
    :idea="$idea"
    :votesCount="$votesCount" />

  @push('modals')
    <x-idea-modals :idea="$idea" />
  @endpush

  <div class="comments-container relative space-y-4 md:space-y-6 md:ml-22 mb-8 mt-1 md:pt-6">
    <div class="comment-container relative bg-white flex rounded-lg shadow mt-4">
      <div class="flex flex-1 px-4 py-6">
        <div class="flex-shrink-0">
          <a href="#">
            <img src="{{ $idea->user->getAvator() }}" alt="" class="w-14 h-14 rounded-md">
          </a>
        </div>
        <div class="ml-4 flex-1">
          {{-- <h4 class="text-xl font-semibold">
            A random title will go here
          </h4> --}}
          <div class="text-gray-600 mt-3 line-clamp-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
              <div class="font-bold text-gray-900">Min Naing Kyaw</div>
              <div>&bull;</div>
              <div>10 hours ago</div>
            </div>
            <div class="flex items-center space-x-2">
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center h-7 transition duration-150 ease-in py-2
                px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>
                <ul class="hidden absolute -left-7.5 top-6 w-44 font-semibold bg-white shadow-dialog rounded-xl py-1 text-left ml-8">
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as delete</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End comment Container -->

    <div class="comment-container relative is-admin bg-white flex rounded-lg shadow mt-4">
      <div class="flex flex-1 px-4 py-6">
        <div class="flex-shrink-0">
          <a href="#">
            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="" class="w-14 h-14 rounded-md">
            <span class="text-v-blue font-bold uppercase text-xxs text-center block mt-1">Admin</span>
          </a>
        </div>
        <div class="ml-4 flex-1">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">
              Status Changed to "Under Consideration"
            </a>
          </h4>
          <div class="text-gray-600 mt-3 line-clamp-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
              <div class="font-bold text-v-blue">John Doe</div>
              <div>&bull;</div>
              <div>10 hours ago</div>
            </div>
            <div class="flex items-center space-x-2">
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center h-7 transition duration-150 ease-in py-2 
                px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>

                <ul class="hidden absolute -left-7.5 top-6 w-44 font-semibold bg-white shadow-dialog rounded-xl py-1 text-left ml-8">
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as delete</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End comment Container -->

    <div class="comment-container relative bg-white flex rounded-lg shadow mt-4">
      <div class="flex flex-1 px-4 py-6">
        <div class="flex-shrink-0">
          <a href="#">
            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="" class="w-14 h-14 rounded-md">
          </a>
        </div>
        <div class="ml-4 flex-1">
          {{-- <h4 class="text-xl font-semibold">
            A random title will go here
          </h4> --}}
          <div class="text-gray-600 mt-3 line-clamp-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
              <div class="font-bold text-gray-900">Min Naing Kyaw</div>
              <div>&bull;</div>
              <div>10 hours ago</div>
            </div>
            <div class="flex items-center space-x-2">
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center h-7 transition duration-150 ease-in py-2 
                px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>

                <ul class="hidden absolute -left-7.5 top-6 w-44 font-semibold bg-white shadow-dialog rounded-xl py-1 text-left ml-8">
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as delete</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End comment Container -->
  </div> <!-- End comments Container -->
</x-app-layout>
