<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Admins::factory(1)->create();
        // \App\Models\Students::factory(100)->create();
        \App\Models\Addresses::factory(30)->create();
        $this->call(CoursesSeeder::class);
        $this->call(LandingsSeeder::class);
        $this->call(GradeLevelsSeeder::class);
        $this->call(SemestersSeeder::class);
        $this->call(SubjectsSeeder::class);
        $this->call(DocumentsSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(TeachersSeeder::class);
        $this->call(SchoolyearSeeder::class);
        $this->call(AnnouncementSeeder::class);
        // $this->call(AddressesSeeder::class);
    }
}
