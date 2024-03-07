<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function bookAppointment(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'appointment_id' => 'required|exists:appointments,id',
                'status' => 'required',
                'appointment_date' => 'required|date|after:today',
                'appointment_start_time' => 'required|date_format:H:i',
                'appointment_end_time' => 'required|date_format:H:i|after:appointment_start_time',
            ]);
    
            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }

            $appointmentDate = Carbon::createFromFormat('d/m/Y', $request->appointment_date)->format('Y-m-d');

            $startTime = Carbon::createFromFormat('H:i',$request->start_time)->format('H:i');

            $endTime = Carbon::createFromFormat('H:i',$request->end_time)->format('H:i');

            //Check where appointment is availble or not
            $appointments = Appointment::where([
                'healthcare_professional_id' => $request->healthcare_professional_id,
                'appointment_date' => $appointmentDate,
                'status' => 'booked'
                ])->where(function ($query) use ($startTime, $endTime) {
                    $query->where('appointment_start_time', '>=', $startTime)
                        ->where('appointment_start_time', '<', $endTime)
                        ->orWhere('appointment_end_time', '>', $startTime)
                        ->where('appointment_end_time', '<=', $endTime);
                })->get();

            if(isset($appointments) && sizeof($appointments) > 0) {
                
                return response()->json(array('success' => false, 'message' => 'Sorry, Appointment is already booked'));

            } else {

                $appointment = new Appointment();
                $appointment->user_id = $request->user_id;
                $appointment->healthcare_professional_id = $request->healthcare_professional_id;
                $appointment->appointment_date = $appointmentDate;
                $appointment->appointment_start_time = $startTime;
                $appointment->appointment_end_time = $endTime;
                $appointment->status = "booked";
                $appointment->save();

                return response()->json(array('success' => true, 'message' => 'Thank you. Your appointment has been booked'));
            }

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }
}
