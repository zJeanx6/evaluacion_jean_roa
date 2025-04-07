<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'uid'; // Laravel por defecto usa 'id'
    public $incrementing = false; // Si el uid se genera manualmente

    protected $fillable = [
        'uid',
        'name',
        'last_name',
        'email',
        'password',
        'role_id',
    ];

    public function requestsAsPassenger()
    {
        return $this->hasMany(RequestSoli::class, 'passenger_id', 'uid');
    }

    public function requestsAsDriver()
    {
        return $this->hasMany(RequestSoli::class, 'driver_id', 'uid');
    }

    public function role()
    {
        return $this->belongsTo(UserType::class, 'role_id', 'id');
    }
}
