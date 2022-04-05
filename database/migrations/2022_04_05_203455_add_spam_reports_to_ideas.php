<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpamReportsToIdeas extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('ideas', function (Blueprint $table) {
      $table->integer('spam_reports')->default(0)->after('votes_count');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('ideas', function (Blueprint $table) {
      $table->dropColumn('spam_reports');
    });
  }
}
