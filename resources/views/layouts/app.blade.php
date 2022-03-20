<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans text-gray-900 bg-gray-background text-sm">
  <nav class="bg-white shadow-sm">
    <header class="container mx-auto flex items-center justify-between px-4 py-4">
      <a href="#">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-11" />
      </a>
      <div class="flex items-center">
        @if (Route::has('login'))
          <div class="px-6 py-4">
            @auth
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();this.closest('form').submit();">
                  {{ __('Log Out') }}
                </a>
              </form>
            @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 
                underline">Register</a>
              @endif
            @endauth
          </div>
        @endif
        <a href="#">
          <img src="https://ui-avatars.com/api/?font-size=0.4&size=50&name=guest" alt="avator" class="w-10 h-10 
          rounded-full" />
        </a>
      </div>
    </header>
  </nav>

  <main class="container mx-auto flex p-4 max-w-custom">
    <div class="w-70 mr-5">
      <div class="bg-white border-2 rounded-lg mt-16 shadow"
        style="border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
              border-image-slice: 1;
              background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
              background-origin: border-box;
              background-clip: content-box, border-box;">
        <div class="text-center px-6 py-2 pt-6">
          <h3 class="font-semibold text-base">Add an idea</h3>
          <p class="text-xs mt-4">
            Let us know what you would like and we'll take a look over!
          </p>
        </div>
        <form action="#" method="POST" class="space-y-4 px-4 py-6">
          <div>
            <input type="text" class="text-sm w-full border border-gray-200 bg-gray-100 rounded-md placeholder:text-gray-900 px-4 py-2 focus:border-blue transition duration-100 ease-in"
              placeholder="Your Idea" />
          </div>

          <div>
            <select name="add_category" id="add_category" class="w-full bg-gray-100 text-sm px-4 py-2 rounded-md transition duration-100 ease-in border 
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
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
              </svg>
              <span class="ml-1">Attach</span>
            </button>
            <button type="button"
              class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue text-white 
            font-semibold rounded-md hover:bg-blue-hover transition duration-150 ease-in">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="w-175">
      <nav class="flex items-center justify-between text-xs">
        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
          <li><a href="#" class="border-b-4 pb-3 border-blue">All Ideas (87)</a></li>
          <li><a href="#" class="border-b-4 pb-3 text-gray-400 transition duration-150 ease-in hover:text-gray-900
            hover:border-blue">Considering (6)</a></li>
          <li><a href="#" class="border-b-4 pb-3 text-gray-400 transition duration-150 ease-in hover:text-gray-900 
            hover:border-blue">In Progress (1)</a></li>
        </ul>

        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
          <li><a href="#" class="border-b-4 pb-3 text-gray-400 transition duration-150 ease-in hover:text-gray-900
            hover:border-blue">Imcompleted (10)</a></li>
          <li><a href="#" class="
            border-b-4 pb-3 text-gray-400 transition duration-150 ease-in hover:text-gray-900
            hover:border-blue">Closed (55)</a></li>
        </ul>
      </nav>

      <div class="mt-8">
        {{ $slot }}
      </div>
    </div>
  </main>
</body>

</html>
