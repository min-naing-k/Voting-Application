<x-dialog
  align="right"
  width="w-76 sm:w-104"
  height="max-h-125"
  contentClasses="overflow-y-auto -right-11 sm:right-0">
  <x-slot name="trigger">
    <button 
    wire:click.prevent="getNotifications"
    class="relative">
      <svg class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
      </svg>
      <span class="bg-v-red text-white rounded-full 
        text-xxs h-5 w-5 flex items-center justify-center absolute -top-2 -right-1 border-2">
        9+
      </span>
    </button>
  </x-slot>

  <x-slot name="content">
    <div>
      @foreach ($notifications as $notification)
        <div class="flex justify-between space-x-4 p-4 rounded-md hover:bg-gray-100">
          <a href="{{ route('idea.show', $notification->data['idea_slug']) }}" class="flex items-center space-x-4 flex-1">
            <img src="{{ $notification->data['user_avator'] }}" class="w-10 h-10 rounded-md" alt="user">
            <div>
              <span class="font-semibold">{{ $notification->data['user_name'] }}</span> <span class="text-gray-400">commented on</span>
              <span class="font-semibold">{{ $notification->data['idea_title'] }}</span>:
              <p class="line-clamp-3 text-sm text-gray-500">
                {{ $notification->data['comment_body'] }}
              </p>
              <span class="text-xs text-gray-400">
                {{ $notification->created_at->diffForHumans() }}
              </span>
            </div>
          </a>
          <div>
            <button class="text-gray-400">
              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
              </svg>
            </button>
          </div>
        </div>
      @endforeach
    </div>
  </x-slot>
</x-dialog>
