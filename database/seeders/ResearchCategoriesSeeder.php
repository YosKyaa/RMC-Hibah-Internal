<?php

namespace Database\Seeders;

use App\Models\ResearchCategories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchCategoriesSeeder extends Seeder
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
            ResearchCategories::create([
                'name' => $name,
            ]);
        }
    }
}
