<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Patient;
use Database\Factories\DoctorFactory;

class DoctorPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Doctor::factory()->count(3)->create()->each(function ($doctor) {
            $doctor->patients()->createMany(Patient::factory()->count(3)->make()->toArray());
        });
    }
}
