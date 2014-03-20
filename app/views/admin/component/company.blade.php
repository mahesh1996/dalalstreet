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
    <button type="submit" class="btn btn-default btn-block">Launch</button>
  </form>
  </div>
</div>