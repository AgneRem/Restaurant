@extends ('layouts.admin')
@section('content')
<div class="col-md-4">
  <ul>
      @foreach ($menus as $menu)
      <li>{{ $menu->title }}</li>
      @endforeach


  </ul>
  <a href="{{ route ('admin')}}" class="btn btn-default">Atgal</a>
  <a href="{{ route('menu.create')}}" class="btn btn-success">Prideti</a>

</div>
@endsection
