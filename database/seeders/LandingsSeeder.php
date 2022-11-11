<?php

namespace Database\Seeders;

use App\Models\Landings;
use Illuminate\Database\Seeder;

class LandingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Landings::create([
            'title' => 'About',
            'content' => '<p><strong>Signal Village National High School (SVNHS) is a public secondary school located in Signal Village, Taguig City. Established in 1976, the school was once called the Fort Bonifacio High School Signal Annex. By 1995, it was converted into an independent school through Republic Act 8039.</strong></p>

            <p>&nbsp;</p>
            
            <p>At present, SVNHS is a certified K-12-ready institution, offering Junior High as well as Senior High School (SHS) programs recognized by the Department of Education (DepEd). Students who intend to pursue their SHS education in this institution may school from strands under the Academic and Technical-Vocational-Livelihood (TVL) tracks.<br />
            &nbsp;</p>
            ',
            'image' => 'svnhs-about.jpg',
        ]);
        Landings::create([
            'title' => 'Principal Message',
            'content' => '<p>&quot;We are all very excited about the 2021-22 school year, where classrooms once again will be full with activities and ideas that challenge and inspire our students. Our amazing teachers work hard to create an exceptional learning environment for our students. As a result, our school has been recognized at the state and national levels as being an example of not just excellent teaching, learning, but also high levels of student achievement and growth, and exemplary arts education programs. This year, we continue our journey as a Leader in Me School. &quot;</p>
            ',
            'image' => 'principal.jpg',
        ]);
        Landings::create([
            'title' => 'The DEPED VISION',
            'content' => '<p>We dream of Filipinos who passionately love their and whose values and competencies enable them to realize their full potential and contribute meaningfully to building the nation.&nbsp;</p>

            <p>As a learner-centered public insttution, the Department of Education, continuously improves itself to better serve its stakeholders.</p>',
        ]);
        Landings::create([
            'title' => 'The DEPED Mission',
            'content' => '<p>To protect and promote the right of every Filipino to quality, equitable, culture-based, and&nbsp;complete basic education where.</p>

            <p><strong>Students</strong> learn in a child-friendly, gender-sensitive, safe, and motivating environment.</p>
            
            <p><strong>Teachers</strong> facilitate learning and constantly nurture every learner.</p>
            
            <p><strong>Administrators and staff,</strong> as stewards of the institution, ensure an enabling and supportive</p>
            
            <p><strong>Family,community, and other stakeholders</strong> are eactively engaged and share responsibility for&nbsp;developing life-long learners.</p>',
        ]);
        Landings::create([
            'title' => 'CORE VALUES',
            'content' => '<p><strong>Maka-Diyos</strong></p>

            <p><strong>Maka-tao</strong></p>
            
            <p><strong>Makakalikasan</strong></p>
            
            <p><strong>Makabansa</strong></p>',
        ]);
        Landings::create([
            'title' => 'Strands Offered',
            'content' => '<p>High standards for instruction and learning; a warm, secure atmosphere; and participation from families and the community. The Signal Village National High School offers 4 Academic and 4 TVL Tracks. Academic track includes: Accountancy and Business Management (ABM), Humanities and Social Sciences (HUMSS), Science, Technology, Engineering and Mathematics (STEM), and General Academic Strand (GAS). TVL track includes: Home Economics (HE), Nursing Arts (Caregiving), Electrical Installation and Management (EIM), and Information and Communcation Technology (ICT). &nbsp;</p>',
        ]);
    }
}
