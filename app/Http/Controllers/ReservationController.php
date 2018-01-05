<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReservationRequest;
use App\Mail\ReservationAccept;
use App\Mail\ReservationAdmin;
use App\Reservation;
//Reikia dasirasyti:
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function create(){
      return view('reservation.create');
    }

    public function store(StoreReservationRequest $request){

      $reservation = new Reservation();
      $reservation->person_count = $request->person_count;
      $reservation->user_id = $request->user()->id;
      $reservation->date = $request->date;
      $reservation->time = $request->time;
      $reservation->save();
      Mail::to($request->user())->send(new ReservationAccept($reservation));
       
      return redirect('/')->with(['message'=>'Rezervacija sekminga!']);
    }
}
