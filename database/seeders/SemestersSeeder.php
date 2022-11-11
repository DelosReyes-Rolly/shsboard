<?php

namespace Database\Seeders;

use App\Models\Semesters;
use Illuminate\Database\Seeder;

class SemestersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semesters::create([
            'sem' => 'First',
        ]);
        Semesters::create([
            'sem' => 'Second',
        ]);
    }
}
