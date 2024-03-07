<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'healthcare_professional_id',
        'appointment_start_time',
        'appointment_end_time',
        'status'
    ];

    /**
     * Get Data of Users
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get Data of healthcare professionals
     */
    public function healthcareProfessional()
    {
        return $this->belongsTo(HealthcareProfessional::class);
    }
}
