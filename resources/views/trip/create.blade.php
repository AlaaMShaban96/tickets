@extends('layout.master')

@section('content')
    <!-- profile listing -->
    <div class="mt-5">
        <div class="user-profile py-120">
            <div class="container">
                <div class="row">
                    <x-dashboaed.side-bar-menu></x-dashboaed.side-bar-menu>

                    <x-trip.trip-form  :airports="$airports"  :days="$days"  :planes="$planes"  :airlines="$airlines"></x-trip.trip-form>

                </div>
            </div>
        </div>
    </div>

    <!-- profile listinge end -->
@endsection
@section("script")
<script>

    var to_airport_id = document.querySelector('#to_airport_id');
    var from_airport_id = document.querySelector('#from_airport_id');

    dselect(to_airport_id, {
        search: true
    });
    dselect(from_airport_id, {
        search: true
    });
    </script>
@endsection
