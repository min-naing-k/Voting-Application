<abbr title="like">
  <button wire:click.prevent="toggleLike" type="button" class="bg-gray-100 {{ $isLike ? 'text-v-blue' : 'text-gray-300' }} border px-2 py-1 rounded-xl hover:border-gray-300 transition ease-in duration-150">
    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
    </svg>
  </button>
</abbr>