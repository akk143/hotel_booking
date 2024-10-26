<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class HomeController extends Controller
{
    public function room_details($id)
    {
        $room = Room::find($id);

        return view('home.room_details',compact('room'));
    }


    public function add_booking(Request $request, $id)
    {
        $booking = new Booking();

        $booking->room_id = $id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;

        $startdate = $request->bookingstart;
        $enddate = $request->bookingend;

        // Check if there is an overlap with existing bookings
        $isbooked = Booking::where('room_id', $id)
                    ->where(function($query) use($startdate, $enddate){
                        $query->whereBetween('start_date', [$startdate, $enddate])
                            ->orWhereBetween('end_date', [$startdate, $enddate])
                            ->orWhere(function ($query) use ($startdate, $enddate) {
                                $query->where('start_date', '<=', $startdate)
                                        ->where('end_date', '>=', $enddate);
                        });
                    })->exists();

        if($isbooked){
            return redirect()->back()->with('message', 'Room is already booked,Please select a different period!');
        }else{
            $booking->arrival_date = $request->arrival;
            $booking->start_date = $startdate;
            $booking->end_date = $enddate;

            $booking->save();

            return redirect()->back()->with('message', 'Room booked successfully!');
        }
    }


}
