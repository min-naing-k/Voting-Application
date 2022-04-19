<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithAuthRedirects;
use App\Models\Idea;
use Livewire\Component;

class IdeaIndex extends Component
{
  use WithAuthRedirects;

  public Idea $idea;
  public $votesCount, $hasVoted, $isLiked;

  public function mount($votesCount)
  {
    $this->votesCount = $votesCount;
    $this->hasVoted = $this->idea->voted_by_user;
    $this->isLiked = $this->idea->liked_by_user;
  }

  public function vote()
  {
    if(auth()->guest()) {
      return $this->redirectToLogin();
    }

    $this->idea->toggleVote(auth()->user());
    
    if($this->hasVoted) {
      $this->votesCount--;
      $this->hasVoted = false;
    }else {
      $this->votesCount++;
      $this->hasVoted = true;
    }
  }

  
  public function toggleLike()
  {
    $this->idea->likes()->toggle(auth()->user());
    
    if($this->isLiked) {
      $this->isLiked = true;
    }else {
      $this->isLiked = false;
    }
  }

  public function render()
  {
    return view('livewire.idea-index');
  }
}
