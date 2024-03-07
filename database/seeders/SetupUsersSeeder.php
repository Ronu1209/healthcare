<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetupUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            ['name' => 'Aamir', 'email' => 'aamir001@maildrop.cc'],
            ['name' => 'Azad', 'email' => 'azad002@maildrop.cc']
        ]);
    }
}
