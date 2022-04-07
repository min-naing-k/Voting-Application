<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class MarkIdeaAsSpam extends Component
{
  public $idea;

  public function mount(Idea $idea)
  {
    $this->idea = $idea;
  }

  public function markIdeaAsSpam()
  {
    if(auth()->guest()) {
      abort(Response::HTTP_FORBIDDEN);
    }

    if(!$this->idea->isMarkAsSpamByUser(auth()->user())) {
      $this->idea->reports()->attach(auth()->id());

      $this->idea->spam_reports++;
      $this->idea->update();
    }
    
    $this->emit('ideaWasMarkedAsSpam', 'Idea was marked as spam!');
  }


  public function render()
  {
    return view('livewire.mark-idea-as-spam');
  }
}
