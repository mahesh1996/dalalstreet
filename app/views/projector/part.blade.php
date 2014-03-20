<div class="panel panel-default">
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
      <td>{{ $company->print_total_shares }}</td>
      <td>{{ $company->print_available_shares }}</td>
      <td>{{ $company->total_shares - $company->available_shares }}</td>
      <td>{{ $company->print_market_price }}</td>
      <td>{{ $company->delta }}%</td>
    </tr>
    @endif
    @endforeach
  </tbody>
</table>
</div>