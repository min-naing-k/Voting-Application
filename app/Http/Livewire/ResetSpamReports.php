<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class ResetSpamReports extends Component
{
  public $idea;

  public function mount(Idea $idea)
  {
    $this->idea = $idea;
  }

  public function resetSpamReports()
  {
    if(!auth()->check() || !auth()->user()->hasRole('admin')) {
      abort(Response::HTTP_FORBIDDEN);
    }

    $this->idea->reports()->detach();
    $this->idea->spam_reports = 0;
    $this->idea->update();

    $this->emit('resetIdeaSpamReports');
  }

  public function render()
  {
    return view('livewire.reset-spam-reports');
  }
}
