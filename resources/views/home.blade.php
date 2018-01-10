@extends('layouts.app')

@section('content')
<div class="container">
  @if (session('message'))
  <div class="alert alert-danger">
    {{ session('message')}}
  </div>
  @endif
    <div class="row">
        <div class="col-md-12">
          @foreach($dishes as $dish)
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="thumbnail" style="height: 250px, position: absolute" >
					<img src="/storage/image/{{ $dish->photo}}" style="height: 100px" class="img-responsive">
					<div class="caption">
            <div class="">
              <p><strong>Title:</strong> {{ $dish->title}}</p>
            </div>

						<div class="row">
							<div class="price col-md-6" style="position: relative">
    							<h3 style="margin:5px auto;"><label>{{ $dish->price}} Eur</label></h3>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-6">
								<a href="#" data-id="{{ $dish->id}}"  class="cart btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Add 2 Cart</a>
    					</div>
						</div>
					</div>
				</div>
			</div>
        @endforeach
      </div>
	</div>
</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous">
</script>
<script>
  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('a.cart').click(function(){
      var dish_id = $(this).data('id');
      var url = "/cart/add";
      console.log(dish_id);
      $.ajax({
        type: 'Post',
        url: url,
        data: {id:dish_id},
        dataType: 'json',
        success: function(data){
          console.log(data);
          $('#shopping-cart span').html(data.totalQty + "pcs - " + data.totalPrice + "Eur");
        },
        error: function (data){
          console.log('Error: ',data);
        }

      });
    });
  });
</script>


@endsection
