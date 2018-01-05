@extends ('layouts.admin')
@section('content')

  @if (session('message'))
  <div class="alert alert-danger">
    {{ session('message')}}
  </div>
  @endif

  <div class="container">
	<div class="row">
    @foreach ($dishes as $dish)

        <div class="col-md-4">
		    <div class="panel panel-default">
                <div class="panel-heading" style="height: 70px"><strong><a class="post-title" href="#">{{ $dish->title}}</a></strong></div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <a href="#" class="thumbnail"><img src="/storage/image/{{ $dish->photo}}" style="height: 100px"alt=""></a>
                        </div>
                            <p>Aprasymas: {{ $dish->description}}</p>
                            <p>Kaina: {{ $dish->price}}</p>
                    </div>
                    <a href="{{ route('dish.edit', $dish)}}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('dish.destroy', $dish) }}" method="POST" style="display: inline" onsubmit="return confirm('Are you sure?');">
                    <input type="hidden" name="_method" value="DELETE">
                     {{ csrf_field() }}
                     <button class="btn btn-danger pull-right">Delete</button>
                    </form>
            </div>

        </div>
        @endforeach

	</div>
  <a href="{{ route('dish.create')}}" class="btn btn-success">Add product</a>
</div>

@endsection
