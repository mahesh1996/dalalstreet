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
    <button type="submit" class="btn btn-default btn-block">Just Do It</button>
  </form>
  </div>
</div>