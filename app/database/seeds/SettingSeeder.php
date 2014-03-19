<?php

class SettingSeeder extends Seeder {

  public function run() {

    Eloquent::unguard();

    $set = new Setting;
    $set->key = "buy_ratio";
    $set->value = 1.50;
    $set->save();

    $set = new Setting;
    $set->key = "sell_ratio";
    $set->value = 0.75;
    $set->save();

  }

}