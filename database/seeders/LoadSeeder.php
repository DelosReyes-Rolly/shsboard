<?php

namespace Database\Seeders;

use App\Models\Loads;
use Illuminate\Database\Seeder;

class LoadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Loads::create([
            'master_load' => '6',
            'regular_load' => '5',
        ]);
    }
}
