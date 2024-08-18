<?php

namespace Database\Seeders;

use App\Models\FixFamilyStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixFamilyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Kandung',
            'Tiri',
            'Angkat',
        ];

        foreach ($items as $item) {
            FixFamilyStatus::create([
                'name' => $item
            ]);
        }
    }
}
