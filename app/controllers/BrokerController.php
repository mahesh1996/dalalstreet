<?php

class BrokerController extends BaseController {

  public function index() {

    if(Auth::user()->role == 'admin') $broker = User::find(Input::get('id', 1));
    else $broker = Auth::user();
    $player_count = ($broker->id*2) - 1;
    $title = $broker->name." - Dalal Street";
    $players = Player::with('companies')->whereIn('id', array(($broker->id*2)-1, $broker->id*2))->take(2)->get();
    return View::make("broker.index", compact('broker','title', 'players', 'player_count'));
  }

  public function part() {
    if(Auth::user()->role == 'admin') $broker = User::find(Input::get('id', 1));
    else $broker = Auth::user();
    $players = Player::with('companies')->whereIn('id', array(($broker->id*2)-1, $broker->id*2))->take(2)->get();
    $player_count = ($broker->id*2) - 1;
    return View::make("broker.part", compact('broker', 'players', 'player_count'));
  }

}