@extends('layout.master')
@section('style')

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
     <style>

        .selectpicker , .selectpicker:hover, .selectpicker:focus{
            border: none;
            /* background-color: greenyellow; */

            background: none;
        }
    </style>
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Flight Full Width</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">Flight Full Width</li>
            </ul>
        </div>
    </div>




    <!-- search area -->
    <x-flight-booking.search></x-flight-booking.search>
    <!-- search area end -->



    <!-- flight booking -->
    <x-flight-booking.list :trips="$trips" :numberOfadult="$numberOfadult" :numberOfChildren="$numberOfChildren"></x-flight-booking.list>
    <!-- flight booking end -->
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
@endsection
