@extends('layout')

@section('javascript')
  <script src="/assets/js/admin.js"></script>
@stop

@section('body')
<div class="ds-nav">
  <h4 class="no-margin-top">DALAL &middot; STREET</h4>
  @if(Auth::user()->role == 'admin')
  <h5><a href="{{ route('logout') }}" class="btn btn-info btn-xs"><strong>Logout</strong></a> <a href="{{ route('admin') }}" class="btn btn-info btn-xs"><strong>Administration</strong> - Back to Administration</a></h5>
  @else
  <h5><a href="{{ route('logout') }}" class="btn btn-info btn-xs"><strong>Logout</strong></a></h5>
  @endif
  <hr>
</div>
<div class="container-fluid main-container" id="detail-updater">
@include('admin.part')
</div>
@stop