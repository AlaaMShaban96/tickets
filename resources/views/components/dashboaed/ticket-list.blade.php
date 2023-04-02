

<div class="col-lg-9">
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
                                <th>Cabin Class</th>
                                <th>Passengers</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                            <tr>
                                <td>
                                    <div class="table-listing-info">
                                        <a href="#">
                                            <img src="{{ asset($ticket->trip->plane->airline->logo)}}" alt="">
                                            <div class="table-listing-content">
                                                <h6>
                                                    <i class="far fa-location-dot"></i>
                                                    {{ $ticket->trip->fromAirport->name }}
                                                </h6>
                                                <i class="fa-duotone fa-timer"></i> {{$ticket->trip->diff_date_for_humans}}
                                                {{-- {{$ticket->trip->landing_at->diffForHumans(\Carbon::parse($ticket->trip->take_off_at))}} --}}
                                                {{-- <p><i class="far fa-location-dot"></i> 25/B Milford Road, NY</p> --}}

                                                <h6>
                                                    <i class="far fa-location-dot"></i>
                                                    {{ $ticket->trip->toAirport->name }}
                                                </h6>
                                                <span>$ {{($ticket->adults_number * $ticket->trip->adults_price) + ($ticket->children_number * $ticket->trip->children_price)  }}</span>


                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <h6>{{ $ticket->seatType->name}}</h6>
                                </td>
                                <td>
                                    <h6>{{  $ticket->passengers_count }}</h6>
                                </td>
                                <td>
                                    <h6>{{ $ticket->journey_date }}</h6>
                                </td>
                                <td>
                                    @switch($ticket->status)
                                        @case(0)
                                            <span class="badge bg-success">Active</span>
                                            @break
                                        @case(1)
                                            <span class="badge bg-success">Done</span>
                                            @break
                                        @case(2)
                                            <span class="badge bg-danger">Reject</span>
                                            @break
                                        @case(3)
                                            <span class="badge bg-danger">Return</span>
                                            @break
                                    @endswitch
                                </td>

 
                                <td>
                                    <a href="{{ route('passengers.list',$ticket->id)}}" class="btn btn-outline-secondary btn-sm" title="list of passengers "><i class="far fa-eye"></i></a>
                                    <a href="{{ route("tickets.chenge_status",['ticket'=>$ticket->id,'status'=>1])}}" class="btn btn-outline-success btn-sm"><i class="fa-duotone fa-badge-check"></i>
                                    <a href="{{ route("tickets.chenge_status",['ticket'=>$ticket->id,'status'=>2])}}" class="btn btn-outline-danger btn-sm"><i class="fa-duotone fa-xmark-to-slot"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- pagination -->
                <div class="pagination-area my-3">
                    <div aria-label="Page navigation example">
                        <ul class="pagination mt-0">
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
                </div>
            </div>
        </div>
    </div>
</div>
