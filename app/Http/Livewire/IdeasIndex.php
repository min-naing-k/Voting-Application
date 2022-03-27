<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeasIndex extends Component
{
  public function render()
  {
    return view('livewire.ideas-index', [
      'ideas' => Idea::with('user', 'category', 'status')
        ->when(request('status'), function ($query, $status) {
          $query->whereHas('status', function ($query) use ($status) {
            $query->where('slug', $status);
          });
        })
        ->withCount([
          'votes as voted_by_user' => function ($query) {
            $query->where('user_id', auth()->id());
          },
        ])
        ->orderBy('id', 'desc')
        ->simplePaginate(Idea::PAGINATION_COUNT)
        ->withQueryString(),
    ]);
  }
}
