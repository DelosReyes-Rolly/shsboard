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
        ]);
        Documents::create([
            'name' => 'Certification of Enrolment For 4Ps',
        ]);
        Documents::create([
            'name' => 'Certificate of Good Moral',
        ]);
        Documents::create([
            'name' => 'Form 137',
        ]);
        Documents::create([
            'name' => 'Transfer-out Form',
        ]);
    }
}
