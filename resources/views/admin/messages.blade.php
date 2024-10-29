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

        @include('admin.sidebar')
        
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                {{-- Table --}}
                <div class="d-flex justify-content-center align-items-center mt-5">
                    <table class="tbdesign">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Send Email</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                  <td>{{$message->name}}</td>
                                  <td>{{$message->email}}</td>
                                  <td>{{$message->phone}}</td>
                                  <td>{{$message->message}}</td>
                                  <td>
                                    <a href="{{url('send_mail',$message->id)}}" class="btn btn-success">Send Mail</a>
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