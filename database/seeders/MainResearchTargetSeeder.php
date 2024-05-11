<?php

namespace Database\Seeders;

use App\Models\MainResearchTarget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainResearchTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'UR 1',
            'UR 2',
            'UR 3',
            'UR 4',
            'UR 5',
            'UR 6',
        ];
        $description = [
            'Eksplorasi potensi pemanfaatan sumber daya alam (SDA)',
            'Peningkatan kualitas produk dan teknologi sedia ada',
            'Pengembangan material, produk, dan proses baru berbasis sumber daya alam',
            'Pengembangan dan optimasi kualitas bahan, proses manufaktur, dan sistem teknologi',
            'Studi kelayakan dan manfaat untuk prototipe/ formulasi baru (Transfer Teknologi)',
            'Evaluasi kualitas produk dan proses untuk peningkatan efisiensi hasil, biaya, dan kualitas',
        ];

        foreach ($titles as $key => $title) {
            MainResearchTarget::create([
                'title' => $title,
                'description' => $description[$key],
            ]);
        }
    }
}
