<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function ideas()
  {
    return $this->hasMany(Idea::class);
  }
}
