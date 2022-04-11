<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ResetCommentSpamReports extends Component
{
  public Comment $comment;

  protected $listeners = ['setResetCommentReports'];

  public function setResetCommentReports($commentId)
  {
    $this->comment = Comment::findOrFail($commentId);

    $this->emit('setResetCommentReportsDone');
  }

  public function resetCommentReports()
  {
    $this->comment->reports()->detach();
    $this->comment->update([
      'spam_reports' => 0
    ]);

    $this->emit('refreshComment');
    $this->emit('notify', ['message' => 'Comment\'s reports was reseted', 'type' => 'success']);
  }

  public function render()
  {
    return view('livewire.reset-comment-spam-reports');
  }
}
