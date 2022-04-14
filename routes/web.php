<?php

use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
require __DIR__ . '/auth.php';

Route::get('/', [IdeaController::class, 'index'])->name('idea.index');
Route::get('ideas/{idea:slug}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('test', function () {
  dd(route('idea.show', 'something'));
  $currentUserId = 1;
  $idea = App\Models\Idea::with('comments')
  ->where('id', 100)
  ->withCount([
    'votes as voted_by_user' => function ($query) use ($currentUserId) {
      $query->where('user_id', $currentUserId);
    },
    'reports as reported_by_user' => function($query) use ($currentUserId) {
      $query->where('user_id', $currentUserId);
    }
  ])
  ->withCasts([
    'voted_by_user' => 'boolean',
    'reported_by-user' => 'boolean',
  ])
  ->first();

  $comment = $idea->comments()
    ->where('user_id', $currentUserId)
    ->withCount([
      'reports as reported_by_user' => function($query) use ($currentUserId) {
        $query->where('user_id', $currentUserId);
      }
    ])
    ->withCasts(['reported_by_user' => 'boolean'])
    ->first();

  $comment = $idea->comments()
      ->selectRaw('count(*) as all_comments')
      ->selectRaw('count(case when user_id = 1 then 1 end) as current_user_comments_count')
      ->first();

  // dd($comment);

  // User::chunk(2, function ($users) {
  //   foreach ($users as $user) {
       // $user->email_verified_at = now();
       // $user->update();
  //   }
  // });

  // User::whereNull('email_verified_at')
  //   ->chunkById(2, function ($users) {
  //     foreach ($users as $user) {
  //       $user->email_verified_at = now();
  //       $user->update();
  //     }
  //   });

  echo 'done';
});
