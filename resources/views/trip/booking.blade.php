@extends('layout.master')

@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/06.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">{{ $trip->fromAirport->name }} - {{ $trip->toAirport->name }} </h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">{{ $trip->plane->airline->name }}</a></li>
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
        <input type="hidden" name="type" value="one_way">
        <input type="hidden" name="seat_type_id" value="{{ $seatType->id}}">
        <input type="hidden" name="journey_date" value="{{ $journey_date}}">
        <input type="hidden" name="numberOfPassengers" value="{{ $numberOfPassengers}}">
        <input type="hidden" name="numberOfChildren" value="{{ $numberOfChildren}}">
        <input type="hidden" name="numberOfAdult" value="{{ $numberOfAdult}}">
        <!-- activity booking -->
        <div class="activity-booking py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="booking-widget">
                            <h4 class="booking-widget-title">Booking Personal Info</h4>

                            <x-trip.personal-info :trip="$trip" :numberOfPassengers="$numberOfPassengers"></x-trip.personal-info>

                        </div>
                        <div class="booking-widget">
                            <h4 class="booking-widget-title">Your Card Information</h4>
                            <x-trip.payment-info></x-trip.Payment-info>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="booking-summary">
                            <h4 class="mb-30">Booking Summary</h4>
                            <x-trip.trip-info :trip="$trip" :numberOfChildren="$numberOfChildren" :numberOfAdult="$numberOfAdult" :seatType="$seatType"
                                :journey_date="$journey_date"></x-trip.trip-info>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mt-2">
                            <button type="submit" class="theme-btn">Confirm Booking<i
                                    class="far fa-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- activity booking end -->
    </form>
@endsection