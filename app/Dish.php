<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
  protected $fillable = [
    'title',
    'photo',
    'menu_id',
    'description',
    'price'
  ];

  public function menu(){
    return $this->belongsTo('App\Menu');
  }
}
