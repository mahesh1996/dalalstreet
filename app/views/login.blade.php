@extends('layout')
@section('body')
<div class="container-fluid main-container">
  <div class="row inner-container">
    <div class="col-lg-offset-3 col-lg-3 col-md-offset-3 col-md-3 col-sm-6 col-xs-6 text-left">
      {{ Form::open(array('action' => 'UserController@attempt_login', 'role' => 'form', 'class' => 'form-centered')) }}
        <div class="form-group">
          <label for="email">Email</label>
          <input tabindex="1" type="email" class="form-control" id="email" name="email" value="{{ Input::old('email') }}" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input tabindex="2" type="password" class="form-control" id="password" name="password" required>
        </div>
        <button tabindex="4" type="submit" class="btn btn-default btn-block">Login</button>
      </form>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
      <h3>DALAL STREET</h3>
      <p>A Stock Market Game Simulator</p>
    </div>
  </div>
</div>
@stop