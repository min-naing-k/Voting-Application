<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class LikeAnIdea extends Component
{
  public $idea, $isLike;

  public function mount(Idea $idea)
  {
    $this->idea = $idea;
    $this->isLike = $idea->liked_by_user;
  }

  public function toggleLike()
  {
    if($this->isLike) {
      $this->isLike = true;
    }else {
      $this->isLike = false;
    }

    $this->idea->likes()->toggle(auth()->user());
  }

  public function render()
  {
    return view('livewire.like-an-idea');
  }
}
