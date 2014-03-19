<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DalalstreetNewsSystem extends Migration {

  public function up() {
    Schema::create('news', function($table) {
      $table->increments('id')->unsigned();
      $table->string('text');
      $table->string('type')->default('default');
    });
  }

  public function down() {
    Schema::drop('news');
  }

}
