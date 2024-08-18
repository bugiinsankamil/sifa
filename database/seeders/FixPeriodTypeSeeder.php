<?php

namespace Database\Seeders;

use App\Models\FixPeriodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixPeriodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Akademik',
            'Anggaran',
        ];

        foreach ($items as $item) {
            FixPeriodType::create([
                'name' => $item
            ]);
        }
    }
}
