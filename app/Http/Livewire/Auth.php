<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithAuthRedirects;
use Livewire\Component;

class Auth extends Component
{
  use WithAuthRedirects;

  public function render()
  {
    return view('livewire.auth');
  }
}
