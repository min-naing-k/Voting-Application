<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class LikeAnIdea extends Component
{
  public $idea;

  public function mount(Idea $idea)
  {
    $this->idea = $idea;
  }

  public function like()
  {
    $this->idea->like(auth()->user());
  }

  public function render()
  {
    return view('livewire.like-an-idea');
  }
}
