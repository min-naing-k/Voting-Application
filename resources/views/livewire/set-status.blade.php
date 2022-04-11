<x-dialog
  alignmentClasses="origin-top-right right-0 md:origin-top-left md:left-0"
  width="w-76"
  event="updateStatus"
  >
  <x-slot name="trigger">
    <button type="button"
      class="flex items-center justify-center w-36 h-11 text-xs bg-gray-200
            font-semibold rounded-md border border-gray-200 hover:border-gray-300 transition duration-150 ease-in">
      <span class="ml-1">Set Status</span>
      <svg class="w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
      </svg>
    </button>
  </x-slot>
  <x-slot name="content">
    <form wire:submit.prevent="setStatus" action="#" method="POST" class="space-y-4">
      <div class="space-y-2">
        @foreach ($statuses as $status)
          <div>
            <label class="inline-flex items-center">
              <input wire:model.defer="status" type="radio" name="radio_direct"
                class="bg-gray-100 border-gray-300 {{ $status->slug . '-radio' }} focus:ring-opacity-70 transition duration-150 ease-in" 
                value="{{ $status->id }}" />
              <span class="ml-2 select-none">{{ $status->name }}</span>
            </label>
          </div>
        @endforeach
      </div>
      <div>
        <textarea name="update_comment" id="update_comment" cols="30" rows="3"
          class="w-full bg-gray-100 border-gray-200 text-sm placeholder:text-gray-400 rounded-md transition duration-150 ease-in"
          placeholder="Add an update comment (optional)"></textarea>
      </div>
      <div class="flex items-center space-x-3">
        <button type="button"
          class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 
          font-semibold rounded-md border border-gray-200 hover:border-gray-300 transition duration-150 ease-in">
          <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
          </svg>
          <span class="ml-1">Attach</span>
        </button>
        <button type="submit"
          class="flex items-center justify-center w-1/2 h-11 text-xs bg-v-blue text-white 
          font-semibold rounded-md hover:bg-v-blue-hover transition duration-150 ease-in">
          Submit
        </button>
      </div>
      <div>
        <label class="inline-flex items-center">
          <input wire:model.defer="notifyAllVoters" type="checkbox" name="notify_users" class="bg-gray-100 border-gray-200 rounded transition duration-150 ease-in" />
          <span class="ml-2 select-none">Notify all voters</span>
        </label>
      </div>
    </form>
  </x-slot>
</x-dialog>
