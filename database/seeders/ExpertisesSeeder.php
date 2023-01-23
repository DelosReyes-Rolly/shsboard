<?php

namespace Database\Seeders;

use App\Models\Expertises;
use Illuminate\Database\Seeder;

class ExpertisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Expertises::create([
            'expertise' => 'General',
        ]);
        Expertises::create([
            'expertise' => 'Mathematics',
        ]);
        Expertises::create([
            'expertise' => 'English',
        ]);
        Expertises::create([
            'expertise' => 'Filipino',
        ]);
        Expertises::create([
            'expertise' => 'Science',
        ]);
        Expertises::create([
            'expertise' => 'History',
        ]);
    }
}
