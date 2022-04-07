<?php

namespace App\Http\Livewire;

use App\Models\Idea;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Response;

class EditIdea extends Component
{
  public Idea $idea;
  public $title, $category_id, $description;

  protected $rules = [
    'title' => 'required|min:4',
    'category_id' => 'required|integer|exists:categories,id',
    'description' => 'required',
  ];

  protected $messages = [
    'category_id.required' => 'The category field is required.',
    'category_id.integer' => 'The category field is invalid.',
  ];

  public function mount()
  {
    $this->title = $this->idea->title;
    $this->category_id = $this->idea->category_id;
    $this->description = $this->idea->description;
  }

  public function clearError()
  {
    $this->title = $this->idea->title;
    $this->category_id = $this->idea->category_id;
    $this->description = $this->idea->description;
    $this->resetErrorBag();
  }

  public function updateIdea()
  {
    if(auth()->guest() || auth()->user()->cannot('update', $this->idea)) {
      abort(Response::HTTP_FORBIDDEN);
    }

    $attributes = $this->validate();
    $this->idea->update($attributes);

    $this->emit('ideaWasUpdated');
    $this->dispatchBrowserEvent('notify', ['message' => 'Idea was updated successfully!', 'type' => 'success']); // for toast showing
  }

  public function render()
  {
    return view('livewire.edit-idea');
  }
}
