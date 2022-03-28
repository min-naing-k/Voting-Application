<div>
  <livewire:custom-filter />

  <div class="ideas-container space-y-6 my-6">
    @foreach ($ideas as $idea)
      <livewire:idea-index
        :key="$idea->id"
        :idea="$idea"
        :votesCount="$idea->votes_count" />
    @endforeach
  </div> <!-- End Ideas Container -->

  <div class="my-8">
    {{ $ideas->links() }}
    {{-- {{ $ideas->appends(request()->query())->links() }} --}}
  </div>
</div>
