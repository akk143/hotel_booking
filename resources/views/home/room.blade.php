<style>
   .our_room {
    padding: 40px 0;
}

.room_img figure {
    width: 100%;
    height: 250px; 
    object-fit: cover;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
}

.room_img figure img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.bed_room h3{
    font-size: 18px;
    font-weight: bold;
    margin-top: 15px;
}

.bed_room p{
    font-size: 14px;
    color: #666;
}

.room{
    background: #fff;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    margin-bottom: 30px;
    text-align: center;
}

</style>

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
                     <figure><img src="/room/{{$room->image}}"></figure>
                  </div>

                  <div class="bed_room">
                     <h3>{{$room->room_title}}</h3>
                     <p>{!! Str::limit($room->description,100) !!}</p>
                     <a href="{{url('room_details',$room->id)}}" style="color: #000; font-size: 13px; font-weight: light;" class="btn btn-warning mt-3">Room Details</a>
                  </div>
               </div>
            </div>
         @endforeach
      </div>

   </div>
 </div>