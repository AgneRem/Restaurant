<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmed;


class OrderController extends Controller
{
    public function checkOut(){
      $cart = Session::get('cart');
      $order = new Order;
      //serialize objekta pavercia i string'a
      $order->cart = serialize($cart);
      Auth::user()->orders()->save($order);
      // dd($cart);

      Mail::to(Auth::user())->send(new OrderConfirmed($cart));
      Session::forget('cart');
      return redirect()->route('home')->with(['message' => 'Checkout is ok']);
    }
}
