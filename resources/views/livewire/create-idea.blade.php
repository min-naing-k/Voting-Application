@auth
  <form wire:submit.prevent="createIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
    <div>
      <input wire:model.defer="title" type="text"
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
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
      @error('category_id')
        <p class="mt-1 text-red-500 text-xs">{{ $message }}</p>
      @enderror
    </div>

    <div>
      <textarea wire:model.defer="description" name="description" id="description" cols="30" rows="4"
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
@else
  <div class="my-6 px-4 flex gap-3">
    <x-button-link
      wire:click.prevent="redirectToLogin"
      href="{{ route('login') }}"
      class="bg-v-blue text-white w-1/2 h-11 hover:bg-v-blue-hover">
      Login
    </x-button-link>

    <x-button-link
      wire:click.prevent="redirectToRegister"
      href="{{ route('register') }}"
      class="bg-gray-100 w-1/2 h-11 hover:border-gray-300">
      Sign up
    </x-button-link>
  </div>
@endauth
