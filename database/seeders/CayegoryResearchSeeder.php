<?php

namespace Database\Seeders;

use App\Models\CategoryResearch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CayegoryResearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_name = [
            'Pangan',
            'Energi',
            'Kesehatan',
            'Transportasi',
            'Teknologi informasi dan komunikasi',
            'Pertahanan dan keamanan',
            'Material maju',
            'Kemaritiman',
            'Kebencanaan',
            'Sosial humaniora, seni budaya, pendidikan',
        ];
        foreach ($category_name as $name) {
            CategoryResearch::create([
                'category_name' => $name,
            ]);
        }
    }
}
