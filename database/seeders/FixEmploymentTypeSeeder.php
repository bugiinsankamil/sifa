<?php

namespace Database\Seeders;

use App\Models\FixEmploymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixEmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Manajemen',
            'Akademik',
            'Tata Usaha',
            'Tim Service',
        ];

        foreach ($items as $item) {
            FixEmploymentType::create([
                'name' => $item
            ]);
        }
    }
}
