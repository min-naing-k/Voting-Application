<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
  use WithPagination;

  public $status, $category, $filter;

  protected $queryString = ['status', 'category' => ['except' => ''], 'filter' => [ 'except' => '' ]];

  protected $listeners = ['queryStringUpdatedStatus', 'queryStringUpdatedCategory', 'queryStringUpdatedFilter'];

  public function queryStringUpdatedStatus($new_status)
  {
    $this->resetPage();
    $this->status = $new_status;
  }

  public function queryStringUpdatedCategory($new_category)
  {
    $this->category = $new_category;
  }

  public function queryStringUpdatedFilter($new_filter)
  {
    $this->filter = $new_filter;
  }

  public function render()
  {
    return view('livewire.ideas-index', [
      'ideas' => Idea::with('user', 'category', 'status')
        ->when($this->status, function ($query, $status) {
          $query->whereHas('status', function ($query) use ($status) {
            $query->where('slug', $status);
          });
        })
        ->when($this->category, function ($query, $category) {
          $query->whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
          });
        })
        ->when($this->filter === 'top-voted', function ($query) {
          $query->orderByDesc('votes_count');
        })
        ->when($this->filter === 'my-ideas', function($query) {
          $query->where('user_id', auth()->id());
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

  public function scopeFilter($query, array $filter)
  {
    return $this->name;
  }
}
