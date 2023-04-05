<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Trip;
use App\Models\Plane;
use App\Models\Airline;
use App\Models\Airport;
use App\Models\SeatType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TripStoreRequest;
use App\Http\Requests\TripUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;

class TripController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trips = DB::table("trips")
        ->select(
            'trips.id',
            'trips.name',
            'trips.poilcy',
            'trips.take_off_at',
            'trips.landing_at',
            DB::raw('TIMEDIFF(trips.landing_at ,trips.take_off_at ) as trip_time'),
            'trips.need_visa',
            'trips.adults_price',
            'trips.check_in',
            'trips.tax',
            'trips.children_price',
            'trips.need_visa',
            'airport_from.id as airport_from_id',
            'airport_from.name as airport_from_name',
            'airport_to.id as airport_to_id',
            'airport_to.name as airport_to_name',
            'planes.photo as plane_photo',
            'planes.name as plane_name',
            'airlines.id as airline_id',
            'seat_types.name as seat_type_name',
            'airlines.name as airline_name',
            'airlines.logo as airline_photo',
            DB::raw("(trips.adults_price * 1) + (trips.tax  * 1 )  as adults"),
            DB::raw("(trips.children_price * 1 )  + (trips.tax  * 1 ) as children")
        )
        ->join('airports as airport_from', 'trips.from_airport_id', '=', 'airport_from.id')// this for retrive data for airport_from
        ->join('airports as airport_to', 'trips.to_airport_id', '=', 'airport_to.id')// this for retrive data for airport_to
        ->join('planes', 'trips.plane_id', '=', 'planes.id')// this for get name of plane and seat_types
        ->join('airlines', 'trips.airline_id', '=', 'airlines.id')
        ->join('day_trip', 'trips.id', '=', 'day_trip.trip_id') // this for get days of trip available
        ->join('plane_seat_type', 'planes.id', '=', 'plane_seat_type.plane_id')
        ->join('seat_types', 'plane_seat_type.seat_type_id', '=', 'seat_types.id')
        ->where('trips.id','>',0)


        ->get()->unique('id');

        return view('trip.index', compact('trips'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $airports=Airport::all();
        $days=Day::all();
        $planes=Plane::all();
        $airlines=Airline::all();
        return view('trip.create',compact('airports','days','planes','airlines'));
    }

    /**
     * @param \App\Http\Requests\TripStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TripStoreRequest $request)
    {
        try {
            DB::beginTransaction();
                $trip = Trip::create($request->validated());
                $trip->days()->sync($request->days);
                Alert::toast('Trip has been Created ', 'success')->position('top-end')->autoClose(5000);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
                Alert::toast('Trip Create Error', 'error')->position('top-end')->autoClose(5000);
            return redirect()->back()->withInput();
        }


        $request->session()->flash('trip.id', $trip->id);

        return redirect()->route('trips.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Trip $trip)
    {
        return view('trip.show', compact('trip'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Trip $trip)
    {
        $airports=Airport::all();
        $days=Day::all();
        $planes=Plane::all();
        $airlines=Airline::all();
        return view('trip.edit', compact('trip','airports','days','planes','airlines'));
    }

    /**
     * @param \App\Http\Requests\TripUpdateRequest $request
     * @param \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function update(TripUpdateRequest $request, Trip $trip)
    {
        try {
            DB::beginTransaction();
                $trip->update($request->validated());
                $trip->days()->sync($request->days);
                Alert::toast('Trip has been Updated ', 'success')->position('top-end')->autoClose(5000);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
                Alert::toast('Trip Update Error', 'error')->position('top-end')->autoClose(5000);
            return redirect()->back()->withInput();
        }


        return redirect()->route('trips.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Trip $trip)
    {
        if ($trip->ticket()->exists()) {
            Alert::toast('Trip has Tickets  ', 'error')->position('top-end')->autoClose(5000);
        } else {
            Alert::toast('Trip has been  Deleted ', 'success')->position('top-end')->autoClose(5000);
            $trip->delete();
        }

        return redirect()->route('trip.index');
    }
    public function booking( Trip $trip ,Request $request)
    {


        $seatType=SeatType::find($request->seat_types_id);
        $journey_date=$request->journey_date;
        $numberOfChildren=$request->numberOfChildren;
        $numberOfAdult=$request->numberOfAdult;
        $numberOfPassengers=$numberOfAdult + $numberOfChildren;
        // dd($numberOfPassengers,$numberOfAdult , $numberOfChildren);
        return view("trip.booking",compact('trip','numberOfPassengers','numberOfChildren','numberOfAdult','seatType','journey_date'));
    }
}
