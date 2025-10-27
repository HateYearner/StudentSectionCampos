<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'name' => 'Computer Science 101',
                'code' => 'CS101',
                'description' => 'Introduction to Computer Science',
                'capacity' => 30,
            ],
            [
                'name' => 'Mathematics 201',
                'code' => 'MATH201',
                'description' => 'Advanced Mathematics',
                'capacity' => 25,
            ],
            [
                'name' => 'Physics 301',
                'code' => 'PHYS301',
                'description' => 'Modern Physics',
                'capacity' => 20,
            ],
            [
                'name' => 'English Literature',
                'code' => 'ENG101',
                'description' => 'Introduction to English Literature',
                'capacity' => 35,
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
