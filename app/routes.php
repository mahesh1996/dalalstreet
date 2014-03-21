<?php


Route::group(array('before' => 'auth'), function() {

  Route::get('broker', array('as' => 'broker', 'uses' => 'BrokerController@index'));
  Route::post('broker/part', 'BrokerController@part');

  Route::post('buy', 'TradeController@buy');

  Route::post('sell', 'TradeController@sell');
  Route::post('sell/all', 'TradeController@sellAll');

  Route::get('projector', array('as' => 'projector', 'uses' => 'ProjectorController@index'));
  Route::post('projector/part', 'ProjectorController@part');

  Route::get('news', array('as' => 'news', 'uses' => 'NewsController@index'));
  Route::post('news', array('as' => 'create_news', 'uses' => 'NewsController@create'));
  Route::post('news/part', 'NewsController@part');

  Route::post('money_cheat', array('as' => 'money_cheat', 'uses' => 'AdminController@money_cheat'));

  Route::get('player_details', array('as' => 'player_details', 'uses' => 'AdminController@player_details'));
  Route::post('player_details/part', 'AdminController@player_details_part');

Route::group(array('before' => 'admin'), function() {

  Route::get('admin', array('as' => 'admin', 'uses' => 'AdminController@index'));
  
  Route::post('admin/create_company', array('as' => 'create_company', 'uses' => 'AdminController@create_company'));
  Route::post('admin/change_company', array('as' => 'change_company', 'uses' => 'AdminController@change_company'));
  Route::post('admin/change_company_per', array('as' => 'change_company_per', 'uses' => 'AdminController@change_company_per'));

  Route::post('admin/set_buy_ratio', array('as' => 'set_buy_ratio', 'uses' => 'AdminController@set_buy_ratio'));
  Route::post('admin/set_sell_ratio', array('as' => 'set_sell_ratio', 'uses' => 'AdminController@set_sell_ratio'));
  Route::post('admin/give_dividend', array('as' => 'give_dividend', 'uses' => 'AdminController@give_dividend'));
  Route::post('admin/do_recession', array('as' => 'do_recession', 'uses' => 'AdminController@do_recession'));
  Route::post('admin/finish_the_game', array('as' => 'finish_the_game', 'uses' => 'AdminController@finish_the_game'));
  Route::post('admin/reset_the_game', array('as' => 'reset_the_game', 'uses' => 'AdminController@reset_the_game'));

});

  Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));

});

Route::group(array('before' => 'guest'), function() {
  Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
  Route::get('login', array('as' => 'login', 'uses' => 'UserController@login'));
  Route::post('login', array('uses' => 'UserController@attempt_login'));
});