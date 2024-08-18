<?php

namespace Database\Seeders;

use App\Models\FixInstitution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixInstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Pemerintah Pusat',
            'Pemerintah Provinsi',
            'Pemerintah Kota/Kabupaten',
            'Yayasan',
            'Sekolah',
            'Komite Sekolah',
            'Lainnya',
        ];

        foreach ($items as $item) {
            FixInstitution::create([
                'name' => $item
            ]);
        }
    }
}
