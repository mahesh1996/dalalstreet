<?php

class AdminController extends BaseController {

	public function index() {
    $broker = Auth::user();
    $settings = Setting::all();
    $news = News::orderBy('id', 'desc')->first();
    $players = Player::orderBy('total_cash_in_hand', 'desc')->get();
    $companies = Company::all();
		$title = "Admin - Dalal Street";
		return View::make("admin.index", compact('broker','title', 'players', 'settings', 'news', 'companies'));
	}

  public function part() {
    $companies = Company::all();
    $players = Player::orderBy('total_cash_in_hand', 'desc')->get();
    return View::make("admin.part", compact('players', 'companies'));
  }

  public function set_buy_ratio() {
    $setting = Setting::where("key", "buy_ratio");
    $setting->update(array("value" => Input::get("buy_ratio")));
    return Redirect::to("admin");
  }

  public function set_sell_ratio() {
    $setting = Setting::where("key", "sell_ratio");
    $setting->update(array("value" => Input::get("sell_ratio")));
    return Redirect::to("admin");
  }

  public function change_company() {
    $company = Company::where('id', Input::get('comp_select'))->first();
    Company::where('id', Input::get('comp_select'))->update(array('market_price' => Input::get('comp_market_price_cons'), 'old_market_price' => $company->market_price));
    return Redirect::to("admin");
  }

  public function give_dividend() {
    $dividend = Config::get('dalalstreet.dividend');

    $players = Player::with(array('companies' => function($companies) {
      $companies->where('company_player.total_shares', '>', 0);
    }))->get();

    DB::transaction(function() use($players, $dividend) {
      foreach ($players as $player) {
        foreach ($player->companies as $company) {
          DB::table('players')->where('id', $player->id)->increment('total_cash_in_hand', $company->pivot->total_shares * $company->market_price * $dividend);
        }
      }
    });
    return Redirect::to("admin");
  }

  public function finish_the_game() {

    $players = Player::with(array('companies' => function($companies) {
      $companies->where('company_player.total_shares', '>', 0);
    }))->get();

    DB::transaction(function() use($players) {
      foreach ($players as $player) {
        foreach ($player->companies as $company) {
          DB::table('companies')->where('id', $company->id)->increment('available_shares', $company->pivot->total_shares);
          DB::table('company_player')->where('company_id', $company->id)->where('player_id', $player->id)->update(array('total_shares' => 0));
          DB::table('players')->where('id', $player->id)->increment('total_cash_in_hand', $company->pivot->total_shares * $company->market_price);
        }
      }
    });
    return Redirect::to("admin");
  }

  public function reset_the_game() {

    DB::transaction(function() {
      DB::table('players')->update(array('total_cash_in_hand' => Config::get('dalalstreet.starting_cash')));
    });

    return Redirect::to("admin");
  }

  public function do_recession() {

    $players = Player::all();

    $recession = Input::get('recession_input');//Config::get('dalalstreet.recession');

    DB::transaction(function() use($players, $recession) {
      foreach ($players as $player) {
        DB::table('players')->where('id', $player->id)->decrement('total_cash_in_hand', $player->total_cash_in_hand * $recession);
      }
    });
    return Redirect::to("admin");
  }

  public function create_company() {

    DB::transaction(function() {

    $total_players = Config::get('dalalstreet.total_players');

    $comp = new Company;
    $comp->name = Input::get('comp_name');
    $comp->code = strtoupper(Input::get('comp_code'));
    $comp->total_shares = Input::get('comp_total_shares');
    $comp->available_shares = Input::get('comp_total_shares');
    $comp->market_price = Input::get('comp_market_price');
    $comp->save();

    for($i=1; $i<=$total_players; $i++) {
      $player = Player::find($i);
      $player->companies()->attach($comp->id);
    }

    });

    return Redirect::to("admin");
  }

}