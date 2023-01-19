<?php

namespace Database\Seeders;

use App\Models\Specialties;
use Illuminate\Database\Seeder;

class SpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Specialties::create([
            'specialty' => 'General',
        ]);
        Specialties::create([
            'specialty' => 'Mathematics',
        ]);
        Specialties::create([
            'specialty' => 'English',
        ]);
        Specialties::create([
            'specialty' => 'Filipino',
        ]);
        Specialties::create([
            'specialty' => 'Science',
        ]);
        Specialties::create([
            'specialty' => 'History',
        ]);
    }
}
