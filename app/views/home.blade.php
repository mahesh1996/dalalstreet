@extends('layout')

@section('body')
<div class="ds-nav">
  <h4 class="no-margin-top">{{ Config::get('dalalstreet.title') }}</h4>
  <h5><a class="btn btn-info btn-xs"><strong>{{ Config::get('dalalstreet.tag_line') }}</strong></a></h5>
  <hr>
</div>
<div class="container-fluid main-container">
  <div class="row inner-container text-center">
    <h3 class="no-margin-top">KEEP CALM</h3>
    <h4>AND</h4>
    <h3 class="no-margin-top">FEEL THE AWESOMENESS</h3>
    <p><a href="{{ route('login') }}" class="btn btn-info btn-sm"><strong>Login</strong> - Let's Roll</a></p>
  </div>
</div>
<p class="ds-bottom-text">Brought to you by <strong>Harsh Vakharia</strong></p>
@stop