<x-guest-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-14" />
      </a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-label for="email" :value="__('Email')" />

        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <div class="flex items-center justify-between">
          <x-label for="password" :value="__('Password')" />

          @if (Route::has('password.request'))
            <a class="hover:underline text-sm text-v-blue" href="{{ route('password.request') }}">
              {{ __('Forgot your password?') }}
            </a>
          @endif
        </div>

        <x-input id="password" class="block mt-1 w-full"
          type="password"
          name="password"
          required autocomplete="current-password" />
      </div>

      <!-- Remember Me -->
      <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            name="remember">
          <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
      </div>

      <div class="mt-4">
        <x-button type="submit" class="bg-v-purple hover:bg-v-blue-hover text-white text-base font-normal w-full">
          {{ __('Log in') }}
        </x-button>
      </div>
      <div class="mt-4">
        <p class="text-gray-500 text-sm font-normal text-center">Don't have an account? <a href="{{ route('register') }}" class="text-v-blue font-medium">Register!</a></p>
      </div>
    </form>
  </x-auth-card>
</x-guest-layout>
