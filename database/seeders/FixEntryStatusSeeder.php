<?php

namespace Database\Seeders;

use App\Models\FixEntryStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixEntryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Baru',
            'Mutasi/Pindahan',
            'Masuk Kembali',
        ];

        foreach ($items as $item) {
            FixEntryStatus::create([
                'name' => $item
            ]);
        }
    }
}
