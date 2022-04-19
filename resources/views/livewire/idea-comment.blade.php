<div
  x-data="{ lastComment: false }"
  id="comment-{{ $comment->id }}"
  class="comment-container @if($comment->is_status_update) is-status-update {{ 'status-' . $comment->status->slug }} @endif relative bg-white flex rounded-lg shadow mt-4 border border-transparent transition ease-in duration-500">
  <div class="flex flex-1 px-4 py-6">
    <div class="flex-shrink-0">
      <a href="#">
        <img src="{{ $comment->user->getAvator() }}" alt="" class="w-14 h-14 rounded-md">
        @if ($comment->user->hasRole('admin'))
        <span class="text-v-blue font-bold uppercase text-xxs text-center block mt-1">Admin</span>
        @endif
      </a>
    </div>
    <div class="ml-4 flex-1">
      @if ($comment->is_status_update)
      <h4 class="text-xl font-semibold">
        Status Changed to "{{ $comment->status->name }}"
      </h4>
      @endif
      <div class="text-gray-600 mt-3">
        {{ $comment->body }}
      </div>
      <div class="flex items-center justify-between mt-6">
        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
          <div>
            <abbr title="like">
              <button class="bg-gray-100 text-gray-300 border px-2 py-1 rounded-xl hover:border-gray-300 transition ease-in duration-150">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
              </button>
            </abbr>
          </div>
          <div class="font-bold {{$comment->is_status_update ? 'text-v-blue' : 'text-gray-900'}}">{{ $comment->user->name }}</div>
          <div>&bull;</div>
          @if ($comment->user_id === $comment->idea->user_id)
            <abbr
              class="py-1 px-3 bg-gray-100 rounded-full text-gray-400 text-xs border hover:border-gray-300 
                transition ease-in duration-150 cursor-pointer no-underline"
              title="Original Poster">OP</abbr>
            <div>&bull;</div>
          @endif
          <div>{{ $comment->created_at->diffForHumans() }}</div>
          @admin
          @if ($comment->spam_reports > 0)
          <div class="text-v-red">(Reports: {{ $comment->spam_reports }})</div>              
          @endif
          @endadmin
        </div>
        <div class="flex items-center">
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
                @can('update', $comment)
                  <button
                    @click.prevent="
                              Livewire.emit('editSetComment', {{ $comment->id }});
                            "
                    type="button"
                    class="hover:bg-gray-100 px-5 py-3 block w-full text-left font-semibold transition duration-150 ease-in">
                    Edit a comment
                  </button>
                @endcan
                @can('delete', $comment)
                  <button
                    @click.prevent="
                      if(!document.querySelector('.comment-container:first-child').nextElementSibling) {
                        lastComment = true;
                      }
                      Livewire.emit('deleteSetComment', { lastComment: lastComment, commentId: {{ $comment->id }} });
                    "
                    type="button"
                    class="hover:bg-gray-100 px-5 py-3 block w-full text-left font-semibold transition duration-150 ease-in">
                    Delete a comment
                  </button>
                @endcan
                <button
                  @click.prevent="
                    Livewire.emit('setCommentAsSpam', {{ $comment->id }});
                  "
                  type="button"
                  class="hover:bg-gray-100 px-5 py-3 block w-full text-left font-semibold transition duration-150 ease-in">
                  Report
                </button>
                @admin
                @if ($comment->spam_reports > 0)
                  <button
                    @click.prevent="
                      Livewire.emit('setResetCommentReports', {{ $comment->id }});
                    "
                    type="button"
                    class="hover:bg-gray-100 px-5 py-3 block w-full text-left font-semibold transition duration-150 ease-in">
                    Reset reports
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
