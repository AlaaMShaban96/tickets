<div class="col-lg-3">
    <div class="user-profile-sidebar">
        <div class="user-profile-sidebar-top">
            <div class="user-profile-img">
                <img src="{{asset("logo_eurolibya.jpg")}}" alt="">
                {{-- <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
                <input type="file" class="profile-img-file"> --}}
            </div>
            <h4>{{ auth()->user()->name }}</h4>
            <p>{{ auth()->user()->email }}</p>
        </div>
        <ul class="user-profile-sidebar-list">
            <li><a class="active" href="{{ route('dashboard.index')}}"><i class="far fa-gauge-high"></i> Dashboard</a></li>
            {{-- <li><a href="profile.html"><i class="far fa-user"></i> My Profile</a></li>
            <li><a href="profile-booking.html"><i class="far fa-shopping-bag"></i> My Booking</a></li>
            <li><a href="profile-booking-history.html"><i class="far fa-clipboard-list"></i> Booking History</a></li>
            <li><a  href="profile-listing.html"><i class="far fa-globe"></i> My Listing</a></li> --}}

            <li><a href="{{ route('logout')}}"><i class="far fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>
</div>
