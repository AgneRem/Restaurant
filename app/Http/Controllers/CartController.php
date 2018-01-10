<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
  public function deleteAllCart(Request $request){
     if(Session::has('cart')){
       $cart=Session::get('cart');
       dd($cart);
     }
    return redirect('/');
  }
    public function ajaxAdd(Request $request)
    {
      $id = $request->input('id');
      $dish = Dish::findOrFail($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;

      $cart = new Cart($oldCart);
      $cart->add($dish, $id);
      $request->session()->put('cart', $cart);
      echo json_encode($cart);
    }


      public function index(){
      $cart = Session::has('cart') ? Session::get('cart') : null;
      return view('cart', compact ('cart'));
        }

      public function deleteByOne(Request $request, $id){
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->deleteByOne($id);
      //Isirasom atnaujinta krepseli
      $request->session()->put('cart', $cart);
      return view('cart', compact('cart'));
      }

      public function deleteAll(Request $request, $id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deleteAll($id);
        //Isirasom atnaujinta krepseli
        $request->session()->put('cart', $cart);
        return view('cart', compact('cart'));
      }

      public function deleteCart(Request $request){
        Session::forget('cart');
        return redirect('/cart');
      }

      public function checkOut(Request $request){
        
      }


}
