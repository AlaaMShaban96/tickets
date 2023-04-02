@extends('layout.master')

@section('content')
    <!-- activity list -->
    <div class="mt-5">

        <div class="activity-list py-120">
            <div class="container">
                <div class="row">
                    <!-- activity booking sidebar -->
                    <x-dashboaed.side-bar-menu></x-dashboaed.side-bar-menu>

                    <!-- activity booking list -->
                    <div class="col-lg-8 col-xl-9">
                        <div class="col-md-12">
                            <div class="booking-sort">
                                <a href="{{ route('dashboard.index') }}" class="theme-btn btn-danger mt-2">Back</a>
                                {{ $ticket->trip->fromAirport->name }}
                                -
                                {{ $ticket->trip->toAirport->name }}

                            </div>
                        </div>
                        <div class="row">
                            @foreach ($ticket->passengers as $passenger)
                                <x-passenger.info :passenger="$passenger"></x-passenger.info>
                            @endforeach



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- activity list end -->
    <!-- profile listinge end -->
@endsection
