@extends('layouts.app')

@section('content')
<div class="container-fluid" style="background-color:steelblue;height:545px">
    <div class="row justify-content-center">
        <div class="mt-5 col-6">
            <form method="POST" action="{{'/'}}" style="padding:30px;">
                @csrf
                @method('put')
                <div class="form-group">
                  <label for="room">ROOM :</label>
                  <select class="form-control"id="roomtype"name="room">
                        <option class="bg-dark text-light"value="single">single room</option>
                        <option class="bg-dark text-light"value="double">double room</option>
                        <option class="bg-dark text-light"value="family">family room</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="meal">MEAL :</label>
                    <select class="form-control"id="mealplan"name="meal">
                        <option class="bg-dark text-light" value="room only">room only</option>
                        <option class="bg-dark text-light" value="breakfast">breakfast</option>
                        <option class="bg-dark text-light" value="half-board">half-board</option>
                        <option class="bg-dark text-light"value="full-board">full-board</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="checkin">CHECKIN :</label>
                    <input class="form-control" id="checkin" name="checkin" type="date">
                </div>
                <div class="form-group">
                    <label for="checkout">CHECKOUT :</label>
                    <input class="form-control" id="checkout" name="checkout" type="date">
                </div>

                @include('layouts.message')
                <button type="submit" class="mt-3 btn btn-dark">submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
