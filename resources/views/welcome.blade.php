@extends('layout.master')
@section('style')
<link rel="stylesheet" href="https://unpkg.com/@jarstone/dselect/dist/css/dselect.css">
<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> --}}
     <style>

        .form-select , .selectpicker:hover, .selectpicker:focus{
            border: none;
            /* background-color: greenyellow; */

            background: none;
        }
        .form-option{
            font-size: x-large;
        }
    </style>
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('cover_eurolibya.jpg')}})">
        <div class="container">
            <h2 class="breadcrumb-title">All World in your hand</h2>

        </div>
    </div>



    <!-- search area -->
    <x-flight-booking.flight-booking-search></x-flight-booking.flight-booking-search>
    <!-- search area end -->



    <!-- flight booking -->
    <x-flight-booking.list :trips="$trips" :numberOfadult="$numberOfadult" :numberOfChildren="$numberOfChildren"></x-flight-booking.list>
    <!-- flight booking end -->
@endsection
@section('script')
<script>

    var from = document.querySelector('#from');
    var to = document.querySelector('#to');

    dselect(from, {
        search: true
    });
    dselect(to, {
        search: true
    });
    var availableDates = [];

    $( function() {

        function available(date) {
            dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
            if ($.inArray(dmy, availableDates) != -1) {
                return [true, "","Available"];
            } else {
                return [false,"","unAvailable"];
            }
        }
    $( "#datepicker" ).datepicker({ minDate:  new Date(),beforeShowDay: available});
  } );

    $("#to").change(function () {
        var from = $("#from").val();

        var to = $("#to").val();
        if (from !="" && to !="") {
            $.ajax({

                type:'POST',

                url:"{{ route('trips.get_available_days') }}",

                data:{from:from, to:to},

                success:function(data){

                    availableDates=data;
                    function available(date) {
                        dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" + date.getFullYear();
                        // console.log(dmy+' : '+($.inArray(dmy, availableDates)));
                        if ($.inArray(dmy, availableDates) != -1) {
                            return [true, "","Available"];
                        } else {
                            return [false,"","unAvailable"];
                        }
                    }
                $( "#datepicker" ).datepicker({ minDate:  new Date(),beforeShowDay: available});

                    console.log(data);

                }

                });
        }

    });




</script>

@endsection
