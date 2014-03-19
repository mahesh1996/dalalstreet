<?php

class UserSeeder extends Seeder {

  public function run() {

    Eloquent::unguard();

    $total_players = Config::get('dalalstreet.total_players') / 2;

    DB::transaction(function() use($total_players) {
      for($i=1; $i<=$total_players; $i++) {
        $user = new User;
        $user->email = "broker_".$i."@dalalstreet";
        $user->password = Hash::make("hjv_ds_".$i);
        $user->save();
      }
    });

  }

}