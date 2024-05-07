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
            'name_dept' => 'Academic and Educational Support Service (BAAK)',
        ]);
        Department::create([
            'name_dept' => 'Engagement and Enrollment',
        ]);
        Department::create([
            'name_dept' => 'Examination',
        ]);
        Department::create([
            'name_dept' => 'Finance',
        ]);
        Department::create([
            'name_dept' => 'Laboratory',
        ]);
        Department::create([
            'name_dept' => 'Library & Recource Center',
        ]);
        Department::create([
            'name_dept' => 'Student Center Alumni & Community service',
        ]);
    }
}
