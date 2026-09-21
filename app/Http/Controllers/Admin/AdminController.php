<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // for displaying dashboard information
    public function dashboardInformation()
    {
        $totalPatients = User::where('role', 'Patient')->count();

        $totalDoctors = User::where('role', 'Doctor')->count();

        $totalAppointments = Appointment::count();

        $data = Appointment::orderBy('created_at', 'desc')->get();

        return response()->json([
            'totalPatients' => $totalPatients,
            'totalDoctors' => $totalDoctors,
            'totalAppointments' => $totalAppointments,
            'data' => $data
        ]);
    }

    // for cancel appointment
    public function cancelAppointment(Appointment $appointment)
    {
        $appointment->update([
            'status' => 'cancelled'
        ]);

        return response()->json([
            'message' => 'Appointment cancelled successfully',
            'data' => $appointment
        ]);
    }

    // for delete appointment
    public function destroyAppointment(Appointment $appointment)
    {
        $appointment->delete();

        return response()->json([
            'message' => 'Appointment deleted successfully'
        ]);
    }

    // for fetch dropdown data
    public function create()
    {
        $patients = User::where('role', 'Patient')->get();
        $doctors = User::where('role', 'Doctor')->get();

        return response()->json([
            'patients' => $patients,
            'doctors' => $doctors
        ]);
    }

    // for create appointment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient' => 'required',
            'doctor' => 'required',
            'appointment_date' => 'required',
            'appointment_time' => 'required'
        ]);

        $appointment = Appointment::create($validated);

        return response()->json([
            'message' => 'Appointment created successfully',
            'appointment' => $appointment
        ]);
    }

    // for displaying users
    public function users()
    {
        $users = User::whereIn('role', ['Patient', 'Doctor'])
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($users);    
    }

    // for logout
    public function logout(Request $request)
    {
        $user = $request->user();

        $user->tokens()->delete();

        return response()->json(['message' => 'Logout successfully'], 200);
    }
}
