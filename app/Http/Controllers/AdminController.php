<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id()){

            $usertype = Auth::user()->usertype;

            if($usertype == 'user'){
                return view('home.index');
            }elseif($usertype == 'admin'){
                return view('admin.index');
            }else{
                return redirect()->back();
            }

        }
    }

    public function home()
    {
        return view('home.index');
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
}
