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

  {{ $style ?? null }}
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
      Form goes here Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt incidunt, doloremque natus eius, sed 
      quas exercitationem hic accusantium molestias distinctio et earum est ad
      possimus repellat culpa expedita odit quasi temporibus similique ullam, voluptates magni dolore. Error sed assumenda 
      aliquam cumque, nulla alias voluptatibus aperiam, molestias id est molestiae
      ullam?
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
