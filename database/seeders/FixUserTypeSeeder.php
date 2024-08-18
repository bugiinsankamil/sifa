<?php

namespace Database\Seeders;

use App\Models\FixUserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixUserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Developer',
            'Yayasan',
            'Direktur',
            'Kepsek',
            'Wakepsek',
            'Admin',
            'Guru',
            'Service',
            'Wali Siswa',
            'Siswa',
        ];

        foreach ($items as $item) {
            FixUserType::create([
                'name' => $item
            ]);
        }
    }
}
