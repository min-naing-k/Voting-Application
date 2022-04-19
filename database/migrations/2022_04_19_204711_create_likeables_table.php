<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikeablesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('likeables', function (Blueprint $table) {
      $table->primary(['user_id', 'likeable_id', 'likeable_type']);
      $table->foreignId('user_id')->constrained()->cascadeOnDelete();
      $table->unsignedBigInteger('likeable_id');
      $table->string('likeable_type');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('likeables');
  }
}
