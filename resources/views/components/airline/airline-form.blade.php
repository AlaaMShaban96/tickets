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
                <a href="{{ route('airlines.index') }}" class="theme-btn btn-danger mt-2">Back</a>

            </div>
        </div>
        @if (isset($airline->id))
            <form action="{{ route('airlines.update', $airline->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
            @else
                <form action="{{ route('airlines.store') }}" method="post" enctype="multipart/form-data">
        @endif
        @csrf
        <div class="user-profile-card add-listing">
            <h4 class="user-profile-card-title">{{ isset($airline->id) ? 'Edit' : 'Add' }} Airline</h4>
            <div class="col-lg-12">
                <div class="add-listing-form">
                    <h5 class="mb-4">Basic Information</h5>
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input required type="text" value="{{ $airline?->name }}" name="name"
                                    class="form-control" placeholder="Enter name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Logo </label>
                                <input {{!isset($airline->id)?"required":''}} type="file"  name="logo_upload"
                                    class="form-control" placeholder="Enter name">
                            </div>
                        </div>


                        <div class="col-lg-12 my-4">
                            <button type="submit" class="theme-btn">Submit Your Flight</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>

    </div>
</div>
