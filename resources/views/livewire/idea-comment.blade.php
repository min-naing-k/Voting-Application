<div class="comment-container relative bg-white flex rounded-lg shadow mt-4">
  <div class="flex flex-1 px-4 py-6">
    <div class="flex-shrink-0">
      <a href="#">
        <img src="{{ $comment->user->getAvator() }}" alt="" class="w-14 h-14 rounded-md">
      </a>
    </div>
    <div class="ml-4 flex-1">
      <div class="text-gray-600 mt-3 line-clamp-3">
        {{ $comment->body }}
      </div>
      <div class="flex items-center justify-between mt-6">
        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
          <div class="font-bold text-gray-900">{{ $comment->user->name }}</div>
          <div>&bull;</div>
          @if ($comment->user_id === $comment->idea->user_id)
            <abbr
              class="py-1 px-3 bg-gray-100 rounded-full text-gray-400 text-xs border hover:border-gray-300 
                transition ease-in duration-150 cursor-pointer no-underline"
              title="Original Poster">OP</abbr>
            <div>&bull;</div>
          @endif
          <div>{{ $comment->created_at->diffForHumans() }}</div>
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
