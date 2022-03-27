<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  use HasFactory, Sluggable;

  protected $guarded = ['id'];

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'name',
      ],
    ];
  }

  public function ideas()
  {
    return $this->hasMany(Idea::class);
  }

  public static function getCount()
  {
    return Idea::query()
      ->selectRaw('count(*) as all_statuses')
      ->selectRaw('count(case when status_id = 1 then 1 end) as open')
      ->selectRaw('count(case when status_id = 2 then 1 end) as considering')
      ->selectRaw('count(case when status_id = 3 then 1 end) as in_progress')
      ->selectRaw('count(case when status_id = 4 then 1 end) as implemented')
      ->selectRaw('count(case when status_id = 5 then 1 end) as closed')
      ->first()
      ->toArray();
  }

  public static function getCountByDynamic()
  {
    $statusCounts = []; # [ 'open' => 11, 'considering' => 28, ... ]
    $ideas_count_by_status_id = Idea::all()->countBy('status_id'); # [ 1 (open) => 11,  2 (considering) => 28, ...]
    $statuses = Status::pluck('id', 'slug'); # [ 'open' => 1, 'considering' => 2, ... ]

    foreach ($statuses as $key => $status_id) {
      $statusCounts[$key] = $ideas_count_by_status_id[$status_id]; # [ 'open' =>  11]
    }

    $statusCounts['all'] = array_sum($ideas_count_by_status_id->toArray()); # only sum value not key

    return $statusCounts;
  }
}
