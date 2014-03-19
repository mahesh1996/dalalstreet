<?php

class NewsController extends BaseController {

	public function index() {
    $title = "News - Dalal Street";
    $news = News::orderBy('id', 'desc')->take(10)->get();
    return View::make("news.index", compact('title', 'news'));
	}

  public function part() {
    $news = News::orderBy('id', 'desc')->take(10)->get();
    return View::make("news.part", compact('news'));
  }

  public function create() {
    $news = new News;
    $news->text = Input::get('news_input');
    $news->type = Input::get('news_type');
    $news->save();
    return Redirect::to('admin');
  }

}