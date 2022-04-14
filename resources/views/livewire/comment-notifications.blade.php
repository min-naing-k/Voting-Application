<x-dialog
  align="right"
  width="w-76 sm:w-104"
  height="max-h-125"
  contentClasses="overflow-y-auto -right-11 sm:right-0">
  <x-slot name="trigger">
    <button
      wire:poll="getNotificationCount"
      wire:click.prevent="getNotifications"
      class="relative">
      <svg class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
      </svg>
      @if ($notificationCount > 0)
        <span class="bg-v-red text-white rounded-full 
            text-xxs h-5 w-5 flex items-center justify-center absolute -top-2 -right-1 border-2">
          {{ $notificationCount }}
        </span>
      @endif
    </button>
  </x-slot>

  <x-slot name="content">
    <div>
      @if ($notifications->isNotEmpty() && !$loader)
        <button
          wire:click.prevent="markAllRead"
          class="mb-2 text-sm hover:underline bg-white shadow px-4 py-2 rounded-sm">
          Mark all read
        </button>
        @foreach ($notifications as $notification)
          <div class="flex justify-between space-x-4 p-4 rounded-md hover:bg-gray-100">
            <button wire:click.prevent="markAsRead('{{ $notification->id }}')"
              class="flex items-start space-x-4 flex-1">
              <img src="{{ $notification->data['user_avator'] }}" class="w-10 h-10 rounded-md" alt="user">
              <div class="text-left">
                <span class="font-semibold">{{ $notification->data['user_name'] }}</span> <span class="text-gray-400">commented on</span>
                <span class="font-semibold">{{ $notification->data['idea_title'] }}</span>:
                <p class="line-clamp-3 text-sm text-gray-500">
                  {{ $notification->data['comment_body'] }}
                </p>
                <span class="text-xs text-gray-400">
                  {{ $notification->created_at->diffForHumans() }}
                </span>
              </div>
            </button>
            <div>
              <button class="text-gray-400">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                </svg>
              </button>
            </div>
          </div>
        @endforeach
      @elseif ($loader)
        @foreach (range(1, 3) as $item)
          <div class="flex justify-between space-x-4 p-4">
            <div class="flex items-center space-x-4 flex-1 animate-pulse">
              <div class="w-10 h-10 bg-gray-200 rounded-md"></div>
              <div class="flex-1 space-y-2">
                <div class="w-full bg-gray-200 h-2 rounded-md"></div>
                <div class="w-full bg-gray-200 h-2 rounded-md"></div>
                <div class="w-1/2 bg-gray-200 h-2 rounded-md"></div>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="mx-auto w-40 p-6">
          <img src="{{ asset('images/no-ideas.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity">
          <div class="text-gray-400 text-center font-bold mt-6">No new notifications</div>
        </div>
      @endif
    </div>
  </x-slot>
</x-dialog>
