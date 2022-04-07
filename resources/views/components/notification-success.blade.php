@props([
  'redirect' => false,
  'messageToShow' => '',
])

<div
  x-data="{ 
    open: false,
    messageToShow: '',
    type: 'success',
    showNotification(message) {
      this.open = true;
      this.messageToShow = message;
      setTimeout(() => {
        this.open = false;
      }, 5000);
    }
  }"
  x-show="open"
  x-transition:enter="transition ease-out duration-150"
  x-transition:enter-start="opacity-75 transform translate-y-8"
  x-transition:enter-end="opacity-100 transform translate-y-0"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100 transform translate-y-0"
  x-transition:leave-end="opacity-75 transform translate-y-8"
  @keydown.escape.window="open = false"
  @notify.window="
    showNotification($event.detail.message);
    type = $event.detail.type;
  "
  x-init="
    if('{{ $redirect }}') {
      $nextTick(() => {
        showNotification('{{ $messageToShow }}');
      });
    }
  "
  class="z-20 flex justify-between max-w-xs sm:max-w-sm w-full 
    fixed bottom-0 right-0 bg-white rounded-xl shadow-lg border px-4 py-5 mx-2 sm:mx-6 my-8"
  style="display: none">
  <div class="flex items-center">
    <template x-if="type === 'success'">
      <svg class="text-green-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>   
    </template>
    <template x-if="type === 'error'">
      <svg class="text-red-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </template>
    <template x-if="type === 'warning'">
      <svg class="text-yellow-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
    </template>
    <div class="font-semibold text-gray-500 text-sm ml-2" x-text="messageToShow"></div>
  </div>
  <button @click="open = false" class="text-gray-400 hover:text-gray-500">
    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </button>
</div>
