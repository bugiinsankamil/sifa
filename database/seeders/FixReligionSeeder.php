<?php

namespace Database\Seeders;

use App\Models\FixReligion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Islam',
            'Katolik',
            'Protestan',
            'Hindu',
            'Budha',
            'Konghuchu',
            'Lainnya',
        ];

        foreach ($items as $item) {
            FixReligion::create([
                'name' => $item
            ]);
        }
    }
}
