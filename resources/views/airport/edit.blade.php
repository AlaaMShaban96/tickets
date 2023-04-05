@extends('layout.master')

@section('content')
    <!-- profile listing -->
    <div class="mt-5">
        <div class="user-profile py-120">
            <div class="container">
                <div class="row">
                    <x-dashboaed.side-bar-menu></x-dashboaed.side-bar-menu>

                    <x-airport.airport-form  :airport="$airport" :countries="$countries"></x-airline.airline-form-form>

                </div>
            </div>
        </div>
    </div>

    <!-- profile listinge end -->
@endsection

@section("script")
<script>

    var nationality = document.querySelector('#countries');

    dselect(nationality, {
        search: true
    });


    </script>
@endsection
