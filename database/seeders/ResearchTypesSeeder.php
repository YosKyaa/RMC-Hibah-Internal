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
            'Penelitian Dasar'
            // Tambahkan judul-judul lain di sini sesuai kebutuhan
        ];

        foreach ($titles as $title) {
            ResearchTypes::create([
                'title' => $title
            ]);
        }
    }
}
