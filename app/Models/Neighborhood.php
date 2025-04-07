<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function requestsAsOrigin()
    {
        return $this->hasMany(RequestSoli::class, 'origin', 'id');
    }

    public function requestsAsDestination()
    {
        return $this->hasMany(RequestSoli::class, 'destination', 'id');
    }
}
