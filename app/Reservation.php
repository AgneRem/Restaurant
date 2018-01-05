<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reservation extends Model
{
  protected $fillable = [
    'user_count',
    'date',
    'time'
  ];

  public function user(){
    return $this->belongsTo(User::class);
  }
}
