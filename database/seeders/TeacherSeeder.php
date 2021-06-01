<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Teacher::factory(10)
          ->has(\App\Models\Student::factory()->count(8))
          ->create();

    }
}
