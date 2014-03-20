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

    $set = new Setting;
    $set->key = "dividend_owner";
    $set->value = 1;
    $set->save();

    $set = new Setting;
    $set->key = "dividend_other";
    $set->value = 0.1;
    $set->save();

    $set = new Setting;
    $set->key = "recession";
    $set->value = 0.2;
    $set->save();

  }

}