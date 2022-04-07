<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // Reset cached roles and permissions
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    // Create permissions
    Permission::create(['name' => 'change status']);
    Permission::create(['name' => 'create idea']);
    Permission::create(['name' => 'show idea']);
    Permission::create(['name' => 'edit idea']);
    Permission::create(['name' => 'delete idea']);

    // Create roles
    $admin = Role::create(['name' => 'admin']);
    $admin->givePermissionTo(['change status', 'create idea', 'show idea', 'edit idea', 'delete idea']);
    $idea_owner = Role::create(['name' => 'idea-owner']);
    $idea_owner->givePermissionTo(['create idea', 'show idea', 'edit idea', 'delete idea']);

    $admin_user = User::factory()->create([
      'name' => 'Min Naing Kyaw',
      'email' => 'minnaingmdy436@gmail.com',
    ]);
    $admin_user->assignRole($admin);

    foreach (range(1, 19) as $item) {
      $user = User::factory()->create();
      $user->assignRole($idea_owner);
    }

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

    foreach (range(1, 100) as $item) {
      if ($item % 2 === 0) {
        Idea::factory()->create([
          'votes_count' => 20,
        ]);
      } else {
        Idea::factory()->create();
      }
    }

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

    foreach(Idea::all() as $idea_id) {
      Comment::factory(5)->existing()->create([
        'idea_id' => $idea_id,
      ]);
    }
  }
}
