<?php

namespace App\Models;

use App\Models\Trip;
use App\Models\Airline;
use App\Models\SeatType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plane extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'photo',
        'airline_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'airline_id' => 'integer',
        'deleted_at' => 'timestamp',
    ];

    public function seatTypes()
    {
        return $this->belongsToMany(SeatType::class);
    }

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function airline()
    {
        return $this->belongsTo(Airline::class);
    }
}
