<?php

namespace Database\Seeders;


use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'name' => 'Academic and Educational Support Service (BAAK)',
        ]);
        Department::create([
            'name' => 'Engagement and Enrollment',
        ]);
        Department::create([
            'name' => 'Examination',
        ]);
        Department::create([
            'name' => 'Finance',
        ]);
        Department::create([
            'name' => 'Laboratory',
        ]);
        Department::create([
            'name' => 'Library & Recource Center',
        ]);
        Department::create([
            'name' => 'Student Center Alumni & Community service',
        ]);
    }
}
