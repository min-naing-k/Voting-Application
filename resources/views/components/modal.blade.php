@props([
  'foucsElement' => '',
  'eventToOpenModal'
])

<div
  x-data="{ open: false, element: '{{ $foucsElement }}' }"
  x-show="open"
  @keydown.escape.window="
    open = false;
    $wire.resetErrorAndData()
  "
  {{ '@' . $eventToOpenModal }}.window="
    open = true;
    $nextTick(() => document.querySelector(`.modal-container .modal .${element}`) && document.querySelector(`.modal-container .modal .${element}`).focus());
  "
  x-init="
    Livewire.on('{{ $eventToOpenModal }}', function(data) {
      open = true;
      $nextTick(() => document.querySelector(`.modal-container .modal .${element}`) && document.querySelector(`.modal-container .modal .${element}`).focus());
    });

    Livewire.on('notify', function(data) {
      open = false;
    });
  "
  class="modal-container fixed z-10 inset-0 overflow-y-hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
  style="display: none;">
  <div class="flex items-end justify-center min-h-screen">

    {{-- Overlay --}}
    <div
      x-show="open"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
    </div>

    {{-- Modal --}}
    <div
      x-show="open"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="transform translate-y-1/2 opacity-0"
      x-transition:enter-end="transform translate-y-0 opacity-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="transform translate-y-0 opacity-100"
      x-transition:leave-end="transform translate-y-1/2 opacity-0"
      class="modal bg-white rounded-tl-xl rounded-tr-xl overflow-hidden transform transition-all py-4 sm:max-w-lg sm:w-full">
      
      {{-- Close Modal Button --}}
      <div class="absolute top-0 right-0 pt-4 pr-4">
        <button
          @click="open = false; $wire.resetErrorAndData()"
          class="text-gray-400 hover:text-gray-500">
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="bg-white">
        <div class="p-4">
          {{ $modal_header }}
        </div>

        <div class="px-4">
          {{ $modal_body }}
        </div>
      </div>
    </div> <!-- end modal -->
  </div>
</div>
