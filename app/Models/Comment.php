<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  protected $perPage = 15;

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function idea()
  {
    return $this->belongsTo(Idea::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function reports()
  {
    return $this->belongsToMany(User::class, 'comment_spam', 'comment_id', 'user_id')
      ->withTimestamps();
  }

  public function likes()
  {
    return $this->morphToMany(User::class, 'likeables')->withTimestamps();
  }

  public function like(User $user)
  {
    $this->likes()->attach($user);
  }

  public function isMarkAsSpamByUser(User $user)
  {
    return CommentSpam::where('comment_id', $this->id)
      ->where('user_id', $user->id)->exists();
  }
}
