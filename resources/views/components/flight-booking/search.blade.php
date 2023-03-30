<div class="search-area">
    <div class="container">
        <div class="search-wrapper">
            <!-- flight search -->
            <div class="search-box flight-search">
                <div class="search-form">
                    <form action="{{ route('tickets.search') }}">
                        <!-- flight type -->
                        <div class="flight-type">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" checked value="one_way" name="flight_type"
                                    id="flight-type1">
                                <label class="form-check-label" for="flight-type1">
                                    One Way
                                </label>
                            </div>
                            {{-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="round_way"
                                    name="flight_type" id="flight-type2">
                                <label class="form-check-label" for="flight-type2">
                                    Round Way
                                </label>
                            </div> --}}
                        </div>
                        <!-- flight type end -->

                        <!-- flight search wrapper -->
                        <div class="flight-search-wrapper">
                            <div class="flight-search-content">
                                <!-- flight search content -->
                                <div class="flight-search-item">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>From</label>
                                                <i class="fal fa-plane-departure"></i>
                                                <select class="selectpicker" name="from" style="" data-show-subtext="true" data-live-search="true">
                                                    @foreach ($airports as $airport)
                                                    <option selected  value="{{ $airport->id}}" data-subtext="{{ $airport->country->name }}">{{ $airport->name.','}}</option>
                                                    @endforeach
                                                 </select>

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="search-form-swap"><i class="far fa-repeat"></i>
                                                </div>
                                                <label>To</label>
                                                <div class="form-group-icon">
                                                    <select class="selectpicker" name="to" style="" data-show-subtext="true" data-live-search="true">
                                                    @foreach ($airports as $airport)
                                                    <option   value="{{ $airport->id}}" data-subtext="{{ $airport->country->name }}">{{ $airport->name.','}}</option>
                                                    @endforeach
                                                 </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="search-form-date">
                                                    <div class="search-form-journey">
                                                        <label>Journey Date</label>
                                                        <div class="form-group-icon">
                                                            <input type="text" name="journey_date"
                                                                class="form-control date-picker journey-date">
                                                            <i class="fal fa-calendar-days"></i>
                                                        </div>
                                                        <p class="journey-day-name"></p>
                                                    </div>
                                                    <div class="search-form-return">
                                                        <label>Return Date</label>
                                                        <div class="form-group-icon">
                                                            <input type="text" name="return_date"
                                                                class="form-control date-picker return-date">
                                                        </div>
                                                        <p class="return-day-name"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group dropdown static-dropdown passenger-box">
                                                <div class="passenger-class" role="menu" data-bs-toggle="dropdown"
                                                    data-bs-display="static" aria-expanded="false">
                                                    <label>Passenger, Class</label>
                                                    <div class="form-group-icon">
                                                        <div class="passenger-total"><span
                                                                class="passenger-total-amount">2</span>
                                                            Passenger
                                                        </div>
                                                        <i class="fal fa-user-plus"></i>
                                                    </div>
                                                    <p class="passenger-class-name">Business</p>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <div class="dropdown-item">
                                                        <div class="passenger-item">
                                                            <div class="passenger-info">
                                                                <h6>Adults</h6>
                                                                <p>12+ Years</p>
                                                            </div>
                                                            <div class="passenger-qty">
                                                                <button type="button" class="minus-btn"><i
                                                                        class="far fa-minus"></i></button>
                                                                <input type="text" name="adult"
                                                                    class="qty-amount passenger-adult" value="2"
                                                                    readonly>
                                                                <button type="button" class="plus-btn"><i
                                                                        class="far fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-item">
                                                        <div class="passenger-item">
                                                            <div class="passenger-info">
                                                                <h6>Children</h6>
                                                                <p>2-12 Years</p>
                                                            </div>
                                                            <div class="passenger-qty">
                                                                <button type="button" class="minus-btn"><i
                                                                        class="far fa-minus"></i></button>
                                                                <input type="text" name="children"
                                                                    class="qty-amount passenger-children" value="0"
                                                                    readonly>
                                                                <button type="button" class="plus-btn"><i
                                                                        class="far fa-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="dropdown-item">
                                                        <h6 class="mb-3 mt-2">Cabin Class</h6>
                                                        <div class="passenger-class-info">
                                                            @foreach ($seatTypes as $cabin)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        value="{{ $cabin->id }}" name="seat_types_id"
                                                                        id="cabin-class1">
                                                                    <label class="form-check-label"
                                                                        for="cabin-class1">
                                                                        {{ $cabin->name }}
                                                                    </label>
                                                                </div>
                                                            @endforeach


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- flight search content end -->

                                {{-- <!-- flight-multicity-item -->
                                <div class="flight-search-item flight-multicity-item have-to-clone">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>From</label>
                                                <div class="form-group-icon">
                                                    <input type="text" name="from-destination"
                                                        class="form-control swap-from" value="New York">
                                                    <i class="fal fa-plane-departure"></i>
                                                </div>
                                                <p>JFK - John F. Kennedy International Airport
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="search-form-swap"><i class="far fa-repeat"></i>
                                                </div>
                                                <label>To</label>
                                                <div class="form-group-icon">
                                                    <input type="text" name="to-destination"
                                                        class="form-control swap-to" value="Los Angeles">
                                                    <i class="fal fa-plane-arrival"></i>
                                                </div>
                                                <p>LAX - Los Angeles International Airport</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="search-form-date">
                                                    <div class="search-form-journey">
                                                        <label>Journey Date</label>
                                                        <div class="form-group-icon">
                                                            <input type="text" name="journey-date"
                                                                class="form-control date-picker journey-date">
                                                            <i class="fal fa-calendar-days"></i>
                                                        </div>
                                                        <p class="journey-day-name"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <div class="multicity-btn">
                                                    <i class="fal fa-plus-circle"></i> Add
                                                    Another Flight
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- flight multicity end --> --}}
                            </div>
                            <div class="search-btn">
                                <button type="submit" class="theme-btn"><span class="far fa-search"></span>Update
                                    Search</button>
                            </div>
                        </div>
                        <!-- flight search wrapper end -->
                    </form>
                </div>
            </div>
            <!-- flight search end -->
        </div>
    </div>
</div>
