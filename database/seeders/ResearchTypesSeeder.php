<?php

namespace Database\Seeders;

use App\Models\ResearchTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResearchTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Penelitian Dasar',
                'total_funds' => 5000000,
            ],


    ];

        DB::table('research_types')->insert($data);
    }
}
