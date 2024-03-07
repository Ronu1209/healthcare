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
                'appointment_date' => '2024-03-10',
                'appointment_start_time' => '15:00',
                'appointment_end_time' => '16:00',
                'status' => 'booked'
            ],
            [
                'user_id' => 1,
                'healthcare_professional_id' => 2,
                'appointment_date' => '2024-03-15',
                'appointment_start_time' => '07:00',
                'appointment_end_time' => '07:30',
                'status' => 'booked'
            ],
            [
                'user_id' => 2,
                'healthcare_professional_id' => 1,
                'appointment_date' => '2024-03-12',
                'appointment_start_time' => '10:00',
                'appointment_end_time' => '11:00',
                'status' => 'booked'
            ],
            [
                'user_id' => 2,
                'healthcare_professional_id' => 2,
                'appointment_date' => '2024-02-02',
                'appointment_start_time' => '8:00',
                'appointment_end_time' => '8:45',
                'status' => 'cancelled'
            ],

        ]);
    }
}
