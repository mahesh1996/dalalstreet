@extends('layout')

@section('javascript')
  <script src="/assets/js/broker.js"></script>
@stop

@section('body')
<div class="ds-nav">
  <h4 class="no-margin-top">DALAL &middot; STREET</h4>
  <h5><a href="{{ route('logout') }}" class="btn btn-info btn-xs"><strong>Logout</strong> - {{ $broker->name }}</a></h5>
  <hr>
</div>
<div class="container-fluid main-container" id="broker-main">
  @include('broker.part')
</div>
@stop