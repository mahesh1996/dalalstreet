<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DalalstreetSystemSetup extends Migration {

  public function up() {

    Schema::create('companies', function($table) {
      $table->increments('id')->unsigned();
      $table->string('name');
      $table->string('code');
      $table->decimal('total_shares', 9, 0)->unsigned();
      $table->decimal('available_shares', 9, 0)->unsigned();
      $table->decimal('market_price', 10, 2)->unsigned();
      $table->decimal('old_market_price', 10, 2)->default(0);
    });

    Schema::create('players', function($table) {
      $table->increments('id')->unsigned();
      $table->decimal('total_cash_in_hand', 9, 0)->default(Config::get('dalalstreet.starting_cash'))->unsigned();
    });

    Schema::create('company_player', function($table) {
      $table->integer('company_id')->unsigned();
      $table->integer('player_id')->unsigned();
      $table->decimal('total_shares', 9, 0)->unsigned();
      $table->foreign('company_id')->references('id')->on('companies');
      $table->foreign('player_id')->references('id')->on('players');
      $table->index(array('company_id', 'player_id'));
    });

  }

  public function down() {
    Schema::drop('company_player');
    Schema::drop('players');
    Schema::drop('companies');
  }

}