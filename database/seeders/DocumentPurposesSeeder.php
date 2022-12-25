<?php

namespace Database\Seeders;

use App\Models\DocumentPurposes;
use Illuminate\Database\Seeder;

class DocumentPurposesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentPurposes::create([
            'purpose' => 'sample purpose 1',
        ]);
        DocumentPurposes::create([
            'purpose' => 'sample purpose 2',
        ]);
        DocumentPurposes::create([
            'purpose' => 'sample purpose 3',
        ]);
        DocumentPurposes::create([
            'purpose' => 'sample purpose 4',
        ]);
        DocumentPurposes::create([
            'purpose' => 'sample purpose 5',
        ]);
        DocumentPurposes::create([
            'purpose' => 'sample purpose 6',
        ]);
    }
}
