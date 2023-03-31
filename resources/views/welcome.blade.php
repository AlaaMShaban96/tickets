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
</script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> --}}
@endsection
