<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $numberOfadult=$request->adult??1;
        $numberOfChildren= $request->children??0;
        $passengersNumber=$numberOfadult+$numberOfChildren;
        $fromDateNumber=new Carbon(strtotime($request->journey_date));
        $trips=DB::table("trips")
        ->select(
            'trips.id',
            'trips.name',
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
            DB::raw("(trips.adults_price * $numberOfadult) + (trips.tax  * $numberOfadult )  as adults"),
            DB::raw("(trips.children_price * $numberOfChildren )  + (trips.tax  * $numberOfChildren ) as children")
        )
        ->join('airports as airport_from', 'trips.from_airport_id', '=', 'airport_from.id')
        ->join('airports as airport_to', 'trips.to_airport_id', '=', 'airport_to.id')
        ->join('planes', 'trips.plane_id', '=', 'planes.id')
        ->join('airlines', 'planes.airline_id', '=', 'airlines.id')
        ->join('day_trip', 'trips.id', '=', 'day_trip.trip_id')
        ->join('seats', 'trips.id', '=', 'seats.trip_id')
        ->join('seat_types', 'seats.seat_type_id', '=', 'seat_types.id')
        // ->where('day_trip.day_id',1)
        ->where('day_trip.day_id',($fromDateNumber->dayOfWeek+1))
        ->where('seats.available','>=',$passengersNumber)
        // ->where('seats.seat_type_id',1)
        ->where('seats.seat_type_id',$request->seat_types_id)
        ->where('from_airport_id',$request->from)
        ->where('to_airport_id',$request->to)
        ->get();
        // dd($request->all(),$trips,($fromDateNumber->dayOfWeek),$request->seat_types_id);
        return view('welcome',compact('trips','numberOfadult','numberOfChildren'));
    }
}
