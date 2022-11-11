<?php

namespace Database\Seeders;

use App\Models\Subjects;
use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subjects::create([
            'subjectcode' => 'CS2',
            'subjectname' => 'Oral Communication in Context',
            'description' => 'Oral Com',
        ]);
        Subjects::create([
            'subjectcode' => 'CS4',
            'subjectname' => 'General Mathematics',
            'description' => 'GenMath',
        ]);
        Subjects::create([
            'subjectcode' => 'A&STS2',
            'subjectname' => 'Contact Center Services',
            'description' => 'CCS',
        ]);
        Subjects::create([
            'subjectcode' => 'CS12',
            'subjectname' => 'Media Information Literacy',
            'description' => 'MIL',
        ]);
        Subjects::create([
            'subjectcode' => 'A&STS4',
            'subjectname' => 'Practical Research 2',
            'description' => 'PR2',
        ]);
        Subjects::create([
            'subjectcode' => 'A&STS8',
            'subjectname' => 'Pre-Calculus',
            'description' => 'Pre-Cal',
        ]);
    }
}
