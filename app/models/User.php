<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface{

  protected $table = 'users';
	protected $remember_token;
  protected $hidden = array('password');
  public $timestamps = false;

  public static function getLoginRules() {
    return array('email' => 'required', 'password' => 'required');
  }

  public function getAuthIdentifier() {
    return $this->getKey();
  }

  public function getAuthPassword() {
    return $this->password;
  }

  public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}
}