<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

  protected $table = 'users';

  protected $hidden = array('password');

  public static function getLoginRules() {
    return array('email' => 'required', 'password' => 'required');
  }

  public function getAuthIdentifier() {
    return $this->getKey();
  }

  public function getAuthPassword() {
    return $this->password;
  }

}