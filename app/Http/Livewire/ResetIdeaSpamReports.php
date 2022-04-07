<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class ResetIdeaSpamReports extends Component
{
  public $idea;

  public function mount(Idea $idea)
  {
    $this->idea = $idea;
  }

  public function resetIdeaSpamReports()
  {
    if(!auth()->check() || !auth()->user()->hasRole('admin')) {
      abort(Response::HTTP_FORBIDDEN);
    }

    $this->idea->reports()->detach();
    $this->idea->spam_reports = 0;
    $this->idea->update();

    $this->emit('resetIdeaSpamReports');
    $this->dispatchBrowserEvent('notify', ['message' => 'Idea\'s spam reports were reseted!', 'type' => 'success']); // for toast showing
  }

  public function render()
  {
    return view('livewire.reset-idea-spam-reports');
  }
}
