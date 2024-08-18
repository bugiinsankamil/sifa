<?php

namespace Database\Seeders;

use App\Models\FixMaritalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixMaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Belum Menikah',
            'Sudah Menikah',
            'Cerai',
        ];

        foreach ($items as $item) {
            FixMaritalStatus::create([
                'name' => $item
            ]);
        }
    }
}
