<nav class="hidden md:flex items-center justify-between text-xs text-gray-400">
  <ul class="flex uppercase font-semibold space-x-5 border-b-4 pb-3">
    <li>
      <a
        wire:click.prevent="setStatus()" href="#"
        class="border-b-4 pb-3 transition duration-150 ease-in hover:text-gray-900 hover:border-v-blue @if ($status === 'all') text-gray-900 border-v-blue @endif">
        All Ideas ({{ $statusCounts['all_statuses'] }})
      </a>
    </li>
    <li>
      <a
        wire:click.prevent="setStatus('open')" href="#"
        class="border-b-4 pb-3 transition duration-150 ease-in hover:text-gray-900 hover:border-v-blue @if ($status === 'open') text-gray-900 border-v-blue @endif">
        Open ({{ $statusCounts['open'] }})
      </a>
    </li>
    <li>
      <a
        wire:click.prevent="setStatus('considering')" href="#"
        class="border-b-4 pb-3 transition duration-150 ease-in hover:text-gray-900
          hover:border-v-blue @if ($status === 'considering') text-gray-900 border-v-blue @endif">
        Considering ({{ $statusCounts['considering'] }})
      </a>
    </li>
    <li>
      <a
        wire:click.prevent="setStatus('in-progress')" href="#"
        class="border-b-4 pb-3 transition duration-150 ease-in hover:text-gray-900 
          hover:border-v-blue @if ($status === 'in-progress') text-gray-900 border-v-blue @endif">
        In Progress ({{ $statusCounts['in_progress'] }})
      </a>
    </li>
  </ul>

  <ul class="flex uppercase font-semibold space-x-5 border-b-4 pb-3">
    <li>
      <a
        wire:click.prevent="setStatus('implemented')" href="#"
        class="border-b-4 pb-3 transition duration-150 ease-in hover:text-gray-900
      hover:border-v-blue @if ($status === 'implemented') text-gray-900 border-v-blue @endif">
        Implemented ({{ $statusCounts['implemented'] }})
      </a>
    </li>
    <li>
      <a
        wire:click.prevent="setStatus('closed')" href="#"
        class="border-b-4 pb-3 transition duration-150 ease-in hover:text-gray-900
          hover:border-v-blue @if ($status === 'closed') text-gray-900 border-v-blue @endif">
        Closed ({{ $statusCounts['closed'] }})
      </a>
    </li>
  </ul>
</nav>
