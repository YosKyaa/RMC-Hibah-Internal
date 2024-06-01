<?php

namespace Database\Seeders;

use App\Models\DocTypes;
use App\Models\Documents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use League\CommonMark\Node\Block\Document;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 'DC1', 'name' => 'Proposal'],
            ['id' => 'DC2', 'name' => 'LOA'],
            ['id' => 'DC3', 'name' => 'Account Bank Receipt'],
            ['id' => 'DC4', 'name' => 'Monev'],
            ['id' => 'DC5', 'name' => 'Final Report'],
        ];
        foreach ($data as $item) {
            DocTypes::create([
                'id' => $item['id'],
                'name' => $item['name'],
            ]);
        }
    }
}

