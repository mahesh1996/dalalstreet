@extends('layout')

@section('javascript')
  <script src="/assets/js/broker.js"></script>
@stop

@section('body')
<div class="ds-nav">
  <h4 class="no-margin-top">DALAL &middot; STREET</h4>
  <h5><a href="{{ route('logout') }}" class="btn btn-info btn-xs"><strong>Logout</strong> - {{ $broker->name }}</a>@if(Auth::user()->role == 'admin') <a data-toggle="modal" data-target="#cheat-modal" class="btn btn-info btn-xs"><strong>Change</strong> - Bring The Awesome</a> @endif</h5>
  <hr>
</div>

<input type="hidden" id="fake-broker-id" value="{{ (Auth::user()->role == 'admin') ? Input::get('id') : 0 }}" autocomplete="off">

<div class="container-fluid main-container" id="broker-main">
  @include('broker.part')
</div>
@stop

@section('after-body')
<div class="modal fade in" id="cheat-modal" tabindex="-1" role="dialog" aria-labelledby="buy-modal-title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="buy-modal-title">Cheat Book</h4>
      </div>
      <form id="cheat-form" role="form">
      <div class="modal-body">
        <label>Select Player</label>
        <select class="form-control" name="cheated_player" autocomplete="off" required>
          @foreach($players as $player)
            <option value="{{ $player->id }}">Player #{{ $player->id }}</option>
          @endforeach
        </select>
        <br>
        <label>Change Cash In Hand</label>
        <input type="text" name="cheated_money" class="form-control" autocomplete="off" required>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-block" id="cheat-them-go">Cheat Them</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop