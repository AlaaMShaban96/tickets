
<div class="col-lg-9 row">
    <div class="col-md-12">
        <div class="booking-sort">
            <h5>{{ $airports ? count($airports) : 0 }} Results Found</h5>
            <div class="user-profile-card-header-right">
                <div class="user-profile-search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <i class="far fa-search"></i>
                    </div>
                </div>
                <a href="{{ route('airports.create') }}" class="theme-btn"><span class="far fa-plus-circle"></span>Add Airline</a>
            </div>
        </div>
    </div>
    @forelse ($airports as $airport)
        <div class="col-md-12 col-lg-4">
            <div class="team-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                {{-- <div class="team-img">
                    <img src="{{ \Storage::disk('local')->url($airport->logo) }}" style="width: 100%;" alt="thumb">
                </div> --}}
                <div class="team-content">
                    <div class="team-bio">
                        <h5><a href="#">{{ $airport->name }}</a></h5>
                        <h6><a href="#">{{ $airport->country->name }}</a></h6>

                        {{-- <span>Founder & Director</span> --}}
                    </div>
                    <div class="team-social">
                        <ul class="team-social-btn">
                            <li><span><i class="fa-regular fa-plane"></i></span></li>
                            <li><a href="{{ route('airports.edit',$airport->id)}}"><i class="fa-regular fa-pen-to-square"></i></a></li>
                            <form action="{{ route("airports.destroy",$airport->id)}}" method="post">
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
