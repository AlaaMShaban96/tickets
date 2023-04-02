<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Day;
use App\Models\Plane;
use App\Models\Ticket;
use App\Models\Airport;
use App\Models\Booking;
use App\Models\SeatType;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Trip extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'plane_id',
        'from_airport_id',
        'to_airport_id',
        'take_off_at',
        'landing_at',
        'adults_price',
        'children_price',
        'need_visa',
        'tax',
        'check_in',
        'poilcy'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'plane_id' => 'integer',
        'from_airport_id' => 'integer',
        'to_airport_id' => 'integer',
        'adults_price' => 'double',
        'children_price' => 'double',
        'need_visa' => 'boolean',
        // 'landing_at' => 'date',
        // 'take_off_at' => 'date',
        'deleted_at' => 'timestamp',
    ];
    protected $appends = ['diff_date_for_humans'];
    public function days()
    {
        return $this->belongsToMany(Day::class);
    }

    public function seatTypes()
    {
        return $this->belongsToMany(SeatType::class, 'seats');
    }

    public function ticket()
    {
        return $this->hasOne(Ticket::class);
    }

    public function plane()
    {
        return $this->belongsTo(Plane::class);
    }
    /**
     * Get all of the bookingd for the Trip
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookingd()
    {
        return $this->hasMany(Booking::class);
    }

    public function fromAirport()
    {
        return $this->belongsTo(Airport::class);
    }

    public function toAirport()
    {
        return $this->belongsTo(Airport::class);
    }
    public function getDiffDateForHumansAttribute()
    {
        $start_time = new Carbon($this->take_off_at);
        $end_time = new Carbon($this->landing_at);
        $interval = $start_time->diff($end_time);
        return $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
    }
}
