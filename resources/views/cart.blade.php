@extends('layouts.app')
@section('content')
  <form class="" action="" method="post">
 <div class="container-fluid">
  <table class="table table-hover">
    <thead>
      <tr>
        <th><input type="checkbox" name=""></th>
        <th>Preke</th>
        <th>Kiekis</th>
        <th>Kaina</th>
        <th>Suma</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @if ($cart AND Session::get('cart')->totalPrice>0)
      @foreach($cart->items as $item)
      <tr>
        <td><input type="checkbox" name="" value=""></td>
        <td>{{$item['item']['title']}}</td>
        <td>{{$item['qty']}}</td>
        <td>{{$item['item']['price']}}</td>
        <td>{{$item['price']}}</td>
        <td><a href="{{ route('cart.deleteByOne', $item['item']['id'])}}" class="btn btn-warning">Delete by one</a><a href="{{ route('cart.deleteAll', $item['item']['id'])}}" class="btn btn-danger">Delete all</a></td>
      </tr>
      @endforeach
      <tr>
        <td>Total price:
          {{ Session::get('cart')->totalPrice }} €
        </td>
      </tr>
      <tr>
        <td><a href="{{ route('cart.deleteCart')}}"><button type="button" name="button" class="btn btn-danger">Delete all cart</button></a>
        <a href="{{ route('home')}}"><button type="button" name="button" class="btn btn-primary">Back</button></a>
        <a href="{{ route('checkOut')}}"><button type="button" name="button" class="btn btn-success">Check out</button></a></td>
      </tr>
      @else
      <tr>
        <td>Jusu krepselis tuscias</td>
      </tr>
      <tr>
        <td><a href="{{ route('home')}}"><button type="button" name="button" class="btn btn-primary">Back</button></a></td>
      </tr>
      @endif
    </tbody>
  </table>

</div>
</form>
@endsection
