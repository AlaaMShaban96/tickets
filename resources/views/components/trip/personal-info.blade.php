@props(['numberOfPassengers',"trip"])
@for ($i = 1; $i <= $numberOfPassengers; $i++)
    <label>Personal number {{ $i }}</label>
    <div class="booking-form">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>First Name</label>
                    <div class="form-group-icon">
                        <input required type="text" name="passengers[{{ $i }}][name]" value="{{ request()->get('passengers.*.name')??''}}"  class="form-control" placeholder="First Name">
                        <i class="far fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Last Name</label>
                    <div class="form-group-icon">
                        <input required type="text" name="passengers[{{ $i }}][last_name]"  class="form-control" placeholder="Last Name">
                        <i class="far fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Email</label>
                    <div class="form-group-icon">
                        <input required type="email" name="passengers[{{ $i }}][email]"  class="form-control" placeholder="Email Address">
                        <i class="far fa-envelopes"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Phone</label>
                    <div class="form-group-icon">
                        <input required type="text" name="passengers[{{ $i }}][mobile_number]"  class="form-control" placeholder="Phone Number">
                        <i class="far fa-phone"></i>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group">
                    <label>Gender</label>
                    <div class="form-group-icon">
                        <select class="select">
                            <option value="0">Female</option>
                            <option value="1">Male</option>
                        </select>
                        <i class="fa-solid fa-venus-mars"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Nationality</label>
                    <div class="form-group-icon">
                        <input required type="text" name="passengers[{{ $i }}][nationality]"  class="form-control" placeholder="Nationality">
                        <i class="fab fa-pagelines"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Place of birth</label>
                    <div class="form-group-icon">
                        <input required type="text" name="passengers[{{ $i }}][place_of_birth]"  class="form-control" placeholder="Place of birth">
                        <i class="fa-regular fa-location-crosshairs"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Birth date</label>
                    <div class="form-group-icon ">
                        <input required type="date" name="passengers[{{ $i }}][birth_date]"  class="form-control  birth_date" placeholder="Birth date">
                        <i class="fa-duotone fa-cake-candles"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Passport number</label>
                    <div class="form-group-icon">
                        <input required type="text" name="passengers[{{ $i }}][passport_number]"  class="form-control" placeholder="Passport number">
                        <i class="fa-solid fa-passport"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Passport expiry date</label>
                    <div class="form-group-icon">
                        <input required type="date" name="passengers[{{ $i }}][passport_expiry_date]"  class="form-control  passport_expiry_date" placeholder="Passport expiry date">
                        <i class="fa-duotone fa-alarm-clock"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Passport photo</label>
                    <div class="form-group-icon">
                        <input required type="file" name="passengers[{{ $i }}][passport_photo]"  class="form-control" placeholder="Passport photo">
                        <i class="fa-duotone fa-upload"></i>
                    </div>
                </div>
            </div>
            @if ($trip->need_visa)
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Visa photo</label>
                    <div class="form-group-icon">
                        <input required type="file" name="passengers[{{ $i }}][visa_photo]"  class="form-control" placeholder="Visa photo">
                        <i class="fa-duotone fa-image"></i>
                    </div>
                </div>
            </div>
            @endif


        </div>
    </div>
    <hr>

@endfor
