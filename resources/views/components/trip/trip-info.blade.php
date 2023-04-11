@props(['trip','returnTrip','seatType','return_date','journey_date','numberOfChildren','numberOfAdult'])
@php
    $sub_Total= ($returnTrip?->adults_price??1 * $trip->adults_price * $numberOfAdult  ) + ($returnTrip?->children_price??1 * $trip->children_price * $numberOfChildren);
    $taxes=($numberOfAdult + $numberOfChildren) * $trip->tax * $returnTrip?->tax??1;
@endphp
<div class="booking-property-img">
    <img src="{{ asset($trip->airline->logo)}}" alt="">
</div>
<div class="booking-property-content">
    <div class="booking-property-title">
        <div>
            <h5>{{ $trip->airline->name}} </h5>
            <p><i class="far fa-map-marker-alt"></i> {{ $trip->fromAirport->name }},  {{ $trip->toAirport->name }}</p>
        </div>
    </div>
</div>
@if ($returnTrip != null )
    <hr>
    <div class="booking-property-img">
        <img src="{{ asset($returnTrip->airline->logo)}}" alt="">
    </div>
    <div class="booking-property-content">
        <div class="booking-property-title">
            <div>
                <h5>{{ $returnTrip->airline->name}} </h5>
                <p><i class="far fa-map-marker-alt"></i> {{ $returnTrip->fromAirport->name }},  {{ $returnTrip->toAirport->name }}</p>
            </div>
        </div>
    </div>
@endif
<div class="booking-info-summary">
    <h5>Order Info</h5>
    <ul>
        <li>Journey date : <span> {{ $journey_date}}</span></li>
        <li>Check In: <span> {{ $trip->check_in}}</span></li>
        {{-- <li>Duration: <span>1-4 Hours </span></li> --}}
    </ul>
    @if ($returnTrip != null )
    <hr>
    <ul>
        <li>Return date : <span> {{ $return_date}}</span></li>
        <li>Check In: <span> {{ $returnTrip->check_in}}</span></li>
        {{-- <li>Duration: <span>1-4 Hours </span></li> --}}
    </ul>
    @endif
    <hr>

    <ul>
        <li>Cabin Class : <span>{{ $seatType->name }}</span></li>
        <li>Adults: <span> {{ $numberOfAdult}}x{{ $trip->adults_price}}</span></li>
        <li>Childs: <span>{{ $numberOfChildren }}x{{ $trip->children_price}}</span></li>
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
