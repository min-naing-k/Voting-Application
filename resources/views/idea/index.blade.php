<x-app-layout>
  <livewire:ideas-index />

  <!-- Mobile Create Idea Form -->
  <div class="md:hidden fixed bottom-5 right-5 z-50">
    <x-dialog
      alignmentClasses="origin-bottom-right -top-104 -right-2.25"
      width="w-88">
      <x-slot name="trigger">
        <button type="button"
          class="flex items-center justify-center w-36 h-12 text-sm bg-v-blue text-white
                   font-semibold rounded-full hover:bg-v-blue-hover transition duration-150 ease-in">
          <svg class="h-5 w-5 -ml-1 text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
          </svg>
          <span class="ml-1">Add an idea</span>
        </button>
      </x-slot>
      <x-slot name="content">
        <div class="text-center mb-4">
          <h3 class="font-semibold text-base">Add an idea</h3>
          <p class="text-xs mt-2">
            Let us know what you would like and we'll take a look over!
          </p>
        </div>
        <form action="#" method="POST" class="space-y-4">
          <div>
            <input type="text" class="text-sm w-full border border-gray-200 bg-gray-100 rounded-md placeholder:text-gray-900 px-4 py-2 focus:border-blue transition duration-100 ease-in"
              placeholder="Your Idea" />
          </div>

          <div>
            <select name="add_category" id="add_category"
              class="w-full bg-gray-100 text-sm px-4 py-2 rounded-md transition duration-100 ease-in border 
                   border-gray-200 foucs:border-blue">
              <option value="">Choose Category</option>
              <option value="category_one">Category One</option>
              <option value="category_two">Category Two</option>
              <option value="category_three">Category Three</option>
            </select>
          </div>

          <div>
            <textarea name="idea" id="idea" cols="30" rows="4"
              class="text-sm w-full border border-gray-200 bg-gray-100 rounded-md placeholder:text-gray-900 px-4 py-2 focus:border-blue transition duration-100 ease-in"
              placeholder="Descripe your idea..."></textarea>
          </div>

          <div class="flex items-center justify-between space-x-3">
            <button type="button"
              class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 
            font-semibold rounded-md border border-gray-200 hover:border-gray-300 transition duration-150 ease-in">
              <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
              </svg>
              <span class="ml-1">Attach</span>
            </button>
            <button type="button"
              class="flex items-center justify-center w-1/2 h-11 text-xs bg-v-blue text-white 
            font-semibold rounded-md hover:bg-v-blue-hover transition duration-150 ease-in">
              Submit
            </button>
          </div>
        </form>
      </x-slot>
    </x-dialog>
  </div>
</x-app-layout>
