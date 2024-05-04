<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departement::create([
            'name_dept' => 'Academic and Educational Support Service (BAAK)',
        ]);
        Departement::create([
            'name_dept' => 'Engagement and Enrollment',
        ]);
        Departement::create([
            'name_dept' => 'Examination',
        ]);
        Departement::create([
            'name_dept' => 'Finance',
        ]);
        Departement::create([
            'name_dept' => 'Laboratory',
        ]);
        Departement::create([
            'name_dept' => 'Library & Recource Center',
        ]);
        Departement::create([
            'name_dept' => 'Student Center Alumni & Community service',
        ]);
    }
}
