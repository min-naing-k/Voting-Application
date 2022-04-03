<div class="hidden fixed z-10 inset-0 overflow-y-auto pt-4" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen">
    <!--
    Background overlay, show/hide based on modal state.
    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!--
    Modal panel, show/hide based on modal state.
    Entering: "ease-out duration-300"
      From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      To: "opacity-100 translate-y-0 sm:scale-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100 translate-y-0 sm:scale-100"
      To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
  -->
    <div class="modal bg-white rounded-tl-xl rounded-tr-xl overflow-hidden transform transition-all py-4 sm:max-w-lg sm:w-full">
      <div class="absolute top-0 right-0 pt-4 pr-4">
        <button class="text-gray-400 hover:text-gray-500">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <h3 class="text-center text-lg font-medium text-gray-900">Edit Idea</h3>
        <p class="text-xs text-center leading-5 text-gray-500 px-6 mt-4">You have one hour to edit your idea from the time you created it.</p>

        <form action="#" method="POST" class="space-y-4 px-4 py-6">
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
              <option>Choose Category</option>
              {{-- @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach --}}
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
              Submit
            </button>
          </div>
        </form>
      </div>

    </div> <!-- end modal -->
  </div>
</div>
