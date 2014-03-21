<?php

class UserSeeder extends Seeder {

  public function run() {

    Eloquent::unguard();

    $total_players = Config::get('dalalstreet.total_players') / 2;

    DB::transaction(function() use($total_players) {

      for($i=1; $i<=$total_players; $i++) {
        $user = new User;
        $user->name = "Broker #".$i;
        $user->email = "broker_".$i."@dalalstreet";
        $user->password = Hash::make("hjv_ds_".$i);
        $user->role = 'broker';
        $user->save();
      }

      $user = new User;
      $user->name = "Projector Client";
      $user->email = "projector@dalalstreet";
      $user->password = Hash::make("hjv_ds_projector");
      $user->role = 'projector';
      $user->save();

      $user = new User;
      $user->name = "Administrator";
      $user->email = "administrator@dalalstreet";
      $user->password = Hash::make("hjv_admin_ds");
      $user->role = 'admin';
      $user->save();

    });

  }

}