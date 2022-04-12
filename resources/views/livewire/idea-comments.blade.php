@if ($comments->isNotEmpty())
  <div>
    <div class="comments-container relative space-y-4 md:space-y-6 md:ml-22 mb-8 mt-1 md:pt-6">
      @foreach ($comments as $comment)
        <livewire:idea-comment
          :comment="$comment"
          :key="$comment->id" />
      @endforeach

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
      </div>
    </div>
    <div class="my-6 md:ml-22">
      {{ $comments->links('vendor.livewire.tailwind', ['result' => 'comments']) }}
    </div>
  </div>
@else
  <div class="mx-auto w-70 my-12">
    <img src="{{ asset('images/no-ideas.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity">
    <div class="text-gray-400 text-center font-bold mt-4">No Comments yet...</div>
  </div>
@endif
