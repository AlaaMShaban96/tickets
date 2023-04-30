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
        @if (request()->get('flight_type') == 'round_way')
            @if (isset($trips['round_way']))

                <a id="booking_round_way"
                style="display: none;"
                    href="{{ route('trips.booking', [
                        'seat_types_id' => request()->get('seat_types_id'),
                        'journey_date' => request()->get('journey_date'),
                        'return_date' => request()->get('return_date'),
                        'numberOfAdult' => $numberOfadult,
                        'numberOfChildren' => $numberOfChildren,
                    ]) }}"
                    class="theme-btn text-end">Book Now<i class="far fa-arrow-right"></i></a>
            @endif
        @endif


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
                @if (isset($trips['one_ways']))
                    <!-- flight booking -->
                    <x-flight-booking.flight-list tripType="one_way" :trips="$trips['one_ways']" :flightDate="request()->get('journey_date')" :numberOfadult="$numberOfadult"
                        :numberOfChildren="$numberOfChildren">
                        </x-flight-booking.list>
                        <!-- flight booking end -->
                @endif

            </div>
            @if (request()->get('flight_type') == 'round_way')
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @if (isset($trips['round_way']))
                        <!-- flight booking -->
                        <x-flight-booking.flight-list tripType="round_way" :trips="$trips['round_way']" :flightDate="request()->get('return_date')"
                            :numberOfadult="$numberOfadult" :numberOfChildren="$numberOfChildren">
                            </x-flight-booking.list>

                            <!-- flight booking end -->

                    @endif

                </div>
            @endif
        </div>

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
            if ($("#return_way").is(":checked")) {
                chengeDate($("#to").val(), $("#from").val(), 'round_way')

            }

        });


        $("#booking_round_way").click(function(e) {
            // e.preventDefault();

            // if ($('#one_way:checked').val() && $('#round_way:checked').val()) {

            //     let url = $(this).attr('href') + '&one_way_id=' + $('#one_way').val() + '&round_way_id=' + $(
            //         '#round_way').val();
            //     window.open(url, "_self")
            // } else {
            //     alert('pleas select tickets ')
            // }
        });

        $("#return_way").change(function() {
            chengeDate($("#to").val(), $("#from").val(), 'round_way')
            // console.log(';k[pk[pk]]',$('#one_way').val(),$('#round_way').val());
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




        $('.select-trip').click(function(e) {
            ///profile-tab
            if ($(this).attr('name') == "round_way") {
                let url = $("#booking_round_way").attr('href');
                $("#booking_round_way").attr('href', url+'&round_way_id=' + $("#"+$(this).attr('id')).val()) ;
                document.getElementById("booking_round_way").click();
            } else {
                let url = $("#booking_round_way").attr('href');
                $("#booking_round_way").attr('href', url+'&one_way_id=' + $("#"+$(this).attr('id')).val())
            document.getElementById("profile-tab").click();

            }
            // document.getElementById("profile-tab").click();
            // console.log($(this).attr('id'),$("#"+$(this).attr('id')).val());
        });
    </script>
@endsection
