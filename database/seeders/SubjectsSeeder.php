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
            'subjectcode' => 'A&STS1',
            'subjectname' => 'Contact Center Services',
            'description' => 'CCS',
            'expertise_id' => '1',
        ]);
        Subjects::create([
            'subjectcode' => 'AE',
            'subjectname' => 'Applied Economics',
            'description' => 'App-Eco',
            'expertise_id' => '2',
        ]);
        Subjects::create([
            'subjectcode' => 'GE1',
            'subjectname' => 'General Chemistry 1',
            'description' => 'Gen Chem 1',
            'expertise_id' => '3',
        ]);
        Subjects::create([
            'subjectcode' => 'GE2',
            'subjectname' => 'General Chemistry 2',
            'description' => 'Gen Chem 2',
            'expertise_id' => '4',
        ]);
        Subjects::create([
            'subjectcode' => 'GB1',
            'subjectname' => 'General Biology 1',
            'description' => 'Gen Bio 1',
            'expertise_id' => '5',
        ]);
        Subjects::create([
            'subjectcode' => 'GB2',
            'subjectname' => 'General Biology 2',
            'description' => 'Gen Bio 2',
            'expertise_id' => '6',
        ]);
        Subjects::create([
            'subjectcode' => 'GP1',
            'subjectname' => 'General Physics 1',
            'description' => 'Gen Physics 1',
            'expertise_id' => '1',
        ]);
        Subjects::create([
            'subjectcode' => 'GP2',
            'subjectname' => 'General Physics 2',
            'description' => 'Gen Physics 2',
            'expertise_id' => '2',
        ]);
        Subjects::create([
            'subjectcode' => 'PR1',
            'subjectname' => 'Practical Research 1',
            'description' => 'Prac Research 1',
            'expertise_id' => '3',
        ]);
        Subjects::create([
            'subjectcode' => 'PR2',
            'subjectname' => 'Practical Research 2',
            'description' => 'Prac Research 2',
            'expertise_id' => '4',
        ]);
        Subjects::create([
            'subjectcode' => 'III',
            'subjectname' => 'Inquiries, Investigation, and Immersion',
            'description' => 'Immersion',
            'expertise_id' => '5',
        ]);
        Subjects::create([
            'subjectcode' => 'CG',
            'subjectname' => 'Caregiving',
            'description' => 'Caregiving',
            'expertise_id' => '6',
        ]);
        Subjects::create([
            'subjectcode' => 'FPL',
            'subjectname' => 'Filipino sa Piling Larang',
            'description' => 'Filipino',
            'expertise_id' => '1',
        ]);
        Subjects::create([
            'subjectcode' => 'MIL',
            'subjectname' => 'Media and Information Literacy',
            'description' => 'MIL',
            'expertise_id' => '2',
        ]);
        Subjects::create([
            'subjectcode' => '21st CLPW',
            'subjectname' => '21st Century Literature from the Philippines and  the World',
            'description' => '21st Century',
            'expertise_id' => '3',
        ]);
        Subjects::create([
            'subjectcode' => 'ELS',
            'subjectname' => 'Earth and Life Sciences',
            'description' => 'EL Science',
            'expertise_id' => '4',
        ]);
        Subjects::create([
            'subjectcode' => 'Gen Math',
            'subjectname' => 'General Mathematics',
            'description' => 'Gen Math',
            'expertise_id' => '5',
        ]);
        Subjects::create([
            'subjectcode' => 'Pre Cal',
            'subjectname' => 'Pre Calculus',
            'description' => 'Pre Cal',
            'expertise_id' => '6',
        ]);
        Subjects::create([
            'subjectcode' => 'EAPP',
            'subjectname' => 'English for Academic and professional Purposes',
            'description' => 'EAPP',
            'expertise_id' => '1',
        ]);
        Subjects::create([
            'subjectcode' => 'UCSP',
            'subjectname' => 'Understanding Culture, Society, and Politics',
            'description' => 'UCSP',
            'expertise_id' => '2',
        ]);
        Subjects::create([
            'subjectcode' => 'DISS',
            'subjectname' => 'Disciplines and Ideas in the Social Sciences',
            'description' => 'DISS',
            'expertise_id' => '3',
        ]);
        Subjects::create([
            'subjectcode' => 'BF',
            'subjectname' => 'Business Finance',
            'description' => 'BF',
            'expertise_id' => '4',
        ]);
        Subjects::create([
            'subjectcode' => 'BESR',
            'subjectname' => 'Business Ethics and Social Responsibility',
            'description' => 'BESR',
            'expertise_id' => '5',
        ]);
        Subjects::create([
            'subjectcode' => 'FABM 1',
            'subjectname' => 'Fundamentals of Accountancy, Business, and Management 1',
            'description' => 'FABM 1',
            'expertise_id' => '6',
        ]);
        Subjects::create([
            'subjectcode' => 'FABM 2',
            'subjectname' => 'Fundamentals of Accountancy, Business, and Management 2',
            'description' => 'FABM 2',
            'expertise_id' => '1',
        ]);
        Subjects::create([
            'subjectcode' => 'Org and Mngt',
            'subjectname' => 'Organization and Management',
            'description' => 'Org and Mngt',
            'expertise_id' => '2',
        ]);
        Subjects::create([
            'subjectcode' => 'BM',
            'subjectname' => 'Business Math',
            'description' => 'BM',
            'expertise_id' => '3',
        ]);
        Subjects::create([
            'subjectcode' => 'PM',
            'subjectname' => 'Principles of Marketing',
            'description' => 'PM',
            'expertise_id' => '4',
        ]);
        Subjects::create([
            'subjectcode' => 'KOM',
            'subjectname' => 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino',
            'description' => 'KOM',
            'expertise_id' => '5',
        ]);
        Subjects::create([
            'subjectcode' => 'CPAR',
            'subjectname' => 'Contemporary Philippines Arts from the Regions',
            'description' => 'CPAR',
            'expertise_id' => '6',
        ]);
        Subjects::create([
            'subjectcode' => 'Stat',
            'subjectname' => 'Statistics and Probability',
            'description' => 'Stat',
            'expertise_id' => '1',
        ]);
        Subjects::create([
            'subjectcode' => 'Philo',
            'subjectname' => 'Introduction to Philosophy of the Human Person',
            'description' => 'Philo',
            'expertise_id' => '2',
        ]);
        Subjects::create([
            'subjectcode' => 'PE',
            'subjectname' => 'Physical Education and Health',
            'description' => 'PE',
            'expertise_id' => '3',
        ]);
        Subjects::create([
            'subjectcode' => 'Oral Com',
            'subjectname' => 'Oral Communication',
            'description' => 'Oral Comm',
            'expertise_id' => '4',
        ]);
        Subjects::create([
            'subjectcode' => 'RW',
            'subjectname' => 'Reading and Writting',
            'description' => 'RW',
            'expertise_id' => '5',
        ]);
        Subjects::create([
            'subjectcode' => 'Entrep',
            'subjectname' => 'Entrepreneurship',
            'description' => 'Entrep',
            'expertise_id' => '6',
        ]);
        Subjects::create([
            'subjectcode' => 'Emp Tech',
            'subjectname' => 'Empowerment Technologies',
            'description' => 'Emp Tech',
            'expertise_id' => '1',
        ]);
        Subjects::create([
            'subjectcode' => 'Pagbasa',
            'subjectname' => 'Pagbasa at Pagsusuri ng Ibat-ibang Teksto Tungo sa Pananaliksik',
            'description' => 'Pagbasa',
            'expertise_id' => '2',
        ]);
        Subjects::create([
            'subjectcode' => 'PhySci',
            'subjectname' => 'Physical Science',
            'description' => 'PhySci',
            'expertise_id' => '3',
        ]);
        Subjects::create([
            'subjectcode' => 'Per Dev',
            'subjectname' => 'Personal Development',
            'description' => 'Per Dev',
            'expertise_id' => '4',
        ]);
        Subjects::create([
            'subjectcode' => 'DRRR',
            'subjectname' => 'Disaster Readiness and Risk Reduction',
            'description' => 'DRRR',
            'expertise_id' => '5',
        ]);
        Subjects::create([
            'subjectcode' => 'Creative',
            'subjectname' => 'Creative Non-Fiction',
            'description' => 'Creative',
            'expertise_id' => '6',
        ]);
        Subjects::create([
            'subjectcode' => 'TNCT 21st Century',
            'subjectname' => 'Trends, Networks, and Critical Thinking in the 21st Century',
            'description' => 'TNCT 21st Century',
            'expertise_id' => '1',
        ]);
        Subjects::create([
            'subjectcode' => 'Pol Gov',
            'subjectname' => 'Philippine Politics and Governance',
            'description' => 'Pol Gov',
            'expertise_id' => '2',
        ]);
        Subjects::create([
            'subjectcode' => 'CESC',
            'subjectname' => 'Community Engagement, Solidarity, and Citezenship',
            'description' => 'CESC',
            'expertise_id' => '3',
        ]);
        Subjects::create([
            'subjectcode' => 'DIASS',
            'subjectname' => 'Discipline and Ideas in the Applied Social Science',
            'description' => '',
            'expertise_id' => '4',
        ]);
    }
}
