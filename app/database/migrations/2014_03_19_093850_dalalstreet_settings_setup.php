<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DalalstreetSettingsSetup extends Migration {

  public function up() {
    Schema::create("ds_settings", function($table) {
      $table->string("key");
      $table->decimal("value", 5, 2);
    });
  }

  public function down() {
    Schema::drop("ds_settings");
  }

}