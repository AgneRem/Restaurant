@extends ('layouts.admin')
@section('content')
<div class="col-md-4">
  <form action="{{ route('menu.update', $menu)}}" method="post">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field()}}
    <div class="form-group">
      <label for="Menu">Menu</label>
      <input type="text" class="form-control" name="title" value="{{ $menu->title}}">
    </div>
    <button type="submit" name="button">Save</button>
  </form>
</div>

@endsection
