<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
  use WithPagination;

  public $status, $category, $filter, $search;

  protected $queryString = [
    'status',
    'category' => ['except' => ''],
    'filter' => ['except' => ''],
    'search' => ['except' => ''],
  ];

  protected $listeners = [
    'queryStringUpdatedStatus',
    'queryStringUpdatedCategory',
    'queryStringUpdatedFilter',
    'queryStringUpdatedSearch',
  ];

  public function queryStringUpdatedStatus($new_status)
  {
    $this->resetPage();
    $this->status = $new_status === 'all' ? null : $new_status;
  }

  public function queryStringUpdatedCategory($new_category)
  {
    $this->resetPage();
    $this->category = $new_category;
  }

  public function queryStringUpdatedFilter($new_filter)
  {
    $this->resetPage();
    $this->filter = $new_filter;
  }

  public function queryStringUpdatedSearch($new_search)
  {
    $this->resetPage();
    $this->search = $new_search;
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
        ->when($this->filter === 'my-ideas', function ($query) {
          $query->where('user_id', auth()->id());
        })
        ->when($this->filter === 'spam-reports' && auth()->user()->hasRole('admin'), function($query) {
          $query->where('spam_reports', '>', '0');
        })
        ->when($this->search && strlen($this->search) >= 3, function ($query) {
          $query->where(function ($query) {
            $query->where('title', 'like', "%$this->search%")
              ->orWhere('description', 'like', "%$this->search%")
              ->orWhereHas('user', function($query) {
                $query->where('name', 'like', "%$this->search%");
              });
          });
        })
        ->withCount([
          'votes as voted_by_user' => function ($query) {
            $query->where('user_id', auth()->id());
          },
          'comments'
        ])
        ->orderBy('id', 'desc')
        ->simplePaginate(Idea::PAGINATION_COUNT)
        ->withQueryString(),
    ]);
  }
}
