<?php

namespace Database\Seeders;

use App\Models\FixEducationLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixEducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $fix_education_levels = [
            [
                'name' => 'KB',
                'order' => 1,
                'info' => 'Jenjang Kelompok Bermain (KB) atau Playgroup (PG)',
            ],
            [
                'name' => 'TK',
                'order' => 2,
                'info' => 'Jenjang TK/PAUD/RA',
            ],
            [
                'name' => 'SD',
                'order' => 3,
                'info' => 'Jenjang SD/MI',
            ],
            [
                'name' => 'SMP',
                'order' => 4,
                'info' => 'Jenjang SMP/MTs',
            ],
            [
                'name' => 'SMA',
                'order' => 5,
                'info' => 'Jenjang SMA/MAN',
            ],
            [
                'name' => 'D1',
                'order' => 6,
                'info' => 'Jenjang D1',
            ],
            [
                'name' => 'D2',
                'order' => 7,
                'info' => 'Jenjang D2',
            ],
            [
                'name' => 'D3',
                'order' => 8,
                'info' => 'Jenjang D3',
            ],
            [
                'name' => 'D4',
                'order' => 9,
                'info' => 'Jenjang S1/D4',
            ],
            [
                'name' => 'S1',
                'order' => 10,
                'info' => 'Jenjang S1/D4',
            ],
            [
                'name' => 'S2',
                'order' => 11,
                'info' => 'Jenjang S2',
            ],
            [
                'name' => 'S3',
                'order' => 12,
                'info' => 'Jenjang S3',
            ],
        ];

        foreach ($fix_education_levels as $fix_education_level) {
            FixEducationLevel::create($fix_education_level);
        }
    }
}
