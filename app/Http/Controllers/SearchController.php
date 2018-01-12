<?php
  namespace App\Http\Controllers;
  use Illuminate\Http\Request;
  use App\Dish;
  class SearchController extends Controller
{
    public function search(Request $request) {
      // dd(explode("-", $request->price));
      $dishes = Dish::where('menu_id', '=' ,$request->menu)->whereBetween('price', explode("-", $request->price))->get();
      return view('home', compact('dishes'));
    }
}
