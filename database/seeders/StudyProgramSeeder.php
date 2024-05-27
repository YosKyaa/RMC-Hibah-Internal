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
            'name' => 'Bachelor of Information Technology',
        ]);
        StudyProgram::create([
            'name' => 'Bachelor of civil engineering',
        ]);
        StudyProgram::create([
            'name' => 'Bachelor of electrical engineering',
        ]);
        StudyProgram::create([
            'name' => 'Bachelor of mechanical engineering',
        ]);
        StudyProgram::create([
            'name' => 'Bachelor of management',
        ]);
    }
}
