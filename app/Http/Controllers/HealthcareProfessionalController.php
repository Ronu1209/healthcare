<?php

namespace App\Http\Controllers;

use App\Models\HealthcareProfessional;
use Illuminate\Http\Request;

class HealthcareProfessionalController extends Controller
{
    public function index()
    {
        try {

            //Get List of all available health care professionals
            $healthcarePrefessionals = HealthcareProfessional::all();
            return response()->json(['healthcarePrefessionals' => $healthcarePrefessionals]);

        } catch ( \Exception $e ) {
            return response()->json(['error'=>$e->getMessage()], 500);
        }
    }
}
