<x-modal 
  foucsElement="comment-body"
  eventToOpenModal="edit-set-comment-done"
>
  <x-slot name="modal_header">
    <h3 class="text-center text-lg font-medium text-gray-900">Edit Comment</h3>
  </x-slot>

  <x-slot name="modal_body">
    <form wire:submit.prevent="updateComment" action="#" method="POST" class="space-y-4 pb-5">
      <div>
        <textarea wire:model="body" name="body" id="body" cols="30" rows="4"
          class="comment-body text-sm w-full border border-gray-200 bg-gray-100 rounded-md placeholder:text-gray-900 px-4 py-2 focus:border-blue transition duration-100 ease-in"
          placeholder="Enter your comment..."></textarea>
        @error('body')
          <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
        @enderror
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
        <button type="submit"
          class="flex items-center justify-center w-1/2 h-11 text-xs bg-v-blue text-white 
        font-semibold rounded-md hover:bg-v-blue-hover transition duration-150 ease-in">
          Save
        </button>
      </div>
    </form>
  </x-slot>
</x-modal>
{{-- open-edit-comment-modal --}}