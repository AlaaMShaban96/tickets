<div class="col-lg-9">
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <button class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
            </div>
        </div>
    @endif
    <div class="user-profile-wrapper">
        <div class="col-md-12">
            <div class="booking-sort">
                <a href="{{ route('trips.index') }}" class="theme-btn btn-danger mt-2">Back</a>

            </div>
        </div>
        @if (isset($trip->id))
            <form action="{{ route('trips.update', $trip->id) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('trips.store') }}" method="post">
        @endif
        @csrf
        <div class="user-profile-card add-listing">
            <h4 class="user-profile-card-title">{{ isset($trip->id) ? 'Edit' : 'Add' }} Flight</h4>
            <div class="col-lg-12">
                <div class="add-listing-form">
                    <h5 class="mb-4">Basic Information</h5>
                    <form action="#">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input required type="text" value="{{ $trip?->name }}" name="name"
                                        class="form-control" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>From airport</label>
                                    <select required class="form-select" value="{{ $trip?->from_airport_id}}" id="from_airport_id" name="from_airport_id">
                                        @foreach ($airports as $airport)
                                            <option {{ $trip?->from_airport_id == $airport->id ? 'selected':''}}  value="{{ $airport->id }}">{{ $airport->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>To airport</label>
                                    <select required class="form-select" value="{{ $trip?->to_airport_id}}" id="to_airport_id" name="to_airport_id">
                                        @foreach ($airports as $airport)
                                            <option {{ $trip?->to_airport_id == $airport->id ? 'selected':''}}  value="{{ $airport->id }}">{{ $airport->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Take Off</label>
                                    <input required type="time" value="{{ $trip->take_off_at ?? '' }}" class="form-control"
                                        name="take_off_at" id="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Landing</label>
                                    <input required type="time" value="{{ $trip->landing_at ?? '' }}" class="form-control"
                                        name="landing_at" id="">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Check in</label>
                                    <input required type="time" value="{{ $trip->check_in ?? '' }}" class="form-control"
                                        name="check_in" id="">
                                </div>
                            </div>
                            <h5 class="my-4">Flight Information</h5>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Airline</label>
                                    <select  required class="select" name="airline_id">
                                        @foreach ($airlines as $airline)
                                            <option {{ $trip?->airline_id == $airline->id ? 'selected' : '' }}
                                                value="{{ $airline->id }}">{{ $airline->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Plane</label>
                                    <select required class="select" name="plane_id">
                                        @foreach ($planes as $plane)
                                            <option {{ $trip?->plane_id == $plane->id ? 'selected' : '' }}
                                                value="{{ $plane->id }}">{{ $plane->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <label>Days</label>
                            {{--  --}}
                            @foreach ($days as $day)
                                <div class="col-6 col-md-3">
                                    <div class="form-check">
                                        <input  class="form-check-input"
                                            {{ $trip?->days()->where('id', $day->id)->exists()? 'checked': '' }}
                                            name="days[]" type="checkbox" value=" {{ $day->id }}" id="included1">
                                        <label class="form-check-label" for="included1">
                                            {{ $day->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <h5 class="mb-4">Financial information</h5>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>adults Price (Per Person)</label>
                                    <input required type="number" value="{{ $trip?->adults_price }}" name="adults_price"
                                        class="form-control" placeholder="Enter price">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>children Price (Per Person)</label>
                                    <input required type="number" value="{{ $trip?->children_price }}" name="children_price"
                                        class="form-control" placeholder="Enter price">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>tax</label>
                                    <input type="number" value="{{ $trip?->tax }}" name="tax"
                                        class="form-control" placeholder="Enter tax">
                                </div>
                            </div>

                            <h5 class="my-4">Settings Information</h5>
                            <div class="col-6 col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" {{ $trip?->available ==1 ? 'checked' : '' }}
                                        name="available" type="checkbox"  id="available">
                                    <label class="form-check-label" for="available">
                                        available
                                    </label>
                                </div>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" {{ $trip?->need_visa ? 'checked' : '' }}
                                        name="need_visa" type="checkbox"  id="need_visa">
                                    <label class="form-check-label" for="need_visa">
                                        need visa
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Poilcy</label>
                                    <textarea required class="form-control" name="poilcy" placeholder="Write description" cols="30" rows="5">{{ $trip?->poilcy }}</textarea>
                                </div>
                            </div>


                            <div class="col-lg-12 my-4">
                                <button type="submit" class="theme-btn">Submit Your Flight</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </form>

    </div>
</div>
