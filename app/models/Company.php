<?php

class Company extends Eloquent {

  protected $table = "companies";
  public $timestamps = false;

  protected $attrib_delta = null;
  protected $attrib_ts = null;
  protected $attrib_as = null;
  protected $attrib_mp = null;

  public function players() {
    return $this->belongsToMany('Player')->withPivot('total_shares');
  }

  public function getDeltaAttribute() {
    if($this->attributes['market_price'] == 0 ) return 0;
    if(is_null($this->attrib_delta)) $this->attrib_delta = round(100*(($this->attributes['market_price'] - $this->attributes['old_market_price'])/ $this->attributes['market_price']), 2);
    return $this->attrib_delta;
  }

  public function getPrintTotalSharesAttribute() {
    if(is_null($this->attrib_ts)) $this->attrib_ts = number_format($this->attributes['total_shares']);
    return $this->attrib_ts;
  }

  public function getPrintAvailableSharesAttribute() {
    if(is_null($this->attrib_as)) $this->attrib_as = number_format($this->attributes['available_shares']);
    return $this->attrib_as;
  }

  public function getPrintMarketPriceAttribute() {
    if(is_null($this->attrib_mp)) $this->attrib_mp = number_format($this->attributes['market_price'], 2);
    return $this->attrib_mp;
  }

  public function doTrade() {

  }

}