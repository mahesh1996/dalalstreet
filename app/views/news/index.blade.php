@extends('layout')

@section('javascript')
  <script src="/assets/js/news.js"></script>
@stop

@section('body')
<div class="container-fluid main-container">
<div class="inner-container">
  <div class="panel panel-default text-center" id="main-news" style="margin-bottom:0">
    @include('news.part')
  </div>
</div>
</div>
@stop