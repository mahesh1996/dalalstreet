<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Dividend</h4>
  </div>
  <div class="panel-body" style="padding-bottom:0">
  {{ Form::open(array('action' => 'give_dividend', 'role' => 'form')) }}
    <label for="dividend_owner_input">For Owner</label>
    <input class="form-control" type="text" id="dividend_owner_input" value="{{ $settings[2]->value }}" name="dividend_owner_input" autocomplete="off" required>
    <br>
    <label for="dividend_other_input">For Other</label>
    <input class="form-control" type="text" id="dividend_other_input" value="{{ $settings[3]->value }}" name="dividend_other_input" autocomplete="off" required>
    <br>
    <button type="submit" class="btn btn-default btn-block">Give Dividend</button>
  </form>
  <br>
  </div>
</div>