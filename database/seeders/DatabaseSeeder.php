<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        // Student::factory(15)->create();
        Guardian::factory(15)->create();
        Classroom::factory(4)
        ->hasStudents(5)
        ->create();
        Teacher::factory(5)
        ->hasSubject(1)
        ->create();
        Subject::factory(5)
        ->hasTeachers(1)
        ->create();

        $this->call(UserSeeder::class);
        
   
    }
}
