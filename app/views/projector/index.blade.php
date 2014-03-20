@extends('layout')

@section('javascript')
  <script src="/assets/js/projector.js"></script>
@stop

@section('body')
<div class="ds-nav">
  <h4 class="no-margin-top">DALAL &middot; STREET</h4>
  <h5><a href="{{ route('logout') }}" class="btn btn-info btn-xs"><strong>Logout</strong></a></h5>
  <hr>
</div>
<div class="container-fluid main-container">
<div class="inner-container" id="projector-main">
  @include('projector.part')
</div>
</div>
<p class="ds-bottom-text">Brought to you by <strong>Harsh Vakharia</strong></p>
@stop