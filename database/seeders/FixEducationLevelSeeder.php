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
                'num_code' => '00',
                'info' => 'Jenjang Kelompok Bermain (KB) atau Playgroup (PG)',
            ],
            [
                'name' => 'TK',
                'num_code' => '01',
                'info' => 'Jenjang TK/PAUD/RA',
            ],
            [
                'name' => 'SD',
                'num_code' => '02',
                'info' => 'Jenjang SD/MI',
            ],
            [
                'name' => 'SMP',
                'num_code' => '03',
                'info' => 'Jenjang SMP/MTs',
            ],
            [
                'name' => 'SMA',
                'num_code' => '04',
                'info' => 'Jenjang SMA/MAN',
            ],
            [
                'name' => 'D1',
                'num_code' => '05',
                'info' => 'Jenjang D1',
            ],
            [
                'name' => 'D2',
                'num_code' => '06',
                'info' => 'Jenjang D2',
            ],
            [
                'name' => 'D3',
                'num_code' => '07',
                'info' => 'Jenjang D3',
            ],
            [
                'name' => 'D4',
                'num_code' => '08',
                'info' => 'Jenjang S1/D4',
            ],
            [
                'name' => 'S1',
                'num_code' => '09',
                'info' => 'Jenjang S1/D4',
            ],
            [
                'name' => 'S2',
                'num_code' => '10',
                'info' => 'Jenjang S2',
            ],
            [
                'name' => 'S3',
                'num_code' => '11',
                'info' => 'Jenjang S3',
            ],
        ];

        foreach ($fix_education_levels as $fix_education_level) {
            FixEducationLevel::create($fix_education_level);
        }
    }
}
