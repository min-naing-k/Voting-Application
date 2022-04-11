<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use Livewire\WithPagination;

class IdeaComments extends Component
{
  use WithPagination;

  public $idea;

  protected $listeners = ['gotoNewComment', 'gotoPreviousCommentPage', 'refreshComments'];

  public function mount(Idea $idea)
  {
    $this->idea = $idea;
  }

  public function gotoNewComment()
  {
    $this->idea->refresh();
    $this->gotoPage($this->idea->comments()->paginate()->lastPage(), 'comment-page');
    $this->dispatchBrowserEvent('comment-was-created');
  }

  public function gotoPreviousCommentPage()
  {
    $this->idea->refresh();
    $this->previousPage('comment-page');
  }

  public function refreshComments()
  {
    $this->idea->refresh();
  }

  public function render()
  {
    return view('livewire.idea-comments', [
      'comments' => $this->idea->comments()
        ->with(['user', 'idea'])
        ->paginate(15, ['*'], 'comment-page')
        ->withQueryString(),
    ]);
  }
}
