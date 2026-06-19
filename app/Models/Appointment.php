<?php

namespace App\Models;

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
}
