<div class="flight-booking flight-list py-120">
    <div class="container">
        <div class="row">
            <!-- booking list -->
            <div class="col-lg-12">
                <div class="col-md-12">
                    <div class="booking-sort">
                        <h5>{{ $trips ? count($trips) : 0 }} Results Found</h5>
                        <div class="col-md-3 booking-sort-box">

                        </div>
                    </div>
                </div>
                <div class="row">
                    @forelse ($trips as $trip)
                        <!-- flight booking item -->
                        <div class="col-lg-12">
                            <div class="flight-booking-item">
                                <div class="flight-booking-wrapper">
                                    <div class="flight-booking-info">
                                        <div class="flight-booking-content">
                                            <div class="flight-booking-airline">
                                                <div class="flight-airline-img">
                                                    <img src="{{ asset($trip->airline_photo)}}" alt="">
                                                </div>
                                                <h5 class="flight-airline-name">{{ $trip->airline_name}}</h5>
                                            </div>
                                            <div class="flight-booking-time">
                                                <div class="start-time">
                                                    <div class="start-time-icon">
                                                        <i class="fal fa-plane-departure"></i>
                                                    </div>
                                                    <div class="start-time-info">
                                                        <h6 class="start-time-text">{{ $trip->take_off_at}}</h6>
                                                        <span class="flight-destination">{{ $trip->airport_from_name}}</span>
                                                    </div>
                                                </div>
                                                <div class="flight-stop">
                                                    {{-- <span class="flight-stop-number">Non Stop</span> --}}
                                                    <div class="flight-stop-arrow"></div>
                                                </div>
                                                <div class="end-time">
                                                    <div class="start-time-icon">
                                                        <i class="fal fa-plane-arrival"></i>
                                                    </div>
                                                    <div class="start-time-info">
                                                        <h6 class="end-time-text">{{ $trip->landing_at}}</h6>
                                                        <span class="flight-destination">{{ $trip->airport_to_name}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flight-booking-duration">
                                                <span class="duration-text">{{ $trip->trip_time}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flight-booking-price">
                                        <div class="price-info">
                                            {{-- <del class="discount-price">$5,548</del> --}}
                                            <span class="price-amount">${{$trip->adults + $trip->children}}</span>
                                        </div>
                                        <a href="{{ route("trips.booking",['trip'=>$trip->id,'seat_types_id'=>request()->get('seat_types_id'),'journey_date'=>request()->get('journey_date'),'numberOfAdult'=> $numberOfadult,'numberOfChildren'=>$numberOfChildren])}}" class="theme-btn">Book Now<i
                                                class="far fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="flight-booking-detail">
                                    <div class="flight-booking-detail-header">
                                        <p></p>
                                        <a href="#flight-booking-collapse1" data-bs-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="flight-booking-collapse1">Flight
                                            Details <i class="far fa-angle-down"></i></a>
                                    </div>
                                    <div class="collapse" id="flight-booking-collapse1">
                                        <div class="flight-booking-detail-wrapper">
                                            <div class="row">
                                                <div class="col-lg-12 col-xl-12">
                                                    <div class="flight-booking-detail-right">
                                                        <ul class="nav nav-tabs" id="frTab1" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="fr-tab1"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#fr-tab-pane1" type="button"
                                                                    role="tab" aria-controls="fr-tab-pane1"
                                                                    aria-selected="true">Baggage</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="fr-tab2"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#fr-tab-pane2" type="button"
                                                                    role="tab" aria-controls="fr-tab-pane2"
                                                                    aria-selected="false">Fare</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="fr-tab3"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#fr-tab-pane3" type="button"
                                                                    role="tab" aria-controls="fr-tab-pane3"
                                                                    aria-selected="false">Policy</button>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="frTabContent1">
                                                            <div class="tab-pane  show active" id="fr-tab-pane1"
                                                                role="tabpanel" aria-labelledby="fr-tab1"
                                                                tabindex="0">
                                                                <div class="flight-booking-detail-info">
                                                                    <table class="table table-borderless">
                                                                        <tr>
                                                                            <th>Flight</th>
                                                                            <th>Cabin</th>
                                                                            <th>Check In</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>{{ $trip->airport_from_name}} - {{ $trip->airport_to_name}}</td>
                                                                            <td>{{ $trip->seat_type_name}}</td>
                                                                            <td>{{ $trip->check_in}}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane " id="fr-tab-pane2"
                                                                role="tabpanel" aria-labelledby="fr-tab2"
                                                                tabindex="0">
                                                                <div class="flight-booking-detail-info">
                                                                    <table class="table table-borderless">
                                                                        <tr>
                                                                            <th>Fare Summary</th>
                                                                            <th>Base Fare</th>
                                                                            <th>Tax</th>
                                                                            <th>Total</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Adult x {{ $numberOfadult}}</td>
                                                                            <td>$ {{ $trip->adults_price}}</td>
                                                                            <td>$ {{ $trip->tax}}</td>
                                                                            <td>$ {{ $trip->adults}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Child x {{ $numberOfChildren}}</td>
                                                                            <td>$ {{ $trip->children_price}}</td>
                                                                            <td>$ {{ $trip->tax}}</td>
                                                                            <td>$ {{ $trip->children}}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane " id="fr-tab-pane3"
                                                                role="tabpanel" aria-labelledby="fr-tab3"
                                                                tabindex="0">
                                                                <div class="flight-booking-detail-info">
                                                                    <div class="flight-booking-policy">
                                                                        <ul>
                                                                            <li>
                                                                                1. Refund and Date Change are done as
                                                                                per the following policies.
                                                                            </li>
                                                                            <li>
                                                                                2. Refund Amount= Refund Charge (as per
                                                                                airline policy + ShareTrip Convenience
                                                                                Fee).
                                                                            </li>
                                                                            <li>
                                                                                3. Date Change Amount= Date Change Fee
                                                                                (as per Airline Policy + ShareTrip
                                                                                Convenience Fee).
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flight-booking-detail-price">
                                                            <h6 class="flight-booking-detail-price-title">Total (2
                                                                Traveler)</h6>
                                                            <div class="flight-detail-price-amount">
                                                                ${{$trip->adults + $trip->children}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                    {{-- <!-- pagination -->
                    <div class="pagination-area">
                        <div aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="pagination-showing">
                            <p>Showing 1 - 6 of 24 Flights</p>
                        </div>
                    </div>
                    <!-- pagination end --> --}}

                </div>
            </div>
        </div>
    </div>
</div>
