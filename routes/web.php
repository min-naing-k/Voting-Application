<?php

use App\Http\Controllers\IdeaController;
use App\Models\User;
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
  User::chunk(2, function ($users) {
    foreach ($users as $user) {
      // $user->email_verified_at = now();
      // $user->update();
      $user->assignRole('idea-owner');
    }
  });

  // User::whereNull('email_verified_at')
  //   ->chunkById(2, function ($users) {
  //     foreach ($users as $user) {
  //       $user->email_verified_at = now();
  //       $user->update();
  //     }
  //   });

  echo 'done';
});
