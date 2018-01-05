@extends ('layouts.admin')
@section('content')
<div class="col-md-8">
  @if (session('message'))
  <div class="alert alert-danger">
    {{ session('message')}}
  </div>
  @endif
  <ul>
      @foreach ($menus as $menu)
      <div class="row list-group">
        <li class="list-group-item col-md-8">{{ $menu->title }}
          <form action="{{ route('menu.destroy', $menu) }}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure?');">
          <input type="hidden" name="_method" value="DELETE">
           {{ csrf_field() }}
           <button class="btn btn-danger pull-right">Delete</button>
          </form>
          <a href="{{ route('menu.edit', $menu)}}" class="btn btn-primary col-md-2 pull-right">Edit</a>
        </li>
      </div>
      @endforeach

  </ul>
  <a href="{{ route ('admin')}}" class="btn btn-default">Atgal</a>
  <a href="{{ route('menu.create')}}" class="btn btn-success">Prideti</a>

</div>
@endsection
