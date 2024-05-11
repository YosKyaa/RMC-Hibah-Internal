<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ['id' => 'S01', 'status' => 'Pengajuan'],
            ['id' => 'S02', 'status' => 'Menunggu review'],
            ['id' => 'S03', 'status' => 'Pengajuan diterima'],
            ['id' => 'S04', 'status' => 'Pengajuan ditolak'],
        ];

        foreach ($data as $item) {
            DB::table('status')->insert([
                'id' => $item['id'],
                'status' => $item['status'],
            ]);
        }
    }
}

