@props([
  'redirect' => false,
  'messageToShow' => ''
])

<div
  x-data="{ 
    open: false,
    messageToShow: '',
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
  x-init="
    if('{{ $redirect }}') {
      $nextTick(() => {
        showNotification('{{ $messageToShow }}');
      });
    }else {
      Livewire.on('ideaWasUpdated', (message) => {
        showNotification(message);
      });
  
      Livewire.on('ideaWasMarkedAsSpam', (message) => {
        showNotification(message);
      });
  
      Livewire.on('resetIdeaSpamReports', (message) => {
        showNotification(message);
      })
    }
  "
  class="z-20 flex justify-between max-w-xs sm:max-w-sm w-full 
    fixed bottom-0 right-0 bg-white rounded-xl shadow-lg border px-4 py-5 mx-2 sm:mx-6 my-8"
  style="display: none">
  <div class="flex items-center">
    <svg class="text-green-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <div class="font-semibold text-gray-500 text-sm ml-2" x-text="messageToShow"></div>
  </div>
  <button @click="open = false" class="text-gray-400 hover:text-gray-500">
    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
    </svg>
  </button>
</div>
