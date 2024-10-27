<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style>
        body {
            background-color: #2c3e50;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container-fluid{
            padding: 20px;
        }
        .page-header{
            text-align: center;
            margin-bottom: 20px;
        }
        .table-container{
            overflow-x: auto;
            padding: 0 20px; 
        }
        .tbdesign {
            width: 100%;
            max-width: 1200px;
            background-color: #34495e;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-collapse: collapse; 

            margin: 30px auto; 
        }
        th, td{
            min-width: 150px;
            text-align: center;
            vertical-align: middle;

            padding: 20px;
            /* white-space: nowrap; */
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
        .name, .date{
            white-space: nowrap;
        }
        
    </style>

</head>
<body>
    {{-- start header --}}
        @include('admin.header')
    {{-- end header --}}

    @include('admin.sidebar')
    
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="font-size: 30px; font-weight: bold; color: #fff;">Bookings</h1>

                {{-- Table --}}
                <div class="table-container">
                    <table class="tbdesign">
                        <thead>
                            <tr>
                                <th>Room ID</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Arrival Date</th>
                                <th>Start Date</th>
                                <th>Leaving Date</th>
                                <th>Status</th>
                                <th>Room Title</th>
                                <th>Room Price</th>
                                <th>Room Image</th>
                                <th>Delete Booking</th>
                                <th>Status Update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->room_id}}</td>
                                    <td class="name">{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->phone}}</td>
                                    <td class="date">{{$data->arrival_date}}</td>
                                    <td class="date">{{$data->start_date}}</td>
                                    <td class="date">{{$data->end_date}}</td>
                                    <td>
                                        @if($data->status == 'Approved')
                                            <span class="btn btn-success">Approved</span>
                                        @elseif($data->status == 'Declined')
                                            <span class="btn btn-danger">Declined</span>
                                        @else
                                            <span class="btn btn-secondary">Waiting</span>
                                        @endif
                                    </td>
                                    <td>{{$data->room->room_title}}</td>
                                    <td>${{$data->room->price}}</td>

                                    <td>
                                        <img src="/room/{{$data->room->image}}" alt="Room Image" />
                                    </td>

                                    <td>
                                        <a href="{{url('delete_booking',$data->id)}}" class="btn btn-secondary" onclick="return confirm('Are you sure want to delete this?');">Delete</a>
                                    </td>

                                    <td>
                                        <a href="{{url('approved_booking',$data->id)}}" class="btn btn-success mb-2">Approve</a>
                                        <a href="{{url('declined_booking',$data->id)}}" class="btn btn-danger">Decline</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    {{-- footer section --}}
        @include('admin.footer')

</body>
</html>
