<x-app-layout>
  <x-slot name="title">
    {{ $idea->title }}
  </x-slot>
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

  <livewire:idea-comments :idea="$idea" />

  @push('modals')
    <x-idea-modals :idea="$idea" />

    <livewire:edit-comment />

    <livewire:delete-comment />

    <livewire:mark-comment-as-spam />

    <livewire:reset-comment-spam-reports />
  @endpush

  <x-notification />

  @push('script')
    <script>
      // scroll to top when click one of pagination links
      Livewire.hook('message.processed', function(message, component) {
        if (['gotoPage', 'nextPage', 'previousPage'].includes(message.updateQueue[0].method)) {
          const button_container = document.querySelector('.buttons-container');
          button_container.scrollIntoView({
            behavior: 'smooth'
          });
        }
      });

      // scroll to comment when created
      window.addEventListener('comment-was-created', function(event) {
        const last_comment = document.querySelector('.comment-container:last-child');
        scrollTo(last_comment);
      });

      // scroll to comment when user click notification link
      @if (session('scrollToComment'))
        const comment = document.querySelector('#comment-{{ session('scrollToComment') }}');
        scrollTo(comment);
      @endif

      function scrollTo(element) {
        element.scrollIntoView({
          behavior: 'smooth'
        });
        element.classList.add('!border-green-300');
        setTimeout(() => {
          element.classList.remove('!border-green-300');
        }, 5000);
      }

      // Livewire.hook('message.processed', function(message, component) {
      //   if (message.updateQueue[0].payload.event === 'commentWasCreated' && message.component.fingerprint.name === 'idea-comments') {
      //     const last_comment = document.querySelector('.comment-container:last-child');
      //     last_comment.scrollIntoView({
      //       behavior: 'smooth'
      //     });
      //     last_comment.classList.add('border-green-300');
      //     setTimeout(() => {
      //       last_comment.classList.remove('border-green-300');
      //     }, 5000);
      //   }
      // });
    </script>
  @endpush

</x-app-layout>
