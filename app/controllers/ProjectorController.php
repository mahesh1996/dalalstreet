<?php

class ProjectorController extends BaseController {

	public function index() {
    $title = "Projector - Dalal Street";
    $companies = Company::all();
    return View::make("projector.index", compact('title', 'companies'));
	}

  public function part() {
    $companies = Company::all();
    return View::make("projector.part", compact('companies'));
  }

}