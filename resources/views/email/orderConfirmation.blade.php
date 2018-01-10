<h1>Hello {{ $name}}: Your order has been accepted</h1>
<table>
  @foreach($products as $product)
  <tr>
    <td>{{$product['item']['title']}}</td>
    <td>{{$product['qty']}}</td>
    <td>{{$product['item']['price']}}</td>
    <td>{{$product['price']}}</td>
  </tr>
  @endforeach
  <tr>
    <td>Total price:
      {{ $totalPrice }} €
    </td>
  </tr>
</table>
