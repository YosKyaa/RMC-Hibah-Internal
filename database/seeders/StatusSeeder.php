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
            ['id' => 'S00', 'status' => 'Draf','color' => 'warning'],
            ['id' => 'S01', 'status' => 'Pengajuan','color' => 'info'],
            ['id' => 'S02', 'status' => 'Menunggu review','color' => 'warning'],
            ['id' => 'S03', 'status' => 'Revisi','color'=>'secondary'],
            ['id' => 'S04', 'status' => 'Pengajuan ditolak' ,'color' => 'danger'],
            ['id' => 'S05', 'status' => 'Menunggu Jadwal Presentasi','color' => 'dark'],
            ['id' => 'S06', 'status' => 'Presentasi','color' => 'dark'],
            ['id' => 'S07', 'status' => 'Proses Pencairan Dana Tahap 1','color' => 'info'],
            ['id' => 'S08', 'status' => 'Dana  Tahap 1 Sudah diterima','color' => 'success'],
            ['id' => 'S09', 'status' => 'Proses Pencairan Dana Tahap 2','color' => 'info'],
            ['id' => 'S10', 'status' => 'Dana  Tahap 2 Sudah diterima','color' => 'success'],
        ];

        foreach ($data as $item) {
            DB::table('statuses')->insert([
                'id' => $item['id'],
                'status' => $item['status'],
                'color' => $item['color'],
            ]);
        }
    }
}

