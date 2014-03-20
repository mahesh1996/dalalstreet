<?php

class Player extends Eloquent {

  protected $table = "players";
  public $timestamps = false;
  protected $attrib_delta = null;
  protected $attrib_tcih = null;

  public function companies() {
    return $this->belongsToMany('Company')->withPivot('total_shares');
  }

  public function getDeltaAttribute() {
    if($this->attributes['total_cash_in_hand'] == 0 ) return 0;
    if(is_null($this->attrib_delta)) $this->attrib_delta = round(100 * ( $this->attributes['total_cash_in_hand'] - Config::get('dalalstreet.starting_cash') ) / $this->attributes['total_cash_in_hand'], 2);
    return $this->attrib_delta;
  }

  public function getPrintTotalCashInHandAttribute() {
    if(is_null($this->attrib_tcih)) $this->attrib_tcih = number_format($this->attributes['total_cash_in_hand']);
    return $this->attrib_tcih;
  }

}