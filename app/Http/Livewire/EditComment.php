<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Http\Response;
use Livewire\Component;

class EditComment extends Component
{
  public Comment $comment;
  public $body;

  protected $listeners = ['editSetComment'];

  protected $rules = [
    'body' => 'required',
  ];

  public function editSetComment($comment_id)
  {
    $this->comment = Comment::findOrFail($comment_id);
    $this->body = $this->comment->body;

    $this->emit('edit-set-comment-done');
  }

  public function updateComment()
  {
    if(auth()->guest() || auth()->user()->cannot('update', $this->comment)) {
      abort(Response::HTTP_FORBIDDEN);
    }

    $attributes = $this->validate();
    $this->comment->update($attributes);

    $this->emit('refreshComment');
    $this->emit('notify', ['message' => 'Comment was updated successfully!', 'type' => 'success']);
  }

  public function resetErrorAndData()
  {
    $this->resetErrorBag();
    $this->body = null;
  }

  public function render()
  {
    return view('livewire.edit-comment');
  }
}
