<x-app-layout>
  <div class="flex items-center space-x-4">
    <div class="w-1/3">
      <select name="category" id="category" class="w-full border-none rounded-md shadow transition duration-150 ease-in">
        <option value="">All</option>
        <option value="category_one">Category One</option>
        <option value="category_two">Category Two</option>
        <option value="category_three">Category Three</option>
      </select>
    </div>
    <div class="w-1/3">
      <select name="other_filters" id="other_filters" class="w-full border-none rounded-md shadow transition duration-150 ease-in">
        <option value="">Other Filter</option>
        <option value="other_filter_one">Other filter One</option>
        <option value="other_filter_two">Other filter Two</option>
        <option value="other_filter_three">Other filter Threee</option>
      </select>
    </div>
    <div class="w-2/3 relative">
      <input type="search" class="w-full border-none pl-8 py-2 pr-4 shadow rounded-md
       placeholder:text-gray-900 focus:placeholder:text-gray-400 transition duration-150 ease-in" 
       placeholder="Find an idea">
      <img src="{{ asset('images/search.png') }}" alt="search-icon" class="w-4 absolute top-1/2 left-2 -translate-y-1/2" />
    </div>
  </div>
</x-app-layout>
