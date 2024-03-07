<?php

use App\Http\Controllers\API\AuthUserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\HealthcareProfessionalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//User Registration
Route::post('register', [AuthUserController::class, 'register'])->name('register');

//User Login
Route::post('login', [AuthUserController::class, 'login'])->name('login');

Route::post('logout', [AuthUserController::class, 'logout'])->name('logout');


//Route::middleware('auth:api')->group(function () {

    Route::get('/healthcare-professionals', [HealthcareProfessionalController::class, 'index']);

    Route::post('book-appointment', [AppointmentController::class, 'bookAppointment']);

    Route::get('user-appointments', [AppointmentsController::class, 'getUserAppointments']);
    
    Route::post('complete-appointment', [AppointmentsController::class, 'completeAppointment']);

    Route::delete('cancle-appointment/{appointment}', [AppointmentsController::class, 'cancleAppointment']);

//});