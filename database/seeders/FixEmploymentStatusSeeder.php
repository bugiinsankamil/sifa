<?php

namespace Database\Seeders;

use App\Models\FixEmploymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixEmploymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Observasi/Seat-in',
            'Magang',
            'Pengganti',
            'GTTY/Kontrak',
            'GTY',
            'PPPK',
            'PNS',
        ];

        foreach ($items as $item) {
            FixEmploymentStatus::create([
                'name' => $item
            ]);
        }
    }
}
