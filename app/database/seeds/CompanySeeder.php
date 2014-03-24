<?php

class CompanySeeder extends Seeder {

  public function run() {

    Eloquent::unguard();

    $comp = new Company;
    $comp->name = 'Tata Motors';
    $comp->code = 'TAM';
    $comp->total_shares = 500000;
    $comp->available_shares = 500000;
    $comp->market_price = 100;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Google';
    $comp->code = 'GOO';
    $comp->total_shares = 900000;
    $comp->available_shares = 900000;
    $comp->market_price = 200;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Reliance Petroleum';
    $comp->code = 'REL';
    $comp->total_shares = 600000;
    $comp->available_shares = 600000;
    $comp->market_price = 100;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Adani';
    $comp->code = 'ADA';
    $comp->total_shares = 100000;
    $comp->available_shares = 100000;
    $comp->market_price = 70;
    $comp->save();

    $comp = new Company;
    $comp->name = 'L & T';
    $comp->code = 'LNT';
    $comp->total_shares = 700000;
    $comp->available_shares = 700000;
    $comp->market_price = 150;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Whatsapp';
    $comp->code = 'WHA';
    $comp->total_shares = 1500000;
    $comp->available_shares = 1500000;
    $comp->market_price = 20;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Essar';
    $comp->code = 'ESS';
    $comp->total_shares = 400000;
    $comp->available_shares = 400000;
    $comp->market_price = 110;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Facebook';
    $comp->code = 'FAB';
    $comp->total_shares = 250000;
    $comp->available_shares = 250000;
    $comp->market_price = 50;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Samsung';
    $comp->code = 'SAM';
    $comp->total_shares = 1000000;
    $comp->available_shares = 1000000;
    $comp->market_price = 120;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Apple';
    $comp->code = 'APL';
    $comp->total_shares = 900000;
    $comp->available_shares = 900000;
    $comp->market_price = 200;
    $comp->save();

    $comp = new Company;
    $comp->name = 'Infosys';
    $comp->code = 'INF';
    $comp->total_shares = 600000;
    $comp->available_shares = 600000;
    $comp->market_price = 140;
    $comp->save();

  }

}