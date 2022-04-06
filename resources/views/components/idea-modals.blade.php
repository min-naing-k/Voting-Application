@props(['idea'])

@can('update', $idea)
  <livewire:edit-idea :idea="$idea" />
@endcan

@can('delete', $idea)
  <livewire:delete-idea :idea="$idea" />
@endcan

@auth
  <livewire:mark-idea-as-spam :idea="$idea" />
@endauth

@admin
<livewire:reset-idea-spam-reports :idea="$idea" />
@endadmin
