<table class="table table-bordered table-hover">
  <thead>
    <th>Player</th>
    <th>Cash In Hand</th>
    <th>Delta</th>
  </thead>
  <tbody>
    @foreach($players as $player)
    @if($player->delta == 0)
    <tr class="warning">
    @elseif($player->delta > 0)
    <tr class="success">
    @else
    <tr class="danger">
    @endif
      <td>Player #{{ $player->id }}</td>
      <td>{{ $player->total_cash_in_hand }}</td>
      <td>{{ $player->delta }}x</td>
    </tr>
    @endforeach
  </tbody>
</table>
<br>
<table class="table">
  <thead>
    <tr>
      <th>Code Name</th>
      <th>Company</th>
      <th>Total Shares</th>
      <th>Available Shares</th>
      <th>Shares Bought</th>
      <th>Market Price</th>
      <th>Scenario</th>
    </tr>
  </thead>
  <tbody>
    @foreach($companies as $company)
    @if($company->market_price > 0)
    @if($company->delta == 0 || $company->old_market_price == 0)
    <tr class="warning">
    @elseif($company->delta > 0)
    <tr class="success">
    @else
    <tr class="danger">
    @endif
      <td>{{ $company->code }}</td>
      <td>{{ $company->name }}</td>
      <td>{{ $company->total_shares }}</td>
      <td>{{ $company->available_shares }}</td>
      <td>{{ $company->total_shares - $company->available_shares }}</td>
      <td>{{ $company->market_price }}</td>
      <td>{{ $company->delta }}%</td>
    </tr>
    @else
    <tr class="info">
      <td><strike>{{ $company->code }}</strike></td>
      <td><strike>{{ $company->name }}</strike></td>
      <td><strike>{{ $company->total_shares }}</strike></td>
      <td><strike>{{ $company->available_shares }}</strike></td>
      <td><strike>{{ $company->total_shares - $company->available_shares }}</strike></td>
      <td><strike>{{ $company->market_price }}</strike></td>
      <td><strike>{{ $company->delta }}%</strike></td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>