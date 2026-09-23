<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient',
        'doctor',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor');
    }
}
