<div class="panel panel-default">
<table class="table table-bordered table-hover">
  <thead>
    <th>Player</th>
    <th>Cash In Hand</th>
    <th>Delta</th>
  </thead>
  <tbody>
    @foreach($players as $player)
    @if($player->delta == 0)
    <tr class="danger">
    @elseif($player->delta > 1)
    <tr class="success">
    @else
    <tr class="warning">
    @endif
      <td>Player #{{ $player->id }}</td>
      <td>{{ $player->print_total_cash_in_hand }}</td>
      <td>{{ $player->delta }}x</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>