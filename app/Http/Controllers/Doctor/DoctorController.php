<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    // for displaying dashboard information
    public function dashboardInfomation()
    {
        return response()->json([
            'appointments' => Appointment::latest()->get()
        ]);
    }
}
