<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
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
        
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="font-size: 20px; font-weight: bold;" class="text-center m-3">Mail Send to {{$mail->name}}</h1>

                <form action="{{url('mail_noti',$mail->id)}}" method="POST">
                    @csrf

                    <div>
                        <label>Greeting</label>
                        <input type="text" name="greeting" />
                    </div>

                    <div>
                        <label>Mail Body</label>
                        <textarea name="body"></textarea>
                    </div>

                    <div>
                        <label>Action Text</label>
                        <input type="text" name="action_text" />
                    </div>

                    <div>
                        <label>Action URL</label>
                        <input type="text" name="action_url" />
                    </div>

                    <div>
                        <label>End Line</label>
                        <input type="text" name="end_line" />
                    </div>

                    <div>
                        <input type="submit" value="Send Mail" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- footer section --}}
        @include('admin.footer')

  </body>
</html>