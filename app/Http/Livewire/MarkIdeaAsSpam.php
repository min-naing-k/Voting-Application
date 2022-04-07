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
    
    $this->emit('ideaWasMarkedAsSpam'); // for confirm modal closing
    $this->dispatchBrowserEvent('notify', ['message' => 'Idea was marked as spam!', 'type' => 'success']); // for toast showing
  }


  public function render()
  {
    return view('livewire.mark-idea-as-spam');
  }
}
