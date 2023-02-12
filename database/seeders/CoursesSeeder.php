<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courses::create([
            'courseName' => 'Accountancy, Business and Management',
            'abbreviation' => 'ABM',
            'description' => '<p>The Accountancy, Business and Management (ABM) strand would focus on the basic concepts of financial management, business management, corporate operations, and all things that are accounted for. ABM can also lead you to careers on management and accounting which could be sales manager, human resources, marketing director, project officer, bookkeeper, accounting clerk, internal auditor, and a lot more.</p>',
            'code' => 'SVNHS-SHS_ABM',
            'image' => 'LOGO ABM.png',
            'link' => 'https://www.youtube.com/embed/78V9v4acSZU?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO',
        ]);
        Courses::create([
            'courseName' => 'Science, Technology, Engineering, and Mathematics',
            'abbreviation' => 'STEM',
            'description' => '<p>Science, technology, engineering, and mathematics is a broad term used to group together these academic disciplines. This term is typically used to address an education policy or curriculum choices in schools. It has implications for workforce development, national security concerns and immigration policy.</p>',
            'code' => 'SVNHS-SHS_STEM',
            'image' => 'LOGO STEM.png',
            'link' => 'https://www.youtube.com/embed/2dM62LWVbxY?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO',
        ]);
        Courses::create([
            'courseName' => 'Humanities and Social Sciences',
            'abbreviation' => 'HUMSS',
            'description' => '<p>The HUMSS strand in senior high school is designed to effectively prepare students who seek to pursue a college degree in liberal education. HUMSS courses cover a variety of subjects, looking at the world and its people from various points of view. The learning activities are directed towards the development of critical thinking.</p>',
            'code' => 'SVNHS-SHS_HUMSS',
            'image' => 'LOGO HUMSS.png',
            'link' => 'https://www.youtube.com/embed/z5rKAMAP1Rg?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO',
        ]);
        Courses::create([
            'courseName' => 'General Academic Track',
            'abbreviation' => 'GAS',
            'description' => '<p>While the other strands are career-specific, the General Academic Strand is great for students who are still undecided on which track to take. You can choose electives from the different academic strands under this track. These subjects include Humanities, Social Sciences, Applied Economics, Organization and Management, and Disaster Preparedness.</p>',
            'code' => 'SVNHS-SHS_GAS',
            'image' => 'shs.png',
            'link' => 'https://www.youtube.com/embed/l4R90mZRSf4?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO',
        ]);
        Courses::create([
            'courseName' => 'Home Economics',
            'abbreviation' => 'HE',
            'description' => '<p>Home economics, or family and consumer sciences, is a subject concerning human development, personal and family finance, housing and interior design, food science and preparation, nutrition and wellness, textiles and apparel, and consumer issues.</p>',
            'code' => 'SVNHS-SHS_HE',
            'image' => 'LOGO HE.jpg',
            'link' => 'https://www.youtube.com/embed/1zWNUF-M5js?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO',
        ]);
        Courses::create([
            'courseName' => 'Information Communication and Technology',
            'abbreviation' => 'ICT',
            'description' => '<p>ICT, or information and communications technology (or technologies), is the infrastructure and components that enable modern computing.</p>',
            'code' => 'SVNHS-SHS_ICT',
            'image' => 'LOGO ICT.png',
            'link' => 'https://www.youtube.com/embed/vHu5Xr_FXtA?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO',
        ]);
        Courses::create([
            'courseName' => 'Nursing Arts',
            'abbreviation' => 'Caregiving',
            'description' => '<p>The art of nursing refers to the highly valued qualities of care, compassion, and communication&mdash;three core principles guiding nursing practice. These principles encompass all aspects of patient care, including biopsychosocial needs, cultural preferences, and spiritual needs.</p>',
            'code' => 'SVNHS-SHS_NA',
            'image' => 'LOGO NURSING ARTS.png',
            'link' => 'https://www.youtube.com/embed/y9OzfvRtZgM?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO',
        ]);
        Courses::create([
            'courseName' => 'Electrical Installation, and Maintenance',
            'abbreviation' => 'EIM',
            'description' => '<p>What is electrical installation and maintenance? Electrical installations means the installation, repair, alteration and maintenance of electrical conductors, fittings, devices and fixtures for heating, lighting or power purposes, regardless of the voltage.</p>',
            'code' => 'SVNHS-SHS_EIM',
            'image' => 'LOGO EIM.png',
            'link' => 'https://www.youtube.com/embed/e-_l-CbYSyk?list=PLAEIBqnx-wqUgyb6Ztdzo05MafyK937KO',
        ]);
    }
}
