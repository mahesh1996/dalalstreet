<?php

class PlayerSeeder extends Seeder {

  public function run() {

    Eloquent::unguard();

    $total_players = Config::get('dalalstreet.total_players');
    $total_companies = Config::get('dalalstreet.total_companies');

    DB::transaction(function() use($total_companies, $total_players) {
      for($i=1; $i<=$total_players; $i++) {
        $player = new Player;
        for($j=1; $j<=$total_companies; $j++) {
          $player->companies()->attach($j);
        }
        $player->save();
      }
    });

  }

}
