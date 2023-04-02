<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $nowDate = Carbon::now();
        $trips=collect();

        $numberOfadult=$request->adult??1;
        $numberOfChildren= $request->children??0;
        $passengersNumber=$numberOfadult+$numberOfChildren;
        $fromDateNumber=new Carbon(strtotime($request->journey_date));
        if (!$nowDate->gt($fromDateNumber)) {
            $trips=DB::table("trips")
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
                DB::raw("(trips.adults_price * $numberOfadult) + (trips.tax  * $numberOfadult )  as adults"),
                DB::raw("(trips.children_price * $numberOfChildren )  + (trips.tax  * $numberOfChildren ) as children")
            )
            ->join('airports as airport_from', 'trips.from_airport_id', '=', 'airport_from.id')// this for retrive data for airport_from
            ->join('airports as airport_to', 'trips.to_airport_id', '=', 'airport_to.id')// this for retrive data for airport_to
            ->join('planes', 'trips.plane_id', '=', 'planes.id')// this for get name of plane and seat_types
            ->join('airlines', 'planes.airline_id', '=', 'airlines.id')
            ->join('day_trip', 'trips.id', '=', 'day_trip.trip_id') // this for get days of trip available
            ->join('plane_seat_type', 'planes.id', '=', 'plane_seat_type.plane_id')
            ->join('seat_types', 'plane_seat_type.seat_type_id', '=', 'seat_types.id')
            // ->leftJoin('bookings', 'trips.id', '=', 'bookings.trip_id')
            // ->join('bookings', 'trips.id', '=', 'bookings.trip_id')
            ->where('seat_types.id',$request->seat_types_id)


            ->where('day_trip.day_id',($fromDateNumber->dayOfWeek+1))
            ->where('from_airport_id',$request->from)
            ->where('to_airport_id',$request->to)
            // ->where(function($query) use ($request, $passengersNumber)
            // {
            //     // $query
            //     $query
            //     ->whereNull('bookings.date') // if dont
            //     // ->whereNotNull('bookings.date') // if dont


            //     ->orWhere(function($query) use ($request, $passengersNumber)
            //     {
            //         $query
                    // ->whereNotNull('bookings.date')
                    // ->Where('plane_seat_type.number','>=','bookings.available')
                    // ->where('bookings.available','<=',$passengersNumber)
                //     ;

                // });


            // })
            ->get();
        }

        // dd($request->all(),$trips,($fromDateNumber->dayOfWeek),$request->seat_types_id);
        return view('welcome',compact('trips','numberOfadult','numberOfChildren'));
    }
    public function getDates(Request $request)
    {
        $nowDate = Carbon::now();

        $numberOfadult=$request->adult??1;
        $numberOfChildren= $request->children??0;
        $passengersNumber=$numberOfadult+$numberOfChildren;

        $days=DB::table("days")
            ->select('days.*')
            ->join('day_trip', 'days.id', '=', 'day_trip.day_id')
            ->join('trips', 'day_trip.trip_id', '=', 'trips.id')
            ->join('seats', 'trips.id', '=', 'seats.trip_id')
            ->join('seat_types', 'seats.seat_type_id', '=', 'seat_types.id')
            ->where('from_airport_id',$request->from)
            ->where('to_airport_id',$request->to)
            ->get();

            $dates= $this->getAvailableDays($days->unique('id'));

            return response()->json($dates, 200);
    }
    //TODO : return available days for trip
    public function getAvailableDays($days  , int $appointment_for=30) : array
    {   $dates=[];
        // Get the now date
        $now = Carbon::now();
        $fromDate = new Carbon($now->toDateString());
        // add clinic's days
        $toDate = new Carbon($now->addDays($appointment_for)->toDateString());

        foreach ($days as  $day) {
            // Get the first day in the date range
            $date = $fromDate->dayOfWeek == $day->code
            ? $fromDate
            : $fromDate->copy()->modify('next  '. $day->name);
            // Iterate until you have reached the end date adding a week each time | carbon (lt) function to compare  btween dates
            while ($date->lt($toDate)) {
                // check day is canceled or not
                $dates[] = $date->format('j-n-Y');
                $date->addWeek();
            }

        }
        return (array)$dates??"";

    }
    public function dashboard(Request $request)
    {

        $tickets=Ticket::with(['trip','seatType','trip.fromAirport','trip.toAirport','trip.plane.airline'])
        ->withcount(['passengers'])
        ->paginate(10);
        // $tickets=Ticket::where('status',0)->get();
        // $tickets=Ticket::all();
        // dd($tickets);
        return view('dashboard.index',compact('tickets'));
    }

}
