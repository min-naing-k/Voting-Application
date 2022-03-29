<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable, HasRoles;

  protected $guarded = ['id'];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function ideas()
  {
    return $this->hasMany(Idea::class);
  }

  public function getAvator()
  {
    $firstCharacter = $this->email[0];

    $integerToUse = is_numeric($firstCharacter) ? ord($firstCharacter) - 21 : ord(strtolower($firstCharacter)) - 96;

    return 'https://www.gravatar.com/avatar/'
    . md5($this->email)
      . '?s=200'
      . '&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-'
      . $integerToUse
      . '.png';
  }
}
