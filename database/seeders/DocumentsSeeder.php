<?php

namespace Database\Seeders;

use App\Models\Documents;
use Illuminate\Database\Seeder;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documents::create([
            'name' => 'Grade Cetificate',
            'proof_needed' => 'Proof 1',
        ]);
        Documents::create([
            'name' => 'Certification of Enrolment For 4Ps',
            'proof_needed' => 'Proof 2',
        ]);
        Documents::create([
            'name' => 'Certificate of Good Moral',
            'proof_needed' => 'Proof 3',
        ]);
        Documents::create([
            'name' => 'Form 137',
            'proof_needed' => 'Proof 4',
        ]);
        Documents::create([
            'name' => 'Transfer-out Form',
            'proof_needed' => 'Proof 5',
        ]);
    }
}
