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
      <button type="submit" class="btn btn-default">Set</button>
    </span>
  </div>
  </form>
  <br>
  {{ Form::open(array('action' => 'set_sell_ratio', 'role' => 'form')) }}
  <label for="sell_ratio">Sell Ratio</label>
  <div class="input-group">
    <input class="form-control" type="text" value="{{ $settings[1]->value }}" id="sell_ratio" name="sell_ratio" autocomplete="off" required>
    <span class="input-group-btn">
      <button type="submit" class="btn btn-default">Set</button>
    </span>
  </div>
  </form>
  </div>
</div>