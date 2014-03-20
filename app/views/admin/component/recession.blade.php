<div class="panel panel-default">
  <div class="panel-heading">
    <h4>Recession</h4>
  </div>
  <div class="panel-body" style="padding-bottom:0">
  {{ Form::open(array('action' => 'do_recession', 'role' => 'form')) }}
    <label for="recession_input">Fraction</label>
    <input class="form-control" type="text" id="recession_input" value="{{ $settings[4]->value }}" name="recession_input" autocomplete="off" required>
    <br>
    <button type="submit" class="btn btn-default btn-block">Bring It On</button>
  </form>
  <br>
  </div>
</div>