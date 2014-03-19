<?php

class NewsSeeder extends Seeder {

  public function run() {

    Eloquent::unguard();

    $news = new News;
    $news->text = "Reliance acquired Google - LOL -_-";
    $news->save();

    $news = new News;
    $news->text = "Mukesh Ambani donated 5 million dollars to Gates Foundation - LOL -_-";
    $news->save();

    $news = new News;
    $news->text = "Manmohan Singh Spoke Today -_-";
    $news->type = "danger";
    $news->save();

    $news = new News;
    $news->text = "Yo man";
    $news->type = "warning";
    $news->save();

    $news = new News;
    $news->text = "OKay";
    $news->type = "info";
    $news->save();

    $news = new News;
    $news->text = "PIPPPPPP";
    $news->type = "success";
    $news->save();

  }

}