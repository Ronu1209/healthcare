<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentsController extends Controller
{
    public function getUserAppointments(Request $request) {

        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:appointments,user_id',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }

            //Get List of all available health care professionals
            $appointments = Appointment::where('user_id', $request->user_id)->get();
            return response()->json(['appointments' => $appointments]);

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }

    public function completeAppointment(Request $request) {

        try {

            $appointmentDate = \DateTime::createFromFormat('d/m/Y', $request->appointment_date)->format('Y-m-d');

            $validator = Validator::make(['appointment_date' => $appointmentDate], [
                'appointment_date' => 'date|before_or_equal:today',
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }

            // Update status for appointment
            Appointment::where('id', $request->appointment_id)->update(['status' => $request->status]);

            return response()->json(array('success' => true, 'message' => 'Status has been updated for the appointment'));

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }

    }

    /**
     * Cancle an Appointment
     * params : appointment_id
     */
    public function cancleAppointment(Request $request, $id) {
        
        try {

            $appointment = Appointment::findOrFail($id);
            
            // Check if the appointment is within 24 hours
            $now = Carbon::now();
            $appointment_start_time = Carbon::parse($appointment->appointment_start_time);
            $diffInHours = $now->diffInHours($appointment_start_time);

            if ($diffInHours < 24) {
                return response()->json(['error' => 'Appointment cannot be canceled within 24 hours of the appointment time'], 400);
            }

            // Cancel the appointment
            $appointment->status = 'canceled';
            $appointment->save();

            return response()->json(['message' => 'Appointment canceled successfully'], 200);
            
        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }
}
