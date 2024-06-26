<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bank_name = [
            'Bank BCA',
            'Bank Mandiri',
            'Bank BNI',
            'Bank BRI',
            'Bank Syariah Indonesia (BSI)',
            'BTN',
        ];
        foreach ($bank_name as $name) {
            Bank::create([
                'name' => $name,
            ]);
        }
    }
}
