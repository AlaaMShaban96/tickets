@extends('layout.master')

@section('content')

    <!-- profile listing -->
    <div class="mt-5">
        <div class="user-profile py-120">
            <div class="container">
                <div class="row">
                    <x-dashboaed.side-bar-menu></x-dashboaed.side-bar-menu>

                    <x-trip.trip-list :trips="$trips"></x-trip.trip-list>

                </div>
            </div>
        </div>
    </div>

    <!-- profile listinge end -->
@endsection
