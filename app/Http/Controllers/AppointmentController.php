<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function book(Request $request)
    {
        // Logic to book an appointment
    }

    public function view(Request $request, $id)
    {
        // Logic to view an appointment
    }

    public function cancel(Request $request, $id)
    {
        // Logic to cancel an appointment
    }

    public function complete(Request $request, $id)
    {
        // Logic to mark an appointment as completed
    }
}
