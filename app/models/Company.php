<?php

class Company extends Eloquent {

  protected $table = "companies";
  public $timestamps = false;

  protected $attrib_delta = null;

  public function players() {
    return $this->belongsToMany('Player')->withPivot('total_shares');
  }

  public function getDeltaAttribute() {
    if($this->attributes['market_price'] == 0 ) return 0;
    if(is_null($this->attrib_delta)) $this->attrib_delta = round(100*(($this->attributes['market_price'] - $this->attributes['old_market_price'])/ $this->attributes['market_price']), 2);
    return $this->attrib_delta;
  }

}