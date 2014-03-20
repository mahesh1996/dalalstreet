@extends('layout')
@section('body')
<div class="container-fluid main-container">
  <div class="row inner-container text-center">
    <h3>DALAL STREET</h3>
    <p>A Stock Market Game Simulator</p>
    <small>Developed by Harsh Vakharia &middot; Contributed by Anand Patel</small>
    <br>
    <br>
    <a href="{{ route('login') }}" class="btn btn-default btn-sm">Login</a>
  </div>
</div>
@stop