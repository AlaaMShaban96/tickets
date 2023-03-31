@extends('layout.master')
@php
    $sub_Total= ($ticket->trip->adults_price * $ticket->adults_number ) + ($ticket->trip->children_price * $ticket->children_number);
    $taxes=($ticket->adults_number + $ticket->children_number) * $ticket->trip->tax;
@endphp
@section('content')

    <!-- breadcrumb -->
    <div class="site-breadcrumb" style="background: url(assets/img/breadcrumb/02.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title"> Confirm</h2>
            <ul class="breadcrumb-menu">
                <li><a href="index.html">Home</a></li>
                <li class="active">Booking Confirm</li>
            </ul>
        </div>
    </div>



    <!-- booking-confirm -->
    <div class="booking-confirm py-120">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="booking-confirm-content">
                        <div class="booking-confirm-icon"><i class="far fa-check"></i></div>
                        <h3>Your Booking {{ $ticket->trip->fromAirport->name }} - {{ $ticket->trip->toAirport->name }}  Is Confirmed.</h3>
                        <p>There are many variations of passages available but the majority have suffered alteration
                            in some form by injected humour or randomised words.</p>
                        <a href="{{ route('trips.search')}}" class="theme-btn">Book More Now<i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-8 mx-auto mt-5">
                    <div class="booking-summary">
                        <h3>Ticket Summary (#{{  $ticket->id }})</h3>
                        <div class="booking-summary-content">
                            <div class="row g-5">
                                <div class="col-lg-6">
                                    <div class="booking-summary-list">
                                        <h6>Ticket Info</h6>
                                        <ul>
                                            <li>Journey date : <span> {{ $ticket->journey_date}}</span></li>
                                            <li>Check In: <span> {{ $ticket->trip->check_in}}</span></li>
                                            <li>Duration: <span>1-4 Hours </span></li>
                                            <li>Cabin Class : <span>{{ $ticket->seatType->name }}</span></li>
                                            <li>Adults: <span>{{$ticket->adults_number }}</span></li>
                                            <li>Childs: <span>{{ $ticket->children_number }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="booking-summary-list">
                                        <h6>Airline Info</h6>
                                        <ul>
                                            <li> Airline Name <span>{{$ticket->trip->plane->airline->name}}</span></li>
                                            <li>Plane Address <span>{{ $ticket->trip->plane->name}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="booking-summary-list">
                                        <h6> Date & Time</h6>
                                        <ul>
                                            <li>Journey date <span>{{ $ticket->journey_date}}</span></li>
                                            <li>Take off at <span>{{ $ticket->trip->take_off_at}}</span></li>
                                            <li>Landing at <span>{{ $ticket->trip->landing_at}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="booking-summary-list">
                                        <h6>Billing Info</h6>
                                        <ul>
                                            <li>Ticket Id <span># {{ $ticket->id}}</span></li>
                                            <li>Ticket Status <span class="text-success">Completed</span></li>
                                            <li>Payment Method <span>Card</span></li>
                                            <li class="fw-bold">Total Payment with taxes <span>$ {{ $sub_Total + $taxes }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="cancel-booking-note">
                                        <p>Note: If you want to cancel your booking cancellation cost from now on: $50</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="booking-confirm-btn">
                            <a href="#" class="theme-btn"><span class="far fa-print"></span>Print Booking</a>
                            <a href="#" class="theme-btn cancel-booking"><span class="far fa-xmark-circle"></span>Cancel Booking</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- booking-confirm end -->

@endsection
