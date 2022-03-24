<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
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

    Idea::factory(20)->create();
  }
}
