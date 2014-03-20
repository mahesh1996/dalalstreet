@extends('layout')

@section('body')
<div class="ds-nav">
  <h4 class="no-margin-top">DALAL &middot; STREET</h4>
  <h5><a href="{{ route('home') }}" class="btn btn-info btn-xs"><strong>&larr; Home</strong></a></h5>
  <hr>
</div>
<div class="container-fluid main-container">
  <div class="row inner-container">
    <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 text-left login-container">
      {{ Form::open(array('action' => 'UserController@attempt_login', 'role' => 'form')) }}
        <div class="form-group">
          <label for="email">Email</label>
          <input tabindex="1" type="email" class="form-control input-sm" id="email" name="email" value="{{ Input::old('email') }}" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input tabindex="2" type="password" class="form-control input-sm" id="password" name="password" required>
        </div>
        <button tabindex="3" type="submit" class="btn btn-info btn-block btn-sm"><strong>Login</strong> - Let's Roll</button>
      </form>
    </div>
  </div>
</div>
<p class="ds-bottom-text">Brought to you by <strong>Harsh Vakharia</strong></p>
@stop