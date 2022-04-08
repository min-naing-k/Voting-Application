<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class CreateComment extends Component
{
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
    
    Comment::create($attributes);
    $this->reset();

    $this->emit('commentWasCreated');
    $this->dispatchBrowserEvent('notify', ['message' => 'Comment was created successfully', 'type' => 'success']);
  }

  public function render()
  {
    return view('livewire.create-comment');
  }
}
