<?php

namespace Database\Seeders;

use App\Models\GradeLevels;
use Illuminate\Database\Seeder;

class GradeLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeLevels::create([
            'gradelevel' => '11',
        ]);
        GradeLevels::create([
            'gradelevel' => '12',
        ]);
    }
}
