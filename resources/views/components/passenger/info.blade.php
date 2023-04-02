<div class="col-md-12">
    <div class="activity-item">
        <div class="activity-img">
            <img src="{{ asset($passenger->passport_photo)}}" alt="" style="width: 100%;height: 250px;">
            <a href="#" class="add-wishlist"><i class="far fa-heart"></i></a>
        </div>
        <div class="activity-content">
            <h4 class="activity-title">
                <a href="#">
                    {{$passenger->name }} {{ $passenger->last_name}}
                </a>
            </h4>
            <div class="row">
                <div class="col">
                    <p><i class="far fa-location-dot"></i> {{$passenger->nationality }}</p>
                    <p><i class="fa-duotone fa-cake-candles"></i> {{$passenger->birth_date->format('Y-m-d') }}</p>
                    <p><i class="fa-solid fa-passport"></i>{{$passenger->passport_number }}</p>
                    <p><i class="fa-duotone fa-calendar-days"></i>{{$passenger->passport_expiry_date->format('Y-m-d') }}</p>

                </div>
                <div class="col">
                    <p><i class="fa-solid fa-phone"></i>{{$passenger->mobile_number }}</p>
                    <p><i class="fa-solid fa-venus-mars"></i> {{$passenger->gender?'Male':'Female' }}</p>
                    <p><i class="fa-duotone fa-envelope"></i> {{$passenger->email }}</p>
                </div>
            </div>

            <div class="activity-bottom">
                <div class="activity-price">
                    {{-- <span class="activity-price-amount">$300</span> --}}
                </div>
                <div class="activity-text-btn">
                    <a href="#">See Details <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
