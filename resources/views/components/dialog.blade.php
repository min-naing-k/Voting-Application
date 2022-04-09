@props([
  'align' => '',
  'width' => '48',
  'contentClasses' => '',
  'alignmentClasses' => '',
  'class' => '',
  'event' => null
])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
        $alignmentClasses = 'origin-top-right right-0';
    default:
        break;
}

switch ($width) {
    case '48':
        $width = 'w-48';
        break;
}
@endphp

<div
  class="relative {{ $class }}"
  x-data="{ open: false, last_comment: null }"
  x-init="
    if('{{ $event }}') {
      Livewire.on('{{ $event }}', function() {
        open = false;
      });

      {{-- Livewire.hook('message.processed', function(message, component) {
        if(message.updateQueue[0].payload.event === 'commentWasCreated' && message.component.fingerprint.name === 'idea-comments') {
          const last_comment = document.querySelector('.comment-container:last-child');
          last_comment.scrollIntoView({ behavior: 'smooth' });
          last_comment.classList.add('border-green-300');
          setTimeout(() => {
            last_comment.classList.remove('border-green-300');
          }, 5000);
        }
      }); --}}
    }
  "
  @comment-was-created.window="
    last_comment = document.querySelector('.comment-container:last-child');
    last_comment.scrollIntoView({ behavior: 'smooth' });
    last_comment.classList.add('!border-green-300');
    setTimeout(() => {
      last_comment.classList.remove('!border-green-300');
    }, 5000);
  "
  @click.outside="open = false"
  @close.stop="open = false">
  <div @click="open = ! open">
    {{ $trigger }}
  </div>

  <div 
  x-show="
    open;
    $nextTick(() => {
      if($refs.comment) {
        $refs.comment.focus();
      }
    });
  "
    x-transition:enter="transition ease-out duration-150"
    x-transition:enter-start="transform opacity-0 scale-50"
    x-transition:enter-end="transform opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="transform opacity-100 scale-100"
    x-transition:leave-end="transform opacity-0 scale-50"
    class="absolute z-50 mt-2 {{ $width }} text-left font-semibold text-sm bg-white shadow-dialog rounded-lg px-4 py-6 {{ $alignmentClasses }} {{ $contentClasses }}"
    style="display: none;"
    @keydown.escape.window="open = false">
    {{ $content }}
  </div>
</div>
