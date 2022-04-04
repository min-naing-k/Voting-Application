<div
  x-data="{ open: false }"
  x-show="open"
  @keydown.escape.window="
    open = false;
    $wire.clearError()
  "
  @open-edit-modal.window="open = true"
  x-init="
    Livewire.on('ideaWasUpdated', function() {
      open = false;
    });
  "
  class="modal-container fixed z-10 inset-0 overflow-y-hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
  style="display: none;">
  <div class="flex items-end justify-center min-h-screen">
    {{-- Overlay --}}
    <div
      x-show="open"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
    </div>
    {{-- Modal --}}
    <div
      x-show="open"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="transform translate-y-full opacity-0"
      x-transition:enter-end="transform translate-y-0 opacity-100"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="transform translate-y-0 opacity-100"
      x-transition:leave-end="transform translate-y-full opacity-0"
      class="modal bg-white rounded-tl-xl rounded-tr-xl overflow-hidden transform transition-all py-4 sm:max-w-lg sm:w-full">
      <div class="absolute top-0 right-0 pt-4 pr-4">
        <button
          @click="open = false; $wire.clearError()"
          class="text-gray-400 hover:text-gray-500">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="bg-white px-4 pt-5">
        <h3 class="text-center text-lg font-medium text-gray-900">Edit Idea</h3>
        <p class="text-xs text-center leading-5 text-gray-500 px-6 my-4">You have one hour to edit your idea from the time you created it.</p>

        <form wire:submit.prevent="updateIdea" action="#" method="POST" class="space-y-4 pb-5">
          <div>
            <input wire:model="title" type="text"
              class="text-sm w-full border border-gray-200 bg-gray-100 rounded-md placeholder:text-gray-900 px-4 py-2 focus:border-blue transition duration-100 ease-in"
              placeholder="Your Idea" />
            @error('title')
              <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <select wire:model.defer="category_id" name="category_id" id="category_id"
              class="w-full bg-gray-100 text-sm px-4 py-2 rounded-md transition duration-100 ease-in border border-gray-200 first-letter:border-gray-200 foucs:border-blue">
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            @error('category_id')
              <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <textarea wire:model="description" name="description" id="description" cols="30" rows="4"
              class="text-sm w-full border border-gray-200 bg-gray-100 rounded-md placeholder:text-gray-900 px-4 py-2 focus:border-blue transition duration-100 ease-in"
              placeholder="Descripe your idea..."></textarea>
            @error('description')
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
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div> <!-- end modal -->
  </div>
</div>
