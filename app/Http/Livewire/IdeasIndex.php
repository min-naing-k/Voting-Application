<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeasIndex extends Component
{
  use WithPagination;

  public $status, $category, $filter, $search, $showTotal = false;

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

  public function mount()
  {
    $this->toggleShowTotal();
  }

  public function queryStringUpdatedStatus($new_status)
  {
    $this->resetPage();
    $this->status = $new_status === 'all' ? null : $new_status;
  }

  public function queryStringUpdatedCategory($new_category)
  {
    $this->resetPage();
    $this->category = $new_category;
    $this->toggleShowTotal();
  }

  public function queryStringUpdatedFilter($new_filter)
  {
    $this->resetPage();
    $this->filter = $new_filter;
    $this->toggleShowTotal();
  }

  public function queryStringUpdatedSearch($new_search)
  {
    $this->resetPage();
    $this->search = $new_search;
    $this->toggleShowTotal();
  }

  public function paginationView() {
    return 'vendor.livewire.idea-pagination';
  }

  protected function toggleShowTotal() {
    if($this->category || $this->filter || $this->search) {
      $this->showTotal = true;
      return;
    }

    $this->showTotal = false;
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
        ->when($this->filter === 'popular-this-week', function ($query) {
          $query->whereBetween('created_at', [
            now()->subDays(6)->startOfDay(),
            now()
          ])
          ->orderByDesc('comments_count');
        })
        ->when($this->filter === 'my-participation', function($query) {
          $query->having('commented_by_user', '>', 0)
          ->orHaving('voted_by_user', '>', 0);
        })
        ->when($this->filter === 'most-commented', function ($query) {
          $query->orderByDesc('comments_count');
        })
        ->when($this->filter === 'no-comment-yet', function($query) {
          $query->having('comments_count', 0);
        })
        ->when($this->filter === 'my-ideas', function ($query) {
          $query->where('user_id', auth()->id());
        })
        ->when($this->filter === 'spam-ideas' && auth()->check() && auth()->user()->hasRole('admin'), function($query) {
          $query->where('spam_reports', '>', '0');
        })
        ->when($this->filter === 'spam-comments' && auth()->check() && auth()->user()->hasRole('admin'), function($query) {
          $query->whereHas('comments', function($query) {
            $query->where('spam_reports', '>', 0);
          });
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
          'comments',
          'comments as commented_by_user' => function($query) {
            $query->where('user_id', auth()->id());
          }
        ])
        ->orderBy('id', 'desc')
        ->paginate()
        ->withQueryString(),
    ]);
  }
}
