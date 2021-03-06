<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithAuthRedirects;
use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{
  use WithAuthRedirects;

  public Idea $idea;
  public $votesCount, $hasVoted;

  protected $listeners = ['refreshIdea'];

  public function mount($votesCount)
  {
    $this->votesCount = $votesCount;
    $this->hasVoted = $this->idea->isVotedByUser(auth()->user());
  }

  public function refreshIdea()
  {
    $this->idea->refresh();
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

  public function render()
  {
    return view('livewire.idea-show');
  }
}
