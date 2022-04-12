<div class="flex items-center space-x-2 md:space-x-4">
  <div class="w-1/3">
    <select wire:model="category" name="category" id="category"
      class="w-full rounded-md shadow transition duration-150 ease-in border border-transparent foucs:border-blue">
      <option value="">All Categories</option>
      @foreach ($categories as $category)
        <option value="{{ $category->slug }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>
  <div class="w-1/3">
    <select wire:model="filter" name="other_filters" id="other_filters"
      class="w-full rounded-md shadow transition duration-150 ease-in border border-transparent foucs:border-blue">
      <option value="">No Filter</option>
      <option value="top-voted">Top Voted</option>
      <option value="my-ideas">My Ideas</option>
      @admin
      <option value="spam-ideas">Spam Ideas</option>
      <option value="spam-comments">Spam Comments</option>
      @endadmin
    </select>
  </div>
  <div class="w-1/3 relative">
    <input wire:model="search" type="search"
      class="w-full border border-transparent pl-8 py-2 pr-4 shadow rounded-md
     placeholder:text-gray-900 focus:placeholder:text-gray-400 focus:border-blue transition duration-150 ease-in"
      placeholder="Find an idea">
    <img src="{{ asset('images/search.png') }}" alt="search-icon" class="w-4 absolute top-1/2 left-2 -translate-y-1/2" />
  </div>
</div> <!-- End Filter -->
