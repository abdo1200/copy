<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\reservation;
use App\rooms;
use Illuminate\Support\Facades\DB;
class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // show booking form
    public function bookingview()
    {
        return view('user.booking');
    }
    public function userviewreservation ()
    {
        $user = auth()->user();
        $reservation=DB::select("select * from reservations where user_id='$user->id';");
        return view('user.viewreserv',compact('res'));
    }
    public function adminviewreservation ()
    {
        $res=reservation::all();
        return view('admin.viewreserv',compact('res'));
    }

    public function reserve(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'room'=>'required',
            'meal'=>'required',
            'checkin'=>'required',
            'checkout'=>'required'
        ]);
        $res = new reservation();
        $res->user_id=$user->id;
        $res->rooms_id=1;
        $res->user_name=$user->name;
        $res->user_phonenumber=$user->phonenumber;
        $res->roomtype=$request->room;
        $res->mealplan=$request->meal;
        $res->checkin=$request->checkin;
        $res->checkout=$request->checkout;
        $res->save();

        return redirect('/user/booking.blade.php');
    }


    public function userdeletereservation($id)
    {
        $reservation =reservation::find($id);
        $reservation->delete();

        return redirect('/user/viewreserv.blade.php');
    }

    //admin delete reservation
    public function admindeletereservation($id)
    {
        $reservation =reservation::find($id);
        $reservation->delete();

        return redirect('/admin/viewreserv.blade.php');
    }
}
