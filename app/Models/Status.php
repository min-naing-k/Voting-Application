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

  public function getStatusClasses()
  {
    $statusClasses = [
      'Open' => 'open',
      'Considering' => 'considering',
      'In Progress' => 'in-progress',
      'Implemented' => 'implemented',
      'Closed' => 'closed',
    ];

    return $statusClasses[$this->name];

    // if ($this->name === 'Open') {
    //   return 'bg-gray-200';
    // } elseif ($this->name === 'Considering') {
    //   return 'bg-purple text-white';
    // } elseif ($this->name === 'In Progress') {
    //   return 'bg-yellow text-white';
    // } elseif ($this->name === 'Implemented') {
    //   return 'bg-green text-white';
    // } elseif ($this->name === 'Closed') {
    //   return 'bg-red text-white';
    // }

    // return 'bg-gray-200';
  }
}
