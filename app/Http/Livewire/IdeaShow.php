<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{
  public Idea $idea;
  public $votesCount, $hasVoted;

  protected $listeners = ['updateStatus', 'ideaWasUpdated', 'ideaWasMarkedAsSpam', 'resetIdeaSpamReports', 'commentWasCreated'];

  public function mount($votesCount)
  {
    $this->votesCount = $votesCount;
    $this->hasVoted = $this->idea->isVotedByUser(auth()->user());
  }

  public function updateStatus()
  {
    $this->idea->refresh();
  }

  public function ideaWasUpdated()
  {
    $this->idea->refresh();
  }

  public function ideaWasMarkedAsSpam()
  {
    $this->idea->refresh();
  }

  public function resetIdeaSpamReports()
  {
    $this->idea->refresh();
  }

  public function commentWasCreated()
  {
    $this->idea->refresh();
  }

  public function vote()
  {
    if(! auth()->check()) {
      return redirect(route('login'));
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
