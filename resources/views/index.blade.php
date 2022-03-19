<x-app-layout>
  <x-slot name="style">
    <style>
      .idea-container:last-of-type {
        margin-bottom: 5rem !important;
      }

    </style>
  </x-slot>

  <div class="flex items-center space-x-4">
    <div class="w-1/3">
      <select name="category" id="category" class="w-full rounded-md shadow transition duration-100 ease-in border 
      border-transparent foucs:border-blue">
        <option value="">All</option>
        <option value="category_one">Category One</option>
        <option value="category_two">Category Two</option>
        <option value="category_three">Category Three</option>
      </select>
    </div>
    <div class="w-1/3">
      <select name="other_filters" id="other_filters" class="w-full rounded-md shadow transition duration-100 ease-in 
      border border-transparent foucs:border-blue">
        <option value="">Other Filter</option>
        <option value="other_filter_one">Other filter One</option>
        <option value="other_filter_two">Other filter Two</option>
        <option value="other_filter_three">Other filter Threee</option>
      </select>
    </div>
    <div class="w-2/3 relative">
      <input type="search"
        class="w-full border border-transparent pl-8 py-2 pr-4 shadow rounded-md
       placeholder:text-gray-900 focus:placeholder:text-gray-400 focus:border-blue transition duration-100 ease-in"
        placeholder="Find an idea">
      <img src="{{ asset('images/search.png') }}" alt="search-icon" class="w-4 absolute top-1/2 left-2 -translate-y-1/2" />
    </div>
  </div> <!-- End Filter -->

  <div class="ideas-container space-y-6 my-6">
    <div class="idea-container bg-white flex rounded-lg shadow cursor-pointer hover:shadow-card transition duration-150 ease-in">
      <div class="border-r border-gray-100 px-5 py-8 flex flex-col justify-between">
        <div class="text-center">
          <div class="font-semibold text-2xl">12</div>
          <div class="text-gray-500">Votes</div>
        </div>

        <div class="mt-8">
          <button class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-md shadow-sm px-4 py-3 border 
          hover:border-gray-300 transition duration-150 ease-in">
            Vote
          </button>
        </div>
      </div>
      <div class="flex px-2 py-6">
        <a href="#" class="flex-shrink-0">
          <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="" class="w-14 h-14 rounded-md">
        </a>
        <div class="mx-4">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title will go here</a>
          </h4>
          <div class="text-gray-600 mt-3 line-clamp-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque sapiente atque enim perferendis voluptas
            tempore, ratione laborum voluptates tenetur aliquam facilis omnis dolorem. Tenetur facilis sit quae et eaque,
            ea necessitatibus consequuntur, nemo natus ad rem aliquam mollitia soluta optio, in rerum? Iure sint enim
            voluptas fuga cumque suscipit voluptatum fugit incidunt numquam? Voluptates modi beatae esse quae aspernatur
            libero corrupti? Suscipit, incidunt quia ipsum doloribus doloremque distinctio. Architecto quam vel aliquam
            voluptate ipsam sit doloribus dignissimos asperiores quasi in quos maxime nobis sapiente, eveniet nesciunt
            velit? Voluptates nulla beatae sapiente quis, harum alias doloribus optio cupiditate, vitae iusto quisquam?
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
              <div>10 hours ago</div>
              <div>&bull;</div>
              <div>Category One</div>
              <div>&bull;</div>
              <div class="text-gray-900">3 comments</div>
            </div>
            <div class="flex items-center space-x-2">
              <div class="bg-gray-200 text-xxs font-bold uppercase w-28 h-7 leading-none rounded-lg 
              text-center py-2 px-4">
                Open
              </div>
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center h-7 transition duration-150 ease-in py-2 
              px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>

                <ul class="absolute -left-7.5 top-6 w-44 font-semibold bg-white shadow-dialog rounded-xl py-1 text-left ml-8">
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as delete</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End Idea Container -->

    <div class="idea-container bg-white flex rounded-lg shadow">
      <div class="border-r border-gray-100 px-5 py-8 flex flex-col justify-between">
        <div class="text-center">
          <div class="font-semibold text-2xl text-blue">16</div>
          <div class="text-gray-500">Votes</div>
        </div>

        <div class="mt-8">
          <button class="w-20 bg-blue text-white font-bold text-xxs uppercase rounded-md shadow-sm px-4 py-3 border 
          hover:border-gray-300 transition duration-150 ease-in">
            Voted
          </button>
        </div>
      </div>
      <div class="flex px-2 py-6">
        <a href="#" class="flex-shrink-0">
          <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="" class="w-14 h-14 rounded-md">
        </a>
        <div class="mx-4">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title will go here</a>
          </h4>
          <div class="text-gray-600 mt-3 line-clamp-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque sapiente atque enim perferendis voluptas
            tempore, ratione laborum voluptates tenetur aliquam facilis omnis dolorem. Tenetur facilis sit quae et eaque,
            ea necessitatibus consequuntur, nemo natus ad rem aliquam mollitia soluta optio, in rerum? Iure sint enim
            voluptas fuga cumque suscipit voluptatum fugit incidunt numquam? Voluptates modi beatae esse quae aspernatur
            libero corrupti? Suscipit, incidunt quia ipsum doloribus doloremque distinctio. Architecto quam vel aliquam
            voluptate ipsam sit doloribus dignissimos asperiores quasi in quos maxime nobis sapiente, eveniet nesciunt
            velit? Voluptates nulla beatae sapiente quis, harum alias doloribus optio cupiditate, vitae iusto quisquam?
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
              <div>11 hours ago</div>
              <div>&bull;</div>
              <div>Category 2</div>
              <div>&bull;</div>
              <div class="text-gray-900">3 Comments</div>
            </div>
            <div class="flex items-center space-x-2">
              <div class="bg-yellow text-white text-xxs font-bold uppercase w-28 h-7 leading-none rounded-lg 
              text-center py-2 px-4">
                In Progress
              </div>
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center h-7 transition duration-150 ease-in py-2 
              px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>

                <ul class="absolute -left-7.5 top-6 w-44 font-semibold bg-white shadow-lg rounded-xl py-1 text-left ml-8">
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as delete</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End Idea Container -->

    <div class="idea-container bg-white flex rounded-lg shadow">
      <div class="border-r border-gray-100 px-5 py-8 flex flex-col justify-between">
        <div class="text-center">
          <div class="font-semibold text-2xl">36</div>
          <div class="text-gray-500">Votes</div>
        </div>

        <div class="mt-8">
          <button class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-md shadow-sm px-4 py-3 border 
          hover:border-gray-300 transition duration-150 ease-in">
            Vote
          </button>
        </div>
      </div>
      <div class="flex px-2 py-6">
        <a href="#" class="flex-shrink-0">
          <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="" class="w-14 h-14 rounded-md">
        </a>
        <div class="mx-4">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title will go here</a>
          </h4>
          <div class="text-gray-600 mt-3 line-clamp-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque sapiente atque enim perferendis voluptas
            tempore, ratione laborum voluptates tenetur aliquam facilis omnis dolorem. Tenetur facilis sit quae et eaque,
            ea necessitatibus consequuntur, nemo natus ad rem aliquam mollitia soluta optio, in rerum? Iure sint enim
            voluptas fuga cumque suscipit voluptatum fugit incidunt numquam? Voluptates modi beatae esse quae aspernatur
            libero corrupti? Suscipit, incidunt quia ipsum doloribus doloremque distinctio. Architecto quam vel aliquam
            voluptate ipsam sit doloribus dignissimos asperiores quasi in quos maxime nobis sapiente, eveniet nesciunt
            velit? Voluptates nulla beatae sapiente quis, harum alias doloribus optio cupiditate, vitae iusto quisquam?
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
              <div>12 hours ago</div>
              <div>&bull;</div>
              <div>Category One</div>
              <div>&bull;</div>
              <div class="text-gray-900">3 comments</div>
            </div>
            <div class="flex items-center space-x-2">
              <div class="bg-red text-white text-xxs font-bold uppercase w-28 h-7 leading-none rounded-lg 
              text-center py-2 px-4">
                Closed
              </div>
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center h-7 transition duration-150 ease-in py-2 
              px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>

                <ul class="absolute -left-7.5 top-6 w-44 font-semibold bg-white shadow-lg rounded-xl py-1 text-left ml-8">
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as delete</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End Idea Container -->

    <div class="idea-container bg-white flex rounded-lg shadow">
      <div class="border-r border-gray-100 px-5 py-8 flex flex-col justify-between">
        <div class="text-center">
          <div class="font-semibold text-2xl">12</div>
          <div class="text-gray-500">Votes</div>
        </div>

        <div class="mt-8">
          <button class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-md shadow-sm px-4 py-3 border 
          hover:border-gray-300 transition duration-150 ease-in">
            Vote
          </button>
        </div>
      </div>
      <div class="flex px-2 py-6">
        <a href="#" class="flex-shrink-0">
          <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="" class="w-14 h-14 rounded-md">
        </a>
        <div class="mx-4">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title will go here</a>
          </h4>
          <div class="text-gray-600 mt-3 line-clamp-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque sapiente atque enim perferendis voluptas
            tempore, ratione laborum voluptates tenetur aliquam facilis omnis dolorem. Tenetur facilis sit quae et eaque,
            ea necessitatibus consequuntur, nemo natus ad rem aliquam mollitia soluta optio, in rerum? Iure sint enim
            voluptas fuga cumque suscipit voluptatum fugit incidunt numquam? Voluptates modi beatae esse quae aspernatur
            libero corrupti? Suscipit, incidunt quia ipsum doloribus doloremque distinctio. Architecto quam vel aliquam
            voluptate ipsam sit doloribus dignissimos asperiores quasi in quos maxime nobis sapiente, eveniet nesciunt
            velit? Voluptates nulla beatae sapiente quis, harum alias doloribus optio cupiditate, vitae iusto quisquam?
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
              <div>10 hours ago</div>
              <div>&bull;</div>
              <div>Category One</div>
              <div>&bull;</div>
              <div class="text-gray-900">3 comments</div>
            </div>
            <div class="flex items-center space-x-2">
              <div class="bg-green text-white text-xxs font-bold uppercase w-28 h-7 leading-none rounded-lg 
              text-center py-2 px-4">
                Implemented
              </div>
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center h-7 transition duration-150 ease-in py-2 
              px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>

                <ul class="absolute -left-7.5 top-6 w-44 font-semibold bg-white shadow-lg rounded-xl py-1 text-left ml-8">
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as delete</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End Idea Container -->

    <div class="idea-container bg-white flex rounded-lg shadow">
      <div class="border-r border-gray-100 px-5 py-8 flex flex-col justify-between">
        <div class="text-center">
          <div class="font-semibold text-2xl">12</div>
          <div class="text-gray-500">Votes</div>
        </div>

        <div class="mt-8">
          <button class="w-20 bg-gray-200 font-bold text-xxs uppercase rounded-md shadow-sm px-4 py-3 border 
          hover:border-gray-300 transition duration-150 ease-in">
            Vote
          </button>
        </div>
      </div>
      <div class="flex px-2 py-6">
        <a href="#" class="flex-shrink-0">
          <img src="https://source.unsplash.com/200x200/?face&crop=face&v=5" alt="" class="w-14 h-14 rounded-md">
        </a>
        <div class="mx-4">
          <h4 class="text-xl font-semibold">
            <a href="#" class="hover:underline">A random title will go here</a>
          </h4>
          <div class="text-gray-600 mt-3 line-clamp-3">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque sapiente atque enim perferendis voluptas
            tempore, ratione laborum voluptates tenetur aliquam facilis omnis dolorem. Tenetur facilis sit quae et eaque,
            ea necessitatibus consequuntur, nemo natus ad rem aliquam mollitia soluta optio, in rerum? Iure sint enim
            voluptas fuga cumque suscipit voluptatum fugit incidunt numquam? Voluptates modi beatae esse quae aspernatur
            libero corrupti? Suscipit, incidunt quia ipsum doloribus doloremque distinctio. Architecto quam vel aliquam
            voluptate ipsam sit doloribus dignissimos asperiores quasi in quos maxime nobis sapiente, eveniet nesciunt
            velit? Voluptates nulla beatae sapiente quis, harum alias doloribus optio cupiditate, vitae iusto quisquam?
          </div>
          <div class="flex items-center justify-between mt-6">
            <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
              <div>10 hours ago</div>
              <div>&bull;</div>
              <div>Category One</div>
              <div>&bull;</div>
              <div class="text-gray-900">3 comments</div>
            </div>
            <div class="flex items-center space-x-2">
              <div class="bg-purple text-white text-xxs font-bold uppercase w-28 h-7 leading-none rounded-lg 
              text-center py-2 px-4">
                Considering
              </div>
              <button class="relative bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center h-7 transition duration-150 ease-in py-2 
              px-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                </svg>

                <ul class="absolute -left-7.5 top-6 w-44 font-semibold bg-white shadow-lg rounded-xl py-1 text-left ml-8">
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                  <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as delete</a></li>
                </ul>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- End Idea Container -->
  </div> <!-- End Ideas Container -->
</x-app-layout>
