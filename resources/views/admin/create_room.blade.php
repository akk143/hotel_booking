<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>

        label{
            width: 200px;
            font-size: 20px;
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
                        <h1 style="font-size: 30px; font-weight:bold; color:#fff; margin: 10px 0; text-align:center;">Add Rooms</h1>

                        <form action="{{url('add_room')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label>Room Title</label>
                                <input type="text" name="title" />
                            </div>

                            <div>
                                <label>Room Description</label>
                                <textarea name="description"></textarea>
                            </div>

                            <div>
                                <label>Price</label>
                                <input type="number" name="price" />
                            </div>

                            <div>
                                <label>Room Type</label>
                                <select name="type">
                                    <option value="regular" selected>Regular</option>
                                    <option value="premium">Premium</option>
                                    <option value="delux">Delux</option>
                                </select>
                            </div>

                            <div>
                                <label>Free Wifi</label>
                                <select name="wifi">
                                    <option value="yes" selected>Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div>
                                <label>Upload Image</label>
                                <input type="file" name="image" />
                            </div>

                            <div>
                                <input type="submit" value="Add Room" class="btn btn-success" />
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