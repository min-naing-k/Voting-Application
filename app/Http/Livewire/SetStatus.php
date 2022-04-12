<?php

namespace App\Http\Livewire;

use App\Jobs\NotifyAllVoters;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\Status;
use Livewire\Component;

class SetStatus extends Component
{
  public Idea $idea;
  public $status, $notifyAllVoters, $body;

  public function mount()
  {
    $this->status = $this->idea->status_id;
  }

  public function setStatus()
  {
    $this->idea->status_id = $this->status;
    $this->idea->update();

    Comment::create([
      'user_id' => auth()->id(),
      'idea_id' => $this->idea->id,
      'status_id' => $this->status,
      'is_status_update' => true,
      'body' => $this->body ?? 'No comment was set',
    ]);

    if($this->notifyAllVoters) {
      if($this->idea->votes_count > 0) {
        NotifyAllVoters::dispatch($this->idea);
      }
    }

    $this->emit('refreshIdea');
    $this->emit('gotoNewComment');
    $this->emit('notify', ['message' => 'Idea\'s Status was updated successfully! ', 'type' => 'success']);
  }

  public function resetErrorAndData()
  {
    $this->resetErrorBag();
    $this->status = $this->idea->status_id;
    $this->notifyAllVoters = null;
  }

  public function render()
  {
    return view('livewire.set-status', [
      'statuses' => Status::all(),
    ]);
  }
}
