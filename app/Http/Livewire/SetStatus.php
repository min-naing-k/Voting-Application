<?php

namespace App\Http\Livewire;

use App\Mail\IdeaStatusUpdateMailable;
use App\Models\Idea;
use App\Models\Status;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SetStatus extends Component
{
  public Idea $idea;
  public $status, $notifyAllVoter;

  public function mount()
  {
    $this->status = $this->idea->status_id;
  }

  public function setStatus()
  {
    $this->idea->status_id = $this->status;
    $this->idea->update();

    $this->notifyAllVoters();

    $this->emit('updateStatus');
  }

  public function notifyAllVoters()
  {
    if(!$this->notifyAllVoter) {
      return;
    }

    $this->idea->votes()
      ->select('name', 'email')
      ->chunk(100, function($voters) {
        foreach ($voters as $voter) {
          Mail::to($voter)
            ->queue(new IdeaStatusUpdateMailable($this->idea));
        }
      });
  }

  public function render()
  {
    return view('livewire.set-status', [
      'statuses' => Status::all(),
    ]);
  }
}
