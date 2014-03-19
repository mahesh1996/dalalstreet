<div class="row inner-container">
<div class="page-header text-center" style="margin-top:0"><h4>DALAL &middot; STREET <small><a href="{{ route('logout') }}" class="btn btn-default btn-xs" style="margin-top:-6px">Broker #{{ $broker->id }} <strong>Logout</strong></a></small></h4></div>
@foreach($players as $player)
  <input type="hidden" value="{{ $player->id }}" id="user-{{ $uc_t = ++$player_count }}" autocomplete="off">
  <div class="col-lg-6 col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading text-center"><h5>Player #{{ $player->id }}</h5></div>
      <ul class="list-group">
        <li class="list-group-item"><span class="badge badge-success" id="tcih-{{ $uc_t }}">{{ $player->total_cash_in_hand }}</span>Total Cash In Hand</li>
      @if($player->delta == 0)
        <li class="list-group-item"><span class="badge badge-warning" id="delta-{{ $uc_t }}">{{ $player->delta }}x</span>Scenario</li>
      @elseif($player->delta > 0)
        <li class="list-group-item"><span class="badge badge-success" id="delta-{{ $uc_t }}">{{ $player->delta }}x</span>Scenario</li>
      @else
        <li class="list-group-item"><span class="badge badge-danger" id="delta-{{ $uc_t }}">{{ $player->delta }}x</span>Scenario</li>
      @endif
      </ul>
      <table class="table table-hover" id="tbl-{{ $uc_t }}">
        <thead>
          <tr>
            <th>Code Name</th>
            <th>Company</th>
            <th>Available Shares</th>
            <th>Market Price</th>
            <th>Shares In Hand</th>
            <th>Buy</th>
            <th>Sell</th>
          </tr>
        </thead>
        <tbody>
        @foreach($player->companies as $company)
        @if($company->market_price > 0)
          @if($company->total_shares * 0.6 <= $company->pivot->total_shares)
          <tr ds-company-id="{{ $company->id }}" class="info">
          @else
          <tr ds-company-id="{{ $company->id }}">
          @endif
            <td>{{ $company->code }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->available_shares }}</td>
            <td>{{ $company->market_price }}</td>
            <td>{{ $company->pivot->total_shares }}</td>
            <td><a href="#" class="btn btn-success btn-xs btn-block ds-buy-button">Buy</a></td>
            <td><a href="#" class="btn btn-danger btn-xs btn-block ds-sell-button {{ $company->pivot->total_shares == 0 ? 'disabled' : ''}}">Sell</a></td>
          </tr>
          @endif
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endforeach
</div>