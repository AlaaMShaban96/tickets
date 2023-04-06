@extends('layout.master')
@section('style')
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> --}}
    <style>
        .form-select,
        .selectpicker:hover,
        .selectpicker:focus {
            border: none;
            /* background-color: greenyellow; */

            background: none;
        }

        .form-option {
            font-size: x-large;
        }
    </style>
@endsection
@section('header')
    <!-- header area -->
    @include('layout.header')
    <!-- header area end -->
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset('cover_eurolibya.jpg') }})">
        <div class="container">
            <h2 class="breadcrumb-title">All World in your hand</h2>

        </div>
    </div>



    <!-- search area -->
    <x-flight-booking.flight-booking-search></x-flight-booking.flight-booking-search>
    <!-- search area end -->

    <div class="container mt-5">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">One way</button>
            </li>
            @if (request()->get('flight_type') == 'round_way')
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Return</button>
                </li>
            @endif


        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <!-- flight booking -->
                <x-flight-booking.flight-list :trips="$trips['one_ways']" :flightDate="request()->get('journey_date')" :numberOfadult="$numberOfadult" :numberOfChildren="$numberOfChildren">
                    </x-flight-booking.list>
                    <!-- flight booking end -->
            </div>
            @if (request()->get('flight_type') == 'round_way')
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- flight booking -->
                    <x-flight-booking.flight-list :trips="$trips['round_way']" :flightDate="request()->get('return_date')" :numberOfadult="$numberOfadult" :numberOfChildren="$numberOfChildren">
                        </x-flight-booking.list>
                        <!-- flight booking end -->
                </div>
            @endif
        </div>





        {{--
        <div class="col-lg-12 col-xl-12">
            <div class="flight-booking-detail-right">
                <ul class="nav nav-tabs" id="frTab1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="fr-tab1" data-bs-toggle="tab" data-bs-target="#fr-tab-pane1"
                            type="button" role="tab" aria-controls="fr-tab-pane1" aria-selected="true">One Way</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="fr-tab2" data-bs-toggle="tab" data-bs-target="#fr-tab-pane2"
                            type="button" role="tab" aria-controls="fr-tab-pane2" aria-selected="false">Round
                            Way</button>
                    </li>

                </ul>
                <div class="tab-content" id="frTabContent1">
                    <div class="tab-pane  show active" id="fr-tab-pane1" role="tabpanel" aria-labelledby="fr-tab1"
                        tabindex="0">
                        <div class="flight-booking-detail-info">
                            <!-- flight booking -->
                            <x-flight-booking.list :trips="$trips['one_ways']" :numberOfadult="$numberOfadult" :numberOfChildren="$numberOfChildren">
                            </x-flight-booking.list>
                            <!-- flight booking end -->
                        </div>
                    </div>
                    <div class="tab-pane " id="fr-tab-pane2" role="tabpanel" aria-labelledby="fr-tab2" tabindex="0">
                        <div class="flight-booking-detail-info">
                            <!-- flight booking -->
                            <h3>ewfwegfew</h3>
                            <!-- flight booking end -->
                        </div>
                    </div>

                </div>

            </div>
        </div> --}}
    </div>
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
        var availableDates2 = [];


        if ($("#return_way").is(":checked")) {
            chengeDate($("#to").val(), $("#from").val(), 'round_way')

        }


        chengeDate($("#from").val(), $("#to").val(), 'one_way')

        $("#to").change(function() {
            chengeDate($("#from").val(), $("#to").val(), 'one_way')
            // available();

        });
        $("#return_way").change(function() {
            chengeDate($("#to").val(), $("#from").val(), 'round_way')
            console.log();
        });

        function chengeDate(from, to, x) {
            // var from = $("#from").val();

            // var to = $("#to").val();
            if (from != "" && to != "") {
                $.ajax({

                    type: 'POST',

                    url: "{{ route('trips.get_available_days') }}",

                    data: {
                        from: from,
                        to: to
                    },

                    success: function(data) {

                        switch (x) {
                            case "one_way":
                                availableDates = data;

                                $("#datepicker").datepicker({
                                    minDate: new Date(),
                                    beforeShowDay: available
                                });
                                break;
                            case "round_way":
                                availableDates2 = data;

                                $("#datepicker_return_date").datepicker({
                                    minDate: new Date(),
                                    beforeShowDay: available2
                                });
                                break;
                            default:
                                break;
                        }



                        function available(date) {
                            dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                            // console.log(dmy+' : '+($.inArray(dmy, availableDates)));
                            if ($.inArray(dmy, availableDates) != -1) {
                                return [true, "", "Available"];
                            } else {
                                return [false, "", "unAvailable"];
                            }
                        }

                        function available2(date) {

                            dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                            // console.log(dmy+' : '+($.inArray(dmy, availableDates)));
                            if ($.inArray(dmy, availableDates2) != -1) {
                                return [true, "", "Available"];
                            } else {
                                return [false, "", "unAvailable"];
                            }
                        }
                        console.log(data, x);

                    }

                });
            }

        }
    </script>
@endsection
