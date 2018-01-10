@extends('layouts.app')

@section('content')
<div class="container">
@foreach ($orders as $order)
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Uzsakymo data: {{ $order->created_at}}</h3>
  </div>
  <div class="panel-body">
    @foreach ($order->cart->items as $item )
    <ul class="list-group">
      <li class="list-group-item">Pavadinimas {{ $item['item']['title']}}</li>
      <li class="list-group-item">Viso kiekis: {{ $item['qty']}}</li>
    </ul>
    @endforeach
    <p>Viso uzsakymo kiekis: {{ $order->cart->totalQty}}</p>
  </div>
</div>
@endforeach
</div>
@endsection
