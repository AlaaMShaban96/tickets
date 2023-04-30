@extends('layout.master')
@section('header')
    <!-- header area -->
    @include("layout.header")
    <!-- header area end -->
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url({{ asset("summar.png")}})">
        <div class="container">
            <h2 class="breadcrumb-title">{{ $trip->fromAirport->name }} - {{ $trip->toAirport->name }} </h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">{{ $trip->airline->name }}</a></li>
                <li class="active">{{ $trip->name }}</li>
            </ul>
        </div>
    </div>
    @if($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
    <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
        <input type="hidden" name="return_trip_id" value="{{ $returnTrip?->id }}">
        <input type="hidden" name="type" value="one_way">
        <input type="hidden" name="seat_type_id" value="{{ $seatType->id}}">
        <input type="hidden" name="journey_date" value="{{ $journey_date}}">
        <input type="hidden" name="return_date" value="{{ $return_date}}">
        <input type="hidden" name="numberOfPassengers" value="{{ $numberOfPassengers}}">
        <input type="hidden" name="numberOfChildren" value="{{ $numberOfChildren}}">
        <input type="hidden" name="numberOfAdult" value="{{ $numberOfAdult}}">
        <!-- activity booking -->

        <div class="activity-booking py-120">
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="alert-body">
                        <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       Note : {{ $trip->poilcy}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="booking-widget">
                            <h4 class="booking-widget-title">Booking Personal Info</h4>

                            <x-trip.personal-info :trip="$trip" :numberOfPassengers="$numberOfPassengers"></x-trip.personal-info>

                        </div>
                        {{-- <div class="booking-widget">
                            <h4 class="booking-widget-title">Your Card Information</h4>
                            <x-trip.payment-info></x-trip.Payment-info>

                        </div> --}}
                        <div class="col-lg-4">
                            <div class="form-group mt-2">
                                <button type="submit" class="theme-btn">Confirm Booking<i
                                        class="far fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="booking-summary">
                            <h4 class="mb-30">Booking Summary</h4>
                            <x-trip.trip-info :trip="$trip" :returnTrip="$returnTrip" :numberOfChildren="$numberOfChildren" :numberOfAdult="$numberOfAdult" :seatType="$seatType"
                                :journey_date="$journey_date" :return_date="$return_date"></x-trip.trip-info>

                        </div>
                    </div>
                    {{-- <div class="col-lg-4">
                        <div class="form-group mt-2">
                            <button type="submit" class="theme-btn">Confirm Booking<i
                                    class="far fa-arrow-right"></i></button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- activity booking end -->
    </form>
@endsection
@section("script")
<script>

    var nationality = document.querySelector('#nationality');
    var to = document.querySelector('#to');

    dselect(nationality, {
        search: true
    });

    $(".passport_expiry_date").change(function (e) {
        var passport_expiry_date = $(this).val();
        console.log(passport_expiry_date);
        let increaseDate = new Date();
        let tody = new Date().toISOString().slice(0, 10);;
        let no_of_months = 3;
        increaseDate.setMonth(increaseDate.getMonth() + 6);
        increaseDate= increaseDate.toISOString().slice(0, 10);
        console.log(increaseDate > passport_expiry_date , increaseDate > tody);
        if (increaseDate > passport_expiry_date && increaseDate > tody) {
            $("#passport_expiry_date").val("");
            alert("you need to renew your passport");
        }

    });
    </script>
@endsection
