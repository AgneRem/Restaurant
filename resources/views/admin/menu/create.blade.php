@extends ('layouts.admin')
@section('content')

<h2>Create new menu</h2>
<form class="" action="{{ route('menu.store')}}" method="post">
  {{ csrf_field()}}
  <input type="text" name="title" value="">
  <input type="submit" name="" value="Submit">
</form>
@endsection
