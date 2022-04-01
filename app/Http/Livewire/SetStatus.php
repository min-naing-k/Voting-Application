<?php

namespace App\Http\Livewire;

use App\Jobs\NotifyAllVoters;
use App\Models\Idea;
use App\Models\Status;
use Livewire\Component;

class SetStatus extends Component
{
  public Idea $idea;
  public $status, $notifyAllVoters;

  public function mount()
  {
    $this->status = $this->idea->status_id;
  }

  public function setStatus()
  {
    $this->idea->status_id = $this->status;
    $this->idea->update();

    if($this->notifyAllVoters) {
      NotifyAllVoters::dispatch($this->idea);
      // dispatch(new NotifyAllVoters($this->idea));
    }

    $this->emit('updateStatus');
  }

  public function render()
  {
    return view('livewire.set-status', [
      'statuses' => Status::all(),
    ]);
  }
}
