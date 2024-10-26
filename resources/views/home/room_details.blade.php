<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('home.css')

    <!-- jQuery and jQuery UI for Datepicker -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- bs cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="main-layout">
    <!-- loader -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->
    
    <!-- header -->
    <header>
        @include('home.header')
    </header>

    <div class="our_room">
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
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div class="room_img p-3">
                            <figure><img src="/room/{{$room->image}}" width="200" height="200"></figure>
                        </div>
                        <div class="bed_room">
                            <h2>{{$room->room_title}}</h2>
                            <p class="p-4">{{$room->description}}</p>
                            <h4>Room Type: <span class="text-uppercase">{{$room->room_type}}</span></h4>
                            <h4>Free Wifi: <span class="text-capitalize">{{$room->wifi}}</span></h4>
                            <h3 class="mt-2">Price: ${{$room->price}}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="container">

                        <h1 style="font-size: 30px; text-align:center;">Booking</h1>

                        <div>
                            @if(session()->has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert-message">
                                    <button class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
                                    {{ session()->get('message') }}
                                </div>
                            @endif 
                        </div>

                        <form id="booking_form" action="{{url('add_booking',$room->id)}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Name :</label>
                                <input type="text" name="name" class="form-control" @if(Auth::id()) value="{{Auth::user()->name}}" @endif />
                            </div>

                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" name="email" class="form-control" @if(Auth::id()) value="{{Auth::user()->email}}" @endif />
                            </div>

                            <div class="form-group">
                                <label>Phone :</label>
                                <input type="text" name="phone" class="form-control" @if(Auth::id()) value="{{Auth::user()->phone}}" @endif />
                            </div>

                            <div class="form-group">
                                <label for="arrival">Arrival Date :<i class="fas fa-calendar-alt ml-1"></i></label>
                                <input type="text" name="arrival" id="arrival" class="form-control" readonly />
                            </div>

                            <div class="form-group">
                                <label for="bookingstart">Booking Start Date :<i class="fas fa-calendar-alt ml-1"></i></label>
                                <input type="text" name="bookingstart" id="bookingstart" class="form-control" readonly />
                            </div>

                            <div class="form-group">
                                <label for="bookingend">Booking End Date :<i class="fas fa-calendar-alt ml-1"></i></label>
                                <input type="text" name="bookingend" id="bookingend" class="form-control" readonly />
                            </div>


                            <div>

                                <span class="error_message" style="color: red; display: none;"></span>

                                @if(Auth::check())
                                    <input type="submit" value="Book Now" class="w-100 btn btn-primary mt-2" />
                                @else
                                    <a href="{{ route('register') }}" class="w-100 btn btn-primary mt-2">Book Now</a>
                                @endif
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
    <!-- footer -->
    @include('home.footer')

    <!-- Javascript files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>

    {{-- bs cdnjs --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Datepicker initialization -->

    <script type="text/javascript">

        function formatDate(date){

            var day = (date.getDate()).toString().padStart(2, '0');
            var month = (date.getMonth() + 1).toString().padStart(2, '0');
            var year = date.getFullYear();
            
            return day + "-" + month + "-" + year;
        }
    
        // Set today's date
        var today = new Date();
    
        // Initialize Arrival Date Datepicker
        $('#arrival').datepicker({

            dateFormat: "dd-mm-yy",
            minDate: today,  // Set dynamic min date to today

            onSelect: function(selectedDate){
                // After selecting arrival date, restrict booking start and end date to this date or later
                var selectedArrivalDate = $(this).datepicker('getDate');
                $('#bookingstart').datepicker('option', 'minDate', selectedArrivalDate);
                $('#bookingend').datepicker('option', 'minDate', selectedArrivalDate);
            }

        });
    
        // Initialize Booking Start Date Datepicker
        $('#bookingstart').datepicker({

            numberOfMonths: 1,
            showAnim: "slide",
            dateFormat: "dd-mm-yy",

            onSelect: function(selectedDate){
                // Set booking end date to be after the start date
                var selectedStartDate = $(this).datepicker('getDate');
                $('#bookingend').datepicker('option', 'minDate', selectedStartDate);
            }

        });
    
        // Initialize Booking End Date Datepicker
        $('#bookingend').datepicker({
            numberOfMonths:1,
            showAnim:"slide",
            dateFormat:"dd-mm-yy",

            onClose:function(selectDate){
                $('#bookingstart').datepicker('option','maxDate',selectDate);
            }
        });

        $('#booking_form').on('submit',function(e){

            let $arrivaldate = $('#arrival').val();
            let $startdate = $('#bookingstart').val();
            let $enddate = $('#bookingend').val();
            let errmsg = '';

            const requiredselects = 
            [
                { value: $arrivaldate, message: 'Please select an Arrival Date <br/>' },
                { value: $startdate, message: 'Please select a Booking Start Date <br/>' },
                { value: $enddate, message: 'Please select a Booking End Date' }
            ];

            requiredselects.forEach(requiredselect => {

                if(!requiredselect.value){
                    errmsg += requiredselect.message; 
                }

            });

            if(errmsg){
                e.preventDefault();
                $('.error_message').html(errmsg).show();

                setTimeout(() => {
                    $('.error_message').fadeOut();
                }, 1000);
            } else {
                $('.error_message').hide();
            }

        });

    //     document.addEventListener("DOMContentLoaded", function(){

    //         var alert = document.getElementById('alert-message');

    //         if(alert){
    //             setTimeout(function() {
    //                 var bootstrapAlert = new bootstrap.Alert(alert);
    //                 bootstrapAlert.close();
    //             }, 3000);
    //         }
    // });

    </script>
    
</body>
</html>
