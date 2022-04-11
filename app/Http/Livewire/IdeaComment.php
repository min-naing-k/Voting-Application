<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class IdeaComment extends Component
{
  public $comment, $comments;

  protected $listeners = ['refreshComment'];

  public function mount(Comment $comment)
  {
    $this->comment = $comment;
  }

  public function refreshComment()
  {
    $this->comment->refresh();
  }

  public function render()
  {
    return view('livewire.idea-comment');
  }
}
