@extends ('layouts.app')
@section('content')
<div class="hotel_reserve_box container">
        <h3> Reservation Form </h3><br>
        <form action="{{ route('reservation.store')}}" method="post">
          {{ csrf_field()}}
          <div class="form-group">
            <label for="person_count">Please choose number of person</label>
            <input type="number" name="person_count" value="" class="form-control" >
          </div>
          <div class="form-group">
            <label for="date">Please choose date</label>
            <input type="date" name="date" value="" class="form-control" >
          </div>
          <div class="form-group">
            <label for="time">Please choose time</label>
            <input type="time" name="time" value="" class="form-control" >
          </div>
          <input type="submit" name="" value="Submit">
          
        </form>

    </div>

@endsection
