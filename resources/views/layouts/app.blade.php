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

  @livewireStyles
</head>

<body class="font-sans text-gray-900 bg-gray-background text-sm">
  <nav class="bg-white shadow-sm">
    <header class="container mx-auto flex items-center justify-between px-2 py-4 md:px-4">
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
        @auth
          <a href="#">
            <img src="{{ auth()->user()->getAvator() }}" alt="avator" class="w-10 h-10 rounded-full" />
          </a>
        @endauth
      </div>
    </header>
  </nav>

  <main class="container mx-auto flex flex-col md:flex-row px-2 py-4 md:px-4 max-w-custom">
    <div class="hidden md:block w-70 mr-5">
      <div class="bg-white border-2 rounded-lg md:mt-16 shadow md:sticky top-8"
        style="border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
              border-image-slice: 1;
              background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
              background-origin: border-box;
              background-clip: content-box, border-box;">
        <div class="text-center px-6 py-2 pt-6">
          <h3 class="font-semibold text-base">Add an idea</h3>
          <p class="text-xs mt-4">
            @auth
              Let us know what you would like and we'll take a look over!
            @else
              Please Login to create and idea
            @endauth
          </p>
        </div>
        @auth
          <livewire:create-idea />
        @else
          <div class="my-6 px-4 flex gap-3">
            <x-button-link href="{{ route('login') }}" class="bg-v-blue text-white hover:bg-v-blue-hover border-none">Login</x-button-link>

            <x-button-link href="{{ route('register') }}">Sign up</x-button-link>
          </div>
        @endauth
      </div>
    </div>
    <div class="w-full md:w-175">
      <nav class="hidden md:flex items-center justify-between text-xs">
        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
          <li><a href="#" class="border-b-4 pb-3 border-v-blue">All Ideas (87)</a></li>
          <li><a href="#" class="border-b-4 pb-3 text-gray-400 transition duration-150 ease-in hover:text-gray-900
            hover:border-v-blue">Considering (6)</a></li>
          <li><a href="#" class="border-b-4 pb-3 text-gray-400 transition duration-150 ease-in hover:text-gray-900 
            hover:border-v-blue">In Progress (1)</a></li>
        </ul>

        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
          <li><a href="#" class="border-b-4 pb-3 text-gray-400 transition duration-150 ease-in hover:text-gray-900
            hover:border-v-blue">Imcompleted (10)</a></li>
          <li><a href="#" class="
            border-b-4 pb-3 text-gray-400 transition duration-150 ease-in hover:text-gray-900
            hover:border-v-blue">Closed (55)</a></li>
        </ul>
      </nav>

      <div class="md:mt-8">
        {{ $slot }}
      </div>
    </div>
  </main>

  @livewireScripts
</body>

</html>
