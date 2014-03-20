<div class="panel panel-default">
  <div class="panel-heading">
    <h4>News</h4>
  </div>
  <div class="panel-body">
  {{ Form::open(array('action' => 'create_news', 'role' => 'form')) }}
    <label for="news_input">News Type</label>
    <select class="form-control" autocomplete="off" name="news_type">
      <option value="default" selected>Default</option>
      <option value="danger">Danger</option>
      <option value="success">Success</option>
      <option value="info">Info</option>
      <option value="warning">Warning</option>
    </select>
    <br>
    <label for="news_input">New News</label>
    <input class="form-control" type="text" value="{{ $news->text }}" id="news_input" name="news_input" type="text" autocomplete="off" required>
    <br>
    <button type="submit" class="btn btn-default btn-block">Spread</button>
  </form>
  </div>
</div>