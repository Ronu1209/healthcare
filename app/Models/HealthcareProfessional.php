<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthcareProfessional extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'speciality',
    ];

    /**
     * Get appointments list of the healthcare professionals
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
