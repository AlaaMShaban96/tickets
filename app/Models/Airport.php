<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'county_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'county_id' => 'integer',
        'deleted_at' => 'timestamp',
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
