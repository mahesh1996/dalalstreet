@extends('layout')

@section('javascript')
  <script src="/assets/js/admin.js"></script>
@stop

@section('body')
<div class="container-fluid main-container" id="broker-main">

<div class="row inner-container">
<div class="page-header text-center" style="margin-top:0"><h4>DALAL &middot; STREET <small><a href="{{ route('logout') }}" class="btn btn-default btn-xs" style="margin-top:-6px">Admin <strong>Logout</strong></a></small></h4></div>

<div class="col-lg-4">
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>New Company</h4>
  </div>
  <div class="panel-body">
  {{ Form::open(array('action' => 'create_company', 'role' => 'form')) }}
  <label for="comp_name">Name</label>
  <input class="form-control" type="text" id="comp_name" name="comp_name" type="text" autocomplete="off" required>
  <br>
  <label for="comp_code">Code</label>
  <input class="form-control" type="text" id="comp_code" name="comp_code" type="text" autocomplete="off" required>
  <br>
  <label for="comp_total_shares">Total Shares</label>
  <input class="form-control" type="text" id="comp_total_shares" name="comp_total_shares" type="text" autocomplete="off" required>
  <br>
  <label for="comp_market_price">Market Price</label>
  <input class="form-control" type="text" id="comp_market_price" name="comp_market_price" type="text" autocomplete="off" required>
  <br>
  <button type="submit" class="btn btn-primary btn-block" type="button">Launch</button>
  </form>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Conspiracy</h4>
  </div>
  <div class="panel-body">
  {{ Form::open(array('action' => 'change_company', 'role' => 'form')) }}
  <label for="comp_select">Company</label>
  <select class="form-control" name="comp_select">
    @foreach($companies as $company)
      <option value="{{ $company->id }}">{{ $company->name }}</option>
    @endforeach
  </select>
  <br>
  <label for="comp_market_price_cons">Market Price</label>
  <input class="form-control" type="text" id="comp_market_price_cons" name="comp_market_price_cons" type="text" autocomplete="off" required>
  <br>
  <button type="submit" class="btn btn-primary btn-block" type="button">Just Do It</button>
  </form>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>News</h4>
  </div>
  <div class="panel-body">
  {{ Form::open(array('action' => 'create_news', 'role' => 'form')) }}
  <label for="news_input">News Type</label>
  <select class="form-control" autocomplete="off" name="news_type">
    <option value="default" selected>Default</option>
    <option value="danger">Danger</option>
    <option value="success">Success</option>
    <option value="info">Info</option>
    <option value="warning">Warning</option>
  </select>
  <br>
  <label for="news_input">New News</label>
  <input class="form-control" type="text" value="{{ $news->text }}" id="news_input" name="news_input" type="text" autocomplete="off" required>
  <br>
  <button type="submit" class="btn btn-primary btn-block" type="button">Spread</button>
  </form>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Spark It Up</h4>
  </div>
  <div class="panel-body">
  {{ Form::open(array('action' => 'set_buy_ratio', 'role' => 'form')) }}
  <label for="buy_ratio">Buy Ratio</label>
  <div class="input-group">
    <input class="form-control" type="text" value="{{ $settings[0]->value }}" id="buy_ratio" name="buy_ratio" autocomplete="off" required>
    <span class="input-group-btn">
      <button type="submit" class="btn btn-primary" type="button">Set</button>
    </span>
  </div>
  </form>
  <br>
  {{ Form::open(array('action' => 'set_sell_ratio', 'role' => 'form')) }}
  <label for="sell_ratio">Sell Ratio</label>
  <div class="input-group">
    <input class="form-control" type="text" value="{{ $settings[1]->value }}" id="sell_ratio" name="sell_ratio" autocomplete="off" required>
    <span class="input-group-btn">
      <button type="submit" class="btn btn-primary" type="button">Set</button>
    </span>
  </div>
  </form>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Dividend</h4>
  </div>
  <div class="panel-body" style="padding-bottom:0">
  {{ Form::open(array('action' => 'give_dividend', 'role' => 'form')) }}
  <button type="submit" class="btn btn-success btn-lg btn-block" type="button">Give Dividend</button>
  </form>
  <br>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Recession</h4>
  </div>
  <div class="panel-body" style="padding-bottom:0">
  {{ Form::open(array('action' => 'do_recession', 'role' => 'form')) }}
  <label for="recession_input">Fraction</label>
  <input class="form-control" type="text" id="recession_input" name="recession_input" autocomplete="off" required>
  <br>
  <button type="submit" class="btn btn-success btn-lg btn-block" type="button">Bring It On</button>
  </form>
  <br>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Finish The Game</h4>
  </div>
  <div class="panel-body" style="padding-bottom:0">
  {{ Form::open(array('action' => 'finish_the_game', 'role' => 'form')) }}
  <button type="submit" class="btn btn-success btn-lg btn-block" type="button">Finish It</button>
  </form>
  <br>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Reset The Game</h4>
  </div>
  <div class="panel-body" style="padding-bottom:0">
  {{ Form::open(array('action' => 'reset_the_game', 'role' => 'form')) }}
  <button type="submit" class="btn btn-success btn-lg btn-block" type="button">Reset It</button>
  </form>
  <br>
  </div>
</div>

</div>

<div class="col-lg-8" id="admin-updater-main">
@include('admin.part')
</div>

</div>
</div>
@stop