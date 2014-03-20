<?php

class HomeController extends BaseController {

	public function index() {
    return View::make("home");
	}

  public function part() {
    $companies = Company::all();
    return View::make("projector.part", compact('companies'));
  }

}