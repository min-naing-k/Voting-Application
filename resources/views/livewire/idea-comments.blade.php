@if ($comments->isNotEmpty())
  <div>
    <div class="comments-container relative space-y-4 md:space-y-6 md:ml-22 mb-8 mt-1 md:pt-6">
      @foreach ($comments as $comment)
        <livewire:idea-comment
        :comment="$comment"
        :key="$comment->id" />
      @endforeach
    </div>
    <div class="my-6 md:ml-22">
      {{ $comments->links('vendor.livewire.tailwind', ['result' => 'comments']) }}
    </div>
  </div>
@else
  <div class="mx-auto w-70 my-12">
    <img src="{{ asset('images/no-ideas.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity">
    <div class="text-gray-400 text-center font-bold mt-4">No Comments yet...</div>
  </div>
@endif
