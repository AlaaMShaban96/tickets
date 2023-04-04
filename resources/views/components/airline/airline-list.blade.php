{{-- <div class="col-lg-9">
    <div class="user-profile-wrapper">
        <div class="user-profile-card user-profile-listing">
            <div class="user-profile-card-header">
                <h4 class="user-profile-card-title">New Tickets</h4>
                <div class="user-profile-card-header-right">
                    <div class="user-profile-search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <i class="far fa-search"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>AirLine</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($airlines as $airline)
                            <tr>
                                <td>
                                    <div class="table-listing-info">
                                        <a href="#">
                                            <img src="{{ asset($airline->logo)}}" alt="">
                                            <div class="">
                                                <h6>
                                                    <i class="far fa-location-dot"></i>
                                                    {{ $airline->name }}
                                                </h6>


                                            </div>
                                        </a>
                                    </div>
                                </td>


                                <td>
                                    <a href="{{ route("airlines.edit",$airline->id)}}" class="btn btn-outline-success btn-sm"><i class="fa-duotone fa-badge-check"></i>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="col-lg-9 row">
    <div class="col-md-12">
        <div class="booking-sort">
            <h5>{{ $airlines ? count($airlines) : 0 }} Results Found</h5>
            <div class="user-profile-card-header-right">
                <div class="user-profile-search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <i class="far fa-search"></i>
                    </div>
                </div>
                <a href="{{ route('airlines.create') }}" class="theme-btn"><span class="far fa-plus-circle"></span>Add Airline</a>
            </div>
        </div>
    </div>
    @forelse ($airlines as $airline)
        <div class="col-md-12 col-lg-4">
            <div class="team-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                <div class="team-img">
                    <img src="{{ \Storage::disk('local')->url($airline->logo) }}" style="width: 100%;" alt="thumb">
                </div>
                <div class="team-content">
                    <div class="team-bio">
                        <h5><a href="#">{{ $airline->name }}</a></h5>
                        {{-- <span>Founder & Director</span> --}}
                    </div>
                    <div class="team-social">
                        <ul class="team-social-btn">
                            <li><span><i class="fa-solid fa-plus"></i></span></li>
                            <li><a href="{{ route('airlines.edit',$airline->id)}}"><i class="fa-regular fa-pen-to-square"></i></a></li>
                            <form action="{{ route("airlines.destroy",$airline->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <li><button style="background: transparent;border: none;" type="submit"><i class="fa-regular fa-trash"></i></button></li>
                            </form>
                         {{--<li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @empty
    @endforelse


</div>
