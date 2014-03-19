<div class="list-group">
@foreach($news as $new)
  <a class="list-group-item list-group-item-{{ $new->type }}"><h4>{{ $new->text }}</h4></a>
@endforeach
</div>