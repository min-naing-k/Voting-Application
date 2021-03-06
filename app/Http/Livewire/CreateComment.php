<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithAuthRedirects;
use App\Models\Comment;
use App\Models\Idea;
use App\Notifications\CommentCreated;
use Illuminate\Http\Response;
use Livewire\Component;

class CreateComment extends Component
{
  use WithAuthRedirects;

  public $idea, $body;

  protected $rules = [
    'body' => 'required',
  ];

  public function mount(Idea $idea)
  {
    $this->idea = $idea;
  }

  public function createComment()
  {
    if (auth()->guest()) {
      abort(Response::HTTP_FORBIDDEN);
    }

    $attributes = $this->validate();
    $attributes['user_id'] = auth()->id();
    $attributes['idea_id'] = $this->idea->id;
    $attributes['status_id'] = $this->idea->status_id;
    
    $newComment = Comment::create($attributes);
    $this->body = null;
    
    if($this->idea->user_id !== auth()->id()) {
      $this->idea->user->notify(new CommentCreated($newComment));
    }

    $this->emit('gotoNewComment');
    $this->emit('notify', ['message' => 'Comment was created successfully', 'type' => 'success']);
  }

  public function resetErrorAndData()
  {
    $this->resetErrorBag();
    $this->body = null;
  }

  public function render()
  {
    return view('livewire.create-comment');
  }
}
