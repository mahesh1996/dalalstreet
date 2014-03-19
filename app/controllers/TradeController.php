<?php

class TradeController extends BaseController {

	public function buy() {

		$player_id = (int) Input::get('player_id');
    $company_id = (int) Input::get('company_id');
    $number = (int) Input::get('number_of_shares');

    $player = Player::with(array('companies' => function($companies) use($company_id) {
      $companies->where('company_id', $company_id);
    }))->where('id', $player_id)->first();
    $company = Company::find($company_id);

    $buy_ratio = Setting::where("key", "buy_ratio")->first();

    if($company->available_shares < $number) return Response::json(array('status' => 0)); // SHARE OUT OF STOCK

    if($player->total_cash_in_hand < ($company->market_price * $number)) return Response::json(array('status' => 1)); // NOT ENOUGH MONEY

    $new_market_price = $company->market_price + ( ( $company->market_price * $number * $buy_ratio->value ) / $company->total_shares );

    if($new_market_price < 0) $new_market_price = 0;

    DB::transaction(function() use($company, $player, $company_id, $number, $new_market_price, $player_id) {

      $player->total_cash_in_hand = $player->total_cash_in_hand - $number * $company->market_price;
      $player->update();

      DB::table('company_player')->where('company_id', $company_id)->where('player_id', $player_id)->increment('total_shares', $number);

      $company->old_market_price = $company->market_price;
      $company->market_price = $new_market_price;
      $company->available_shares = $company->available_shares - $number;
      $company->update();

    });

    return Response::json(array('status' => 2));
	}

  public function sell() {

    $player_id = Input::get('player_id');
    $company_id = Input::get('company_id');
    $number = Input::get('number_of_shares');

    $player = Player::with(array('companies' => function($companies) use($company_id) {
      $companies->where('company_id', $company_id);
    }))->where('id', $player_id)->firstOrFail();

    $company = Company::find($company_id);

    $sell_ratio = Setting::where("key", "sell_ratio")->first();

    $new_market_price = $company->market_price - ( ( $company->market_price * $number * $sell_ratio->value) / $company->total_shares );
    if($new_market_price < 1) $new_market_price = 7.73;

    if($player->companies[0]->pivot->total_shares < $number) return Response::json(array('status' => 0)); // DO NOT HAVE THAT MUCH SHARES

    DB::transaction(function() use($company, $player, $company_id, $number, $new_market_price, $player_id) {

      $player->total_cash_in_hand = $player->total_cash_in_hand + $number * $company->market_price;
      $player->update();

      DB::table('company_player')->where('company_id', $company_id)->where('player_id', $player_id)->decrement('total_shares', $number);

      $company->old_market_price = $company->market_price;
      $company->market_price = $new_market_price;
      $company->available_shares = $company->available_shares + $number;
      $company->update();

    });

    return Response::json(array('status' => 1));
  }

  public function sellAll() {

    $player_id = Input::get('player_id');
    $company_id = Input::get('company_id');

    $player = Player::with(array('companies' => function($companies) use($company_id) {
      $companies->where('company_id', $company_id);
    }))->where('id', $player_id)->firstOrFail();

    $number = $player->companies[0]->pivot->total_shares;

    $company = Company::find($company_id);

    $sell_ratio = Setting::where("key", "sell_ratio")->first();

    $new_market_price = $company->market_price - ( ( $company->market_price * $number * $sell_ratio->value) / $company->total_shares );
    if($new_market_price < 0) $new_market_price = 0;

    if($player->companies[0]->pivot->total_shares < $number) return Response::json(array('status' => 0)); // DO NOT HAVE THAT MUCH SHARES

    DB::transaction(function() use($company, $player, $company_id, $number, $new_market_price, $player_id) {

      $player->total_cash_in_hand = $player->total_cash_in_hand + $number * $company->market_price;
      $player->update();

      DB::table('company_player')->where('company_id', $company_id)->where('player_id', $player_id)->decrement('total_shares', $number);

      $company->old_market_price = $company->market_price;
      $company->market_price = $new_market_price;
      $company->available_shares = $company->available_shares + $number;
      $company->update();

    });

    return Response::json(array('status' => 1));
  }

}