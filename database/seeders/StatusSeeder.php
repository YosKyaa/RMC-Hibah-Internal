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
            ['id' => 'S03', 'status' => 'Revisi'],
            ['id' => 'S04', 'status' => 'Pengajuan ditolak'],
            ['id' => 'S05', 'status' => 'Persentasi'],
            ['id' => 'S06', 'status' => 'Proses Pencairan Dana'],
            ['id' => 'S07', 'status' => 'Dana Sudah diterima'],
        ];

        foreach ($data as $item) {
            DB::table('status')->insert([
                'id' => $item['id'],
                'status' => $item['status'],
            ]);
        }
    }
}

