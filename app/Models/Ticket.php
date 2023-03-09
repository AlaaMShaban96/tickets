<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'adults_number',
        'children_number',
        'passport_photo',
        'visa_photo',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trip_id' => 'integer',
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
}
