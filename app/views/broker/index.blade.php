@extends('layout')

@section('javascript')
  <script src="/assets/js/broker.js"></script>
@stop

@section('body')
<div class="container-fluid main-container" id="broker-main">
  @include('broker.part')
</div>
@stop