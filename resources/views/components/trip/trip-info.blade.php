@props(['trip','seatType','journey_date','numberOfChildren','numberOfAdult'])
@php
    $sub_Total= ($trip->adults_price * $numberOfAdult ) + ($trip->children_price * $numberOfChildren);
    $taxes=($numberOfAdult + $numberOfChildren) * $trip->tax;
@endphp
<div class="booking-property-img">
    <img src="{{ asset($trip->plane->airline->logo)}}" alt="">
</div>
<div class="booking-property-content">
    <div class="booking-property-title">
        <div>
            <h5>{{ $trip->plane->airline->name}} </h5>
            <p><i class="far fa-map-marker-alt"></i> {{ $trip->fromAirport->name }},  {{ $trip->toAirport->name }}</p>
        </div>
    </div>
</div>
<div class="booking-info-summary">
    <h5>Order Info</h5>
    <ul>
        <li>Journey date : <span> {{ $journey_date}}</span></li>
        <li>Check In: <span> {{ $trip->check_in}}</span></li>
        <li>Duration: <span>1-4 Hours </span></li>
        <li>Cabin Class : <span>{{ $seatType->name }}</span></li>
        <li>Adults: <span>{{ $numberOfAdult}}</span></li>
        <li>Childs: <span>{{ $numberOfChildren }}</span></li>
    </ul>
</div>
<div class="booking-order-info">
    <div class="booking-pay-info">
        <h5>Booking Payment</h5>
        <ul>
            <li>Sub Total: <span>$ {{( $sub_Total )}}</span></li>
            <li>Taxes: <span>$ {{ $taxes}}</span></li>
            <li class="order-total">You Pay: <span>$ {{ $sub_Total + $taxes}}</span></li>
        </ul>
    </div>
</div>