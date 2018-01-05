@extends ('layouts.admin')
@section('content')

<h2>Create new dish</h2>
<form action="{{ route('dish.store')}}" method="post" class="col-md-4" enctype="multipart/form-data">
  {{ csrf_field()}}
  <div class="form-group">
    <label for="title">Dish name</label>
    <input type="text" name="title" value="" placeholder="Please enter dish name" class="form-control" id="title">
  </div>
  <div class="form-group">
    <label for="photo">Dish picture</label>
    <input type="file" name="photo" value="" placeholder="Please select a picture" class="form-control" id="photo">
  </div>
  <div class="form-group">
    <label for="menu_id">Select Menu</label>
    <select class="form-control" id="menu_id" name="menu_id">
      @foreach ($menus as $menu)
      <option value="{{$menu->id}}">{{ $menu->title}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="description">Dish description</label>
     <textarea class="form-control" id="description" rows="3" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" name="price" value="" placeholder="Please enter price" class="form-control" id="price">
  </div>

    <input type="submit" name="" value="Submit">


</form>
@endsection
