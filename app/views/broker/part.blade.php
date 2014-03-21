<div class="row inner-container">
@foreach($players as $player)
  <div class="col-lg-6 col-md-6">
    <h5>Player #{{ $player->id }}</h5>
    <ul class="list-group">
      <li class="list-group-item"><span class="badge badge-success">{{ $player->print_total_cash_in_hand }}</span>Total Cash In Hand</li>
    @if($player->delta == 0)
      <li class="list-group-item"><span class="badge badge-warning">{{ $player->delta }}x</span>Multiplier</li>
    @elseif($player->delta > 0)
      <li class="list-group-item"><span class="badge badge-success">{{ $player->delta }}x</span>Multiplier</li>
    @else
      <li class="list-group-item"><span class="badge badge-danger">{{ $player->delta }}x</span>Multiplier</li>
    @endif
    </ul>
    <div class="panel panel-default">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Company</th>
          <th>Available Shares</th>
          <th>Market Price</th>
          <th>Shares In Hand</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach($player->companies as $company)
      @if($company->market_price > 0)
        @if($company->total_shares * 0.6 <= $company->pivot->total_shares)
        <tr class="info">
        @else
        <tr>
        @endif
          <td>{{ $company->name }}</td>
          <td>{{ $company->print_available_shares }}</td>
          <td>{{ $company->print_market_price }}</td>
          <td>{{ number_format($company->pivot->total_shares) }}</td>
          <td><a type="button" class="btn btn-success btn-xs btn-block ds-buy-button" ds-company-id="{{ $company->id }}" ds-player-id="{{ $player->id }}" ds-company-name="{{ $company->name }}">Buy</a></td>
          <td><a type="button" class="btn btn-danger btn-xs btn-block ds-sell-button {{ $company->pivot->total_shares == 0 ? 'disabled' : ''}}" ds-company-id="{{ $company->id }}" ds-player-id="{{ $player->id }}" ds-company-name="{{ $company->name }}">Sell</a></td>
        </tr>
        @endif
      @endforeach
      </tbody>
    </table>
    </div>
  </div>
@endforeach
</div>