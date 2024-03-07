<?php

namespace Database\Seeders;

use App\Models\HealthcareProfessional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetupHealthcareProfessionalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HealthcareProfessional::insert([
            ['name' => 'Kevin', 'speciality' => 'Surgery'],
            ['name' => 'Aryan', 'speciality' => 'Radiology']
        ]);
    }
}
