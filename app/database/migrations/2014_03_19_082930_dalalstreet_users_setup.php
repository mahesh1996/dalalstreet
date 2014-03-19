<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DalalstreetUsersSetup extends Migration {

  public function up() {
    Schema::create('users', function($table) {
      $table->increments('id')->unsigned();
      $table->string('email');
      $table->string('password');
      $table->tinyInteger('type')->default(1);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::drop('users');
  }

}