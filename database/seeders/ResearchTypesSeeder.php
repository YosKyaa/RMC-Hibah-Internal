<?php

namespace Database\Seeders;

use App\Models\ResearchTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'Research on the impact of technology on society',
            'Another research title',
            'Yet another research title',
            // Tambahkan judul-judul lain di sini sesuai kebutuhan
        ];
    }
}
