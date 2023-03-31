<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ticket_id',
        'name',
        'last_name',
        'gender',
        'nationality',
        'birth_date',
        'mobile_number',
        'email',
        'passport_number',
        'passport_expiry_date',
        'passport_photo',
        'visa_photo'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ticket_id' => 'integer',
        'birth_date' => 'date',
        'passport_expiry_date' => 'date',
        'deleted_at' => 'timestamp',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
