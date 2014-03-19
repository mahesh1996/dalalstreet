<?php

class CompanySeeder extends Seeder {

  public function run() {

    Eloquent::unguard();

    $comp = new Company;
    $comp->name = 'Tata Motors';
    $comp->code = 'TAM';
    $comp->total_shares = 50000;
    $comp->available_shares = 50000;
    $comp->market_price = 10;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Reliance Petroleum';
    $comp->code = 'REL';
    $comp->total_shares = 60000;
    $comp->available_shares = 60000;
    $comp->market_price = 10;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Adani';
    $comp->code = 'ADA';
    $comp->total_shares = 10000;
    $comp->available_shares = 10000;
    $comp->market_price = 10;
    $comp->save();

    $comp = new Company;
    $comp->name = 'L & T';
    $comp->code = 'LNT';
    $comp->total_shares = 70000;
    $comp->available_shares = 70000;
    $comp->market_price = 10;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Essar';
    $comp->code = 'ESS';
    $comp->total_shares = 40000;
    $comp->available_shares = 40000;
    $comp->market_price = 10;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Gujarat Gas';
    $comp->code = 'GGA';
    $comp->total_shares = 25000;
    $comp->available_shares = 25000;
    $comp->market_price = 10;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Google';
    $comp->code = 'GOO';
    $comp->total_shares = 90000;
    $comp->available_shares = 90000;
    $comp->market_price = 10;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Apple';
    $comp->code = 'APL';
    $comp->total_shares = 90000;
    $comp->available_shares = 90000;
    $comp->market_price = 10;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Motorola';
    $comp->code = 'MOT';
    $comp->total_shares = 60000;
    $comp->available_shares = 60000;
    $comp->market_price = 10;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Samsung';
    $comp->code = 'SAM';
    $comp->total_shares = 100000;
    $comp->available_shares = 100000;
    $comp->market_price = 10;
    $comp->save();

  }

}