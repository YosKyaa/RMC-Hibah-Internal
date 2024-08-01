<?php

namespace Database\Seeders;

use App\Models\StudyProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        StudyProgram::create([
            'name' => 'Teknik Informatika',
        ]);
        StudyProgram::create([
            'name' => 'Teknik Sipil',
        ]);
        StudyProgram::create([
            'name' => 'Teknik Mesin',
        ]);
        StudyProgram::create([
            'name' => 'Teknik Elektro',
        ]);
        StudyProgram::create([
            'name' => 'Management',
        ]);
    }
}
