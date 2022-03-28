<div>
  <livewire:custom-filter />

  <div class="ideas-container space-y-6 my-6">
    @forelse ($ideas as $idea)
      <livewire:idea-index
        :key="$idea->id"
        :idea="$idea"
        :votesCount="$idea->votes_count" />
    @empty
      <div class="mx-auto w-70 mt-12">
        <img src="{{ asset('images/no-ideas.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity">
        <div class="text-gray-400 text-center font-bold mt-6">No ideas were found...</div>
      </div>
    @endforelse
  </div> <!-- End Ideas Container -->

  <div class="my-8">
    {{ $ideas->links() }}
    {{-- {{ $ideas->appends(request()->query())->links() }} --}}
  </div>
</div>
