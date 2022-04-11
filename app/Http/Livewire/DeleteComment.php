<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class DeleteComment extends Component
{
  public Comment $comment;
  public $last_comment;

  protected $listeners = ['deleteSetComment'];

  public function deleteSetComment($data)
  {
    $this->last_comment = $data['lastComment'];
    $this->comment = Comment::findOrFail($data['commentId']);

    $this->emit('delete-set-comment-done');
  }

  public function deleteComment()
  {
    $this->comment->delete();

    if($this->last_comment) {
      $this->emit('gotoPreviousCommentPage');
    }else {
      $this->emit('refreshComments');
    }
    
    $this->emit('notify', ['message' => 'Comment was deleted successfully!', 'type' => 'success']);
  }

  public function render()
  {
    return view('livewire.delete-comment');
  }
}
