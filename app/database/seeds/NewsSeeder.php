<?php

class NewsSeeder extends Seeder {

  public function run() {

    Eloquent::unguard();

    $news = new News;
    $news->text = "Dalal Street Started";
    $news->save();

  }

}