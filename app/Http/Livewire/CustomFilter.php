<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CustomFilter extends Component
{
  public $category;

  public function updatedCategory($new_category)
  {
    $this->emit('queryStringUpdatedCategory', $new_category);
  }

  public function render()
  {
    $categories = Category::all();

    return view('livewire.custom-filter', [
      'categories' => $categories
    ]);
  }
}
