<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Illuminate\Http\Response;
use Livewire\Component;

class DeleteIdea extends Component
{
  public Idea $idea;

  public function deleteIdea()
  {
    if(auth()->guest() || auth()->user()->cannot('delete', $this->idea)) {
      abort(Response::HTTP_FORBIDDEN);
    }

    $this->idea->votes()->detach();

    Idea::destroy($this->idea->id);

    session()->flash('success', 'Idea was deleted successfully!');

    return redirect()->route('idea.index');
  }

  public function render()
  {
    return view('livewire.delete-idea');
  }
}
