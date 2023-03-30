<?php

namespace App\Models;

use App\Models\Trip;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Airport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'deleted_at' => 'timestamp',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
