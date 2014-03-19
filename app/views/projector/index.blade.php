@extends('layout')

@section('javascript')
  <script src="/assets/js/projector.js"></script>
@stop

@section('body')
<div class="container-fluid main-container">
<div class="inner-container">
  <div class="panel panel-default projector-table" style="margin-bottom:0">
    <div class="panel-heading text-center"><h4>DALAL &middot; STREET</h4></div>
    <div id="projector-main">
      @include('projector.part')
    </div>
  </div>
</div>
</div>
@stop