<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id()){

            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                $rooms = Room::all();
                return view('home.index',compact('rooms'));
            }elseif($usertype == 'admin'){
                return view('admin.index');
            }else{
                return redirect()->back();
            }

        }
    }

    public function home()
    {
        $rooms = Room::all();

        return view('home.index',compact('rooms'));
    }


    public function create_room()
    {
        return view('admin.create_room');
    }


    public function add_room(Request $request)
    {
        $room = new Room();

        $room->room_title = $request->title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->type;

        $image = $request->image;

        if($image){

            $image_name = time(). '.' .$image->getClientOriginalExtension();

            $request->image->move('room',$image_name);

            $room->image = $image_name;
        }

        $room->save();

        return redirect()->back();
    }
 

    public function view_room()
    {
        $datas = Room::all();

        return view('admin.view_room',compact('datas'));
    }


    public function delete_room($id)
    {
        $delroom = Room::find($id);
        $delroom->delete();

        return redirect()->back();
    }


    public function update_room($id)
    {
        $updroom = Room::find($id);

        return view('admin.update_room',compact('updroom'));
        
    }

    public function edit_room(Request $request,$id)
    {
        $editroom = Room::find($id);

        $editroom->room_title = $request->title;
        $editroom->description = $request->description;
        $editroom->price = $request->price;
        $editroom->wifi = $request->wifi;
        $editroom->room_type = $request->type;

        $image = $request->image;

        if($image){

            $image_name = time(). '.' .$image->getClientOriginalExtension();

            $request->image->move('room',$image_name);

            $editroom->image = $image_name;
        }

        $editroom->save();

        return redirect()->back();
    }


    public function bookings()
    {
        $datas = Booking::all();

        return view('admin.bookings',compact('datas'));
    }
}
