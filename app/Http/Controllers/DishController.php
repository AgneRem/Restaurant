<?php

namespace App\Http\Controllers;

use App\Dish;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDishRequest;
use App\Menu;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dishes = Dish::all();
      return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $this->authorize('create', Dish::class);
      $menus = Menu::all();
      return view('admin.dish.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {
      $timestamp = Carbon::now()->toAtomString();
      $name = $request->file('photo')->getClientOriginalName();
      $request->file('photo')->storeAs('public/image', $timestamp.$name);
      Image::make(Input::file('photo'))->resize(300, 200)->save(storage_path('app/public/image/'.$timestamp.$name));
      $dish = new Dish();
      $dish->title = $request->title;
      $dish->price = $request->price;
      $dish->description = $request->description;
      $dish->menu_id = $request->menu_id;
      $dish->photo = $timestamp.$name;
      $dish->save();
      return redirect('/admin/dish')->with(['message'=>'Dish add success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
      $this->authorize('update', Dish::class);
      $menus = Menu::all();
      return view('admin.dish.edit', compact('dish'), compact('menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDishRequest $request, Dish $dish)
    {
      $this->authorize('update', Dish::class);

      if($request->file('photo')){
        $timestamp = Carbon::now()->toAtomString();
        $name = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('public/image', $timestamp.$name);
        Image::make(Input::file('photo'))->resize(300, 200)->save(storage_path('app/public/image/'.$timestamp.$name));
        $path_old = '/public/image/';
        if (!empty($dish->photo)){
          Storage::delete($path_old.$dish->photo);
        }
        $dish->photo = $timestamp.$name;
      }
      $dish->title = $request->title;
      $dish->price = $request->price;
      $dish->description = $request->description;
      $dish->menu_id = $request->menu_id;
      $dish->update();
      return redirect('/admin/dish')->with(['message'=>'Dish edit success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
      $this->authorize('delete', Dish::class);
      if (!empty($dish->photo)){
        Storage::delete($dish->photo);
      }
      $dish->delete();
      return redirect('admin/dish')->with(['message'=>'Dish is deleted']);
    }
}
