<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title ?? 'Voting App' }}</title>

  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">

  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>

  @livewireStyles
</head>

<body class="font-sans text-gray-900 bg-gray-background text-sm min-h-screen">
  <nav class="bg-white shadow-sm">
    <header class="container mx-auto flex items-center justify-between px-2 py-4 md:px-4">
      <a href="#">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-11" />
      </a>
      <div class="flex items-center">
        @if (Route::has('login'))
          <div class="flex items-center space-x-4 px-6 py-4">
            <livewire:auth />

            @auth
              <livewire:comment-notifications />
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

        <livewire:create-idea />
      </div>
    </div>
    <div class="w-full md:w-175">
      <livewire:status-filter />

      <div class="md:mt-8">
        {{ $slot }}
      </div>
    </div>
  </main>

  @if (session('success'))
    <x-notification
      :redirect="true"
      type="success"
      messageToShow="{{ session('success') }}" />
  @endif

  @if (session('error'))
    <x-notification
      :redirect="true"
      type="error"
      messageToShow="{{ session('error') }}" />
  @endif

  @if (session('warning'))
    <x-notification
      :redirect="true"
      type="warning"
      messageToShow="{{ session('warning') }}" />
  @endif

  @stack('modals')


  @livewireScripts

  @stack('script')
</body>

</html>
