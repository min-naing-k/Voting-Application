<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpamReportsToCommentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('comments', function (Blueprint $table) {
      $table->integer('spam_reports')->default(0)->after('body');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('comments', function (Blueprint $table) {
      $table->dropColumn('spam_reports');
    });
  }
}
