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
            'purpose' => 'Scholastic purposes',
            'proof_needed' => 'list of requirements from city hall',
        ]);
        DocumentPurposes::create([
            'purpose' => 'DFA Red Ribbon copy',
            'proof_needed' => 'list of requirements from DFA',
        ]);
        DocumentPurposes::create([
            'purpose' => 'Correction of name',
            'proof_needed' => 'list of requirements from city hall',
        ]);
        DocumentPurposes::create([
            'purpose' => 'Job reference',
            'proof_needed' => 'list of requirements from the company',
        ]);
    }
}
