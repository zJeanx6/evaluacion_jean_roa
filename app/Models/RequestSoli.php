<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSoli extends Model
{
    public $timestamps = false; 
    protected $table = 'requests';
    protected $fillable = [
        'date',
        'passenger_id', 
        'driver_id', 
        'origin', 
        'destination', 
        'state_id'
    ];

    // Relaciones
    public function passenger()
    {
        return $this->belongsTo(User::class, 'passenger_id', 'uid'); 
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id', 'uid');
    }

    public function NeighborhoodOrigin()
    {
        return $this->belongsTo(Neighborhood::class, 'origin');
    }

    public function NeighborhoodDestination()
    {
        return $this->belongsTo(Neighborhood::class, 'destination');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
    
}