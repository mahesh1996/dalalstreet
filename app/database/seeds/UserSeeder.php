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
        $user->save();
      }

      $user = new User;
      $user->name = "Projector Client";
      $user->email = "projector@dalalstreet";
      $user->password = Hash::make("hjv_ds_projector");
      $user->type = 2;
      $user->save();

      $user = new User;
      $user->name = "News Client";
      $user->email = "news@dalalstreet";
      $user->password = Hash::make("hjv_ds_news");
      $user->type = 3;
      $user->save();

      $user = new User;
      $user->name = "Administrator";
      $user->email = "administrator@dalalstreet";
      $user->password = Hash::make("hjv_admin_ds");
      $user->type = 4;
      $user->save();

    });

  }

}