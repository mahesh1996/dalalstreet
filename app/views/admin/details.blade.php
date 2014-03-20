@extends('layout')

@section('javascript')
  <script src="/assets/js/admin.js"></script>
@stop

@section('body')
<div class="ds-nav">
  <h4 class="no-margin-top">DALAL &middot; STREET</h4>
  <h5><a href="{{ route('logout') }}" class="btn btn-info btn-xs"><strong>Logout</strong></a> <a href="{{ route('admin') }}" class="btn btn-info btn-xs"><strong>Administration</strong> - Back to Administration</a></h5>
  <hr>
</div>
<div class="container-fluid main-container" id="admin-updater-main">
@include('admin.part')
</div>
@stop