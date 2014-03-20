<?php

class UserController extends BaseController {

  public function login() {
    return View::make('login', array('title' => 'Login - Dalal Street'));
  }

  public function attempt_login() {

    $validator = Validator::make(Input::all(), User::getLoginRules());
    if($validator->fails()) {
      return Redirect::back()->withInput(Input::except('password'))->withErrors($validator);
    }

    if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), false)) {
      $user = Auth::user();
      if(Hash::needsRehash($user->password)) {
        $user->password = Hash::make(Input::get('password'));
        $user->save();
      }
      if($user->type == 1) return Redirect::to('/broker');
      if($user->type == 2) return Redirect::to('/projector');
      if($user->type == 3) return Redirect::to('/news');
      return Redirect::to('/admin');
    }
    else {
      return Redirect::back()->withInput(Input::except('password'));
    }

  }

  public function logout() {
    Auth::logout();
    return Redirect::to('/');
  }

}