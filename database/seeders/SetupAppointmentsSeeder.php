<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetupAppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::insert([
            [
                'user_id' => 1,
                'healthcare_professional_id' => 1,
                'appointment_start_time' => '2024-03-10 15:00:00',
                'appointment_end_time' => '2024-03-10 16:00:00',
                'status' => 'booked'
            ],
            [
                'user_id' => 1,
                'healthcare_professional_id' => 2,
                'appointment_start_time' => '2024-03-15 07:00:00',
                'appointment_end_time' => '2024-03-15 07:30:00',
                'status' => 'booked'
            ],
            [
                'user_id' => 2,
                'healthcare_professional_id' => 1,
                'appointment_start_time' => '2024-03-12 10:00:00',
                'appointment_end_time' => '2024-03-12 11:00:00',
                'status' => 'booked'
            ]
        ]);
    }
}
