<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'deleted_at' => 'timestamp',
    ];

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

    public function fromAirport()
    {
        return $this->belongsTo(Airport::class);
    }

    public function toAirport()
    {
        return $this->belongsTo(Airport::class);
    }
}
