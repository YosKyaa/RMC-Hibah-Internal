<?php

namespace Database\Seeders;

use App\Models\TktTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TktTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'TKT 1',
            'TKT 2',
            'TKT 3',
        ];

        foreach ($titles as $title) {
            TktTypes::create([
                'title' => $title,
            ]);
        }
    }
}
