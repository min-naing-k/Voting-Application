<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::factory()->create([
      'name' => 'Min Naing Kyaw',
      'email' => 'minnaingmdy436@gmail.com',
    ]);

    User::factory(19)->create();

    Category::factory()->create(['name' => 'Category 1']);
    Category::factory()->create(['name' => 'Category 2']);
    Category::factory()->create(['name' => 'Category 3']);
    Category::factory()->create(['name' => 'Category 4']);
    Category::factory()->create(['name' => 'Category 5']);

    Status::factory()->create(['name' => 'Open']);
    Status::factory()->create(['name' => 'Considering']);
    Status::factory()->create(['name' => 'In Progress']);
    Status::factory()->create(['name' => 'Implemented']);
    Status::factory()->create(['name' => 'Closed']);

    Idea::factory(100)->create();

    foreach (range(1, 20) as $user_id) {
      foreach (range(1, 100) as $idea_id) {
        if ($idea_id % 2 === 0) {
          Vote::factory()->create([
            'idea_id' => $idea_id,
            'user_id' => $user_id,
          ]);
        }
      }
    }
  }
}
