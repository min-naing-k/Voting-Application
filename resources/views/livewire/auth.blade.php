@auth
  <div>
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <a href="{{ route('logout') }}"
        onclick="event.preventDefault();this.closest('form').submit();">
        {{ __('Log Out') }}
      </a>
    </form>
  </div>
@else
  <div>
    <a
      wire:click.prevent="redirectToLogin"
      href="{{ route('login') }}"
      class="text-sm text-gray-700 dark:text-gray-500 underline">
      Log in
    </a>
    @if (Route::has('register'))
      <a
        wire:click.prevent="redirectToRegister"
        href="{{ route('register') }}"
        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
        Register
      </a>
    @endif
  </div>
@endauth
