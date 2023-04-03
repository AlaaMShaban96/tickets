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
            <li><a href="#"><i class="far fa-user"></i> My Profile</a></li>
            {{-- <li><a href="#"><i class="far fa-clipboard-list"></i> My History</a></li> --}}
            <li class="profile-menu">
                <a class=" collapsed" href="#profile-menu" data-bs-toggle="collapse" aria-expanded="false" aria-controls="profile-menu">
                    <i class="far fa-plus-circle"></i> Add Listing <i class="far fa-angle-down profile-menu-angle"></i>
                </a>
                <div class="collapse" id="profile-menu" style="">
                    <ul class="profile-menu-list">
                        <li><a href="{{ route('trips.index');}}"> Flight</a></li>
                        {{-- <li><a href="#"> Cabin Class</a></li> --}}
                        <li><a href="#"> Airline</a></li>
                        <li><a href="#"> Airport</a></li>
                        <li><a href="#"> Plane</a></li>
                    </ul>
                </div>
            </li>

            <li><a href="{{ route('logout')}}"><i class="far fa-sign-out"></i> Logout</a></li>
        </ul>
    </div>
</div>
