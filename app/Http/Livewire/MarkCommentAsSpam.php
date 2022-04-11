<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class MarkCommentAsSpam extends Component
{
  public Comment $comment;

  protected $listeners = ['setCommentAsSpam'];

  public function setCommentAsSpam($commentId)
  {
    $this->comment = Comment::findOrFail($commentId);

    $this->emit('setCommentAsSpamDone');
  }

  public function markCommentAsSpam()
  {
    if(!$this->comment->isMarkAsSpamByUser(auth()->user())) {
      $this->comment->reports()->attach(auth()->id());
      $this->comment->increment('spam_reports');
    }

    $this->emit('refreshComment');
    $this->emit('notify', ['message' => 'Comment was marked spam.', 'type' => 'success']);
  }

  public function render()
  {
    return view('livewire.mark-comment-as-spam');
  }
}
