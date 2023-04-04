@extends('layout.master')

@section('content')

    <!-- profile listing -->
    <div class="mt-5">
        <div class="user-profile py-120">
            <div class="container">
                <div class="row">
                    <x-dashboaed.side-bar-menu></x-dashboaed.side-bar-menu>

                    <x-airline.airline-list :airlines="$airlines"></x-airline.airline-list>

                </div>
            </div>
        </div>
    </div>

    <!-- profile listinge end -->
@endsection
