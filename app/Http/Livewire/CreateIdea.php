<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Idea;
use Livewire\Component;

class CreateIdea extends Component
{
  public $title, $category_id, $description;

  protected $rules = [
    'title' => 'required|min:4',
    'category_id' => 'required|integer',
    'description' => 'required',
  ];

  public function createIdea()
  {
    $attributes = $this->validate();

    $attributes['user_id'] = auth()->id();
    $attributes['status_id'] = 1;

    Idea::create($attributes);

    $this->reset();

    session()->flash('success', 'Idea was posted successfully!');

    return redirect('/');
  }

  public function render()
  {
    return view('livewire.create-idea', [
      'categories' => Category::all(),
    ]);
  }
}
