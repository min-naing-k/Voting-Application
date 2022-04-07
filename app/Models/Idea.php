<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
  use HasFactory, Sluggable;

  const PAGINATION_COUNT = 10;

  protected $guarded = ['id'];

  /**
   * Return the sluggable configuration array for this model.
   *
   * @return array
   */
  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title',
      ],
    ];
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function status()
  {
    return $this->belongsTo(Status::class);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function votes()
  {
    return $this->belongsToMany(User::class, 'votes', 'idea_id', 'user_id');
  }

  public function reports()
  {
    return $this->belongsToMany(User::class, 'idea_spam', 'idea_id', 'user_id');
  }

  public function isMarkAsSpamByUser(User $user)
  {
    return IdeaSpam::where('idea_id', $this->id)
      ->where('user_id', $user->id)->exists();
  }

  public function isVotedByUser(?User $user)
  {
    if (!$user) {
      return false;
    }

    return Vote::where('user_id', $user->id)
      ->where('idea_id', $this->id)
      ->exists();
  }

  public function toggleVote(User $user)
  {
    if ($this->isVotedByUser($user)) {
      $this->decrement('votes_count');
    } else {
      $this->increment('votes_count');
    }

    $this->votes()->toggle($user->id);
  }
}
