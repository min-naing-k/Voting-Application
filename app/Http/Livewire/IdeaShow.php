<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;

class IdeaShow extends Component
{
  public Idea $idea;
  public $votesCount;

  public function mount($votesCount)
  {
    $this->votesCount = $votesCount;
  }

  public function render()
  {
    return view('livewire.idea-show');
  }
}
