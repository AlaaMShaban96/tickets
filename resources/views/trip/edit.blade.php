@extends('layout.master')

@section('content')
    <!-- profile listing -->
    <div class="mt-5">
        <div class="user-profile py-120">
            <div class="container">
                <div class="row">
                    <x-dashboaed.side-bar-menu></x-dashboaed.side-bar-menu>

                    <x-trip.trip-form :trip="$trip" :airports="$airports"  :days="$days"  :planes="$planes"  :airlines="$airlines"></x-trip.trip-form>

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

    // $(".passport_expiry_date").change(function (e) {
    //     var passport_expiry_date = $(this).val();
    //     console.log(passport_expiry_date);
    //     let increaseDate = new Date();
    //     let tody = new Date().toISOString().slice(0, 10);;
    //     let no_of_months = 3;
    //     increaseDate.setMonth(increaseDate.getMonth() + 6);
    //     increaseDate= increaseDate.toISOString().slice(0, 10);
    //     console.log(increaseDate > passport_expiry_date , increaseDate > tody);
    //     if (increaseDate > passport_expiry_date && increaseDate > tody) {
    //         $("#passport_expiry_date").val("");
    //         alert("you need to renew your passport");
    //     }

    // });
    </script>
@endsection
