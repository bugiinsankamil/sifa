<?php

namespace Database\Seeders;

use App\Models\FixExitStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixExitStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Lulus',
            'Mutasi',
            'Mengundurkan diri',
            'Dikeluarkan',
            'Hilang',
            'Meninggal dunia',
            'Lainnya',
        ];

        foreach ($items as $item) {
            FixExitStatus::create([
                'name' => $item
            ]);
        }
    }
}
