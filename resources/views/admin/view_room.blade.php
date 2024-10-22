<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>

        body{
            background-color: #2c3e50;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container-fluid{
            padding: 20px;
        }
        .page-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .tbdesign{
            width: 100%;
            max-width: 1200px;
            margin: 50px auto; 
            border-collapse: collapse; 
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: #34495e;

            padding: 0;
            margin: 0;
        }
        th,td{
            text-align: center;
            padding: 20px;
        }
        th{
            background-color: #164191;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }
        td{
            background-color: #f8f9fa;
            color: #333;
            border-right: 1px solid #bdc3c7;
            border-bottom: 1px solid #bdc3c7;
        }
        tbody tr:hover {
            background-color: #ecf0f1;
            cursor: pointer;
        }

    </style>

  </head>

  <body>
    {{-- start header --}}
        @include('admin.header')
    {{-- end header --}}

    {{-- start sidebar --}}
        @include('admin.sidebar')
    {{-- end sidebar --}}
        
    {{-- start body --}}
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="font-size: 30px; font-weight: bold; color: #fff;">View Rooms</h1>

                {{-- Table --}}
                <div class="d-flex justify-content-center align-items-center mt-5">
                    <table class="tbdesign">
                        <thead>
                            <tr>
                                <th>Room Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Wifi</th>
                                <th>Room Type</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>{{$data->room_title}}</td>
                                    <td>{!!Str::limit($data->description,70)!!}</td>
                                    <td>${{$data->price}}</td>
                                    <td>{{$data->wifi}}</td>
                                    <td>{{$data->room_type}}</td>
                                    <td>
                                        <img src="room/{{$data->image}}" width="130" height="130" alt=""/>
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-success mb-1">Edit</a>
                                        <a href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    {{-- end body --}}

    {{-- footer section --}}
        @include('admin.footer')

  </body>
</html>
