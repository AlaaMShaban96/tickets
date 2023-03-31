<?php

namespace App\Models;

use App\Models\SeatType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trip_id',
        'type',
        'journey_date',
        'adults_number',
        'children_number',
        'status',
        'seat_type_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trip_id' => 'integer',
        'seat_type_id' => 'integer',
        'deleted_at' => 'timestamp',
    ];

    public function passengers()
    {
        return $this->hasMany(Passenger::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
    public function seatType()
    {
        return $this->belongsTo(SeatType::class);
    }

}
