<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithAuthRedirects;
use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;

class CreateIdea extends Component
{
  use WithAuthRedirects;

  public $title, $category_id, $description;

  protected $rules = [
    'title' => 'required|min:4',
    'category_id' => 'required|integer',
    'description' => 'required',
  ];

  protected $messages = [
    'category_id.required' => 'The category field is required.',
    'category_id.integer' => 'The category field is invalid.',
  ];

  public function createIdea()
  {
    $attributes = $this->validate();

    $attributes['user_id'] = auth()->id();
    $attributes['status_id'] = 1;

    $idea = Idea::create($attributes);

    $idea->toggleVote(auth()->user());

    $this->reset();

    session()->flash('success', 'Idea was posted successfully!');

    return redirect('/');
  }

  public function render()
  {
    return view('livewire.create-idea');
  }
}
