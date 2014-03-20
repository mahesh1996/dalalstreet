@extends('layout')

@section('javascript')
  <!--<script src="/assets/js/admin.js"></script>-->
@stop

@section('body')
<div class="ds-nav">
  <h4 class="no-margin-top">DALAL &middot; STREET</h4>
  <h5><a href="{{ route('logout') }}" class="btn btn-info btn-xs"><strong>Logout</strong></a> <a href="{{ route('player_details') }}" class="btn btn-info btn-xs"><strong>Player Scores</strong> - Player Details</a></h5>
  <hr>
</div>
<div class="container-fluid">
<div class="row">
  <div class="page-header text-center no-margin-top">
    <h5>Bring The Awesome</h5>
  </div>
<div class="col-lg-4">
  @include('admin.component.company')
</div>
<div class="col-lg-4">
  @include('admin.component.conspiracy')
</div>
<div class="col-lg-4">
  @include('admin.component.news')
</div>
</div>
<div class="row">
  <div class="page-header text-center no-margin-top">
    <h5>Game Changer</h5>
  </div>
<div class="col-lg-4">
  @include('admin.component.spark')
</div>
<div class="col-lg-4">
  @include('admin.component.dividend')
</div>
<div class="col-lg-4">
  @include('admin.component.recession')
</div>
</div>
<div class="row">
  <div class="page-header text-center no-margin-top">
    <h5>The End</h5>
  </div>
<div class="col-lg-6">
  @include('admin.component.finish')
</div>
<div class="col-lg-6">
  @include('admin.component.reset')
</div>
</div>
</div>
@stop