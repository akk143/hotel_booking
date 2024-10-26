<!DOCTYPE html>
<html>
  <head> 

    <base href="/public">

    @include('admin.css')

    <style>

        label{
            width: 200px;
            color: #fff !important;

            display: inline-block;
        }
        input[type='text']{
            width: 350px;
            height: 40px;
        }
        textarea{
            width: 450px;
            height: 80px;
        }
        form div{
            display: flex;
            padding: 15px;
        }

    </style>
  </head>
  <body>
    {{-- start header --}}
        @include('admin.header')
    {{-- end header --}}

        @include('admin.sidebar')
        

    {{-- start body --}}
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    
                    <div>
                        <h1 style="font-size: 30px; font-weight:bold; color:#fff; margin: 10px 0; text-align:center;">Update Room</h1>

                        <form action="{{url('edit_room',$updroom->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label>Room Title</label>
                                <input type="text" name="title" value="{{$updroom->room_title}}" />
                            </div>

                            <div>
                                <label>Room Description</label>
                                <textarea name="description">{{$updroom->description}}</textarea>
                            </div>

                            <div>
                                <label>Price</label>
                                <input type="number" name="price" value="{{$updroom->price}}" />
                            </div>

                            <div>
                                <label>Room Type</label>
                                <select name="type">
                                    <option value="{{$updroom->room_type}}" selected>{{$updroom->room_type}}</option>
                                    <option value="regular">Regular</option>
                                    <option value="premium">Premium</option>
                                    <option value="delux">Delux</option>
                                </select>
                            </div>

                            <div>
                                <label>Free Wifi</label>
                                <select name="wifi">
                                    <option value="{{$updroom->wifi}}" selected>{{$updroom->wifi}}</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div>
                                <label>Current Image</label>
                                <img src="/room/{{$updroom->image}}" width="130" height="130" />
                            </div>

                            <div>
                                <label>Update Image</label>
                                <input type="file" name="image" />
                            </div>

                            <div>
                                <input type="submit" value="Update Room" class="btn btn-success" />
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    {{-- end body --}}


    {{-- footer section --}}
        @include('admin.footer')

  </body>
</html>