<div  class="our_room">
   <div class="container">

      <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Our Room</h2>
                <p>Lorem Ipsum available, but the majority have suffered </p>
             </div>
          </div>
       </div>

          
      <div class="row">
         @foreach ($rooms as $room)
            <div class="col-md-4 col-sm-6">
               <div id="serv_hover"  class="room">
                  <div class="room_img">
                     <figure><img src="/room/{{$room->image}}" width="150" height="150"></figure>
                  </div>

                  <div class="bed_room">
                     <h3>{{$room->room_title}}</h3>
                     <p>{!! Str::limit($room->description,80) !!}</p>
                     <a href="{{url('room_details',$room->id)}}" style="color: #000; font-size: 13px; font-weight: light;" class="btn btn-warning mt-3">Room Details</a>
                  </div>
               </div>
            </div>
         @endforeach
      </div>

   </div>
 </div>