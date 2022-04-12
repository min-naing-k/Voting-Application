<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      foreach(range(1, 150) as $item) {
        Comment::factory()->create([
          'user_id' => 1,
          'idea_id' => 100,
          'status_id' => 1
        ]);
      }
    }
}
