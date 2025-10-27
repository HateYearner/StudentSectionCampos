<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Section;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = Section::all();
        
        if ($sections->isEmpty()) {
            $this->command->info('No sections found. Please run SectionSeeder first.');
            return;
        }

        $students = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'student_id' => 'STU001',
                'date_of_birth' => '2000-05-15',
                'phone' => '555-0101',
                'section_id' => $sections->first()->id,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'student_id' => 'STU002',
                'date_of_birth' => '2001-03-22',
                'phone' => '555-0102',
                'section_id' => $sections->first()->id,
            ],
            [
                'first_name' => 'Mike',
                'last_name' => 'Johnson',
                'email' => 'mike.johnson@example.com',
                'student_id' => 'STU003',
                'date_of_birth' => '1999-11-08',
                'phone' => '555-0103',
                'section_id' => $sections->skip(1)->first()->id,
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Wilson',
                'email' => 'sarah.wilson@example.com',
                'student_id' => 'STU004',
                'date_of_birth' => '2000-07-14',
                'phone' => '555-0104',
                'section_id' => $sections->skip(1)->first()->id,
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Brown',
                'email' => 'david.brown@example.com',
                'student_id' => 'STU005',
                'date_of_birth' => '2001-01-30',
                'phone' => '555-0105',
                'section_id' => $sections->skip(2)->first()->id,
            ],
        ];

        foreach ($students as $student) {
            Student::create($student);
        }
    }
}
