<?php

namespace Database\Seeders;

use App\Models\FixSalarySource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixSalarySourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'APBN',
            'APBD Provinsi',
            'APBD Kota/Kabupaten',
            'Yayasan',
            'Sekolah',
            'Komite Sekolah',
            'Lembaga Donor',
            'Lainnya',
        ];

        foreach ($items as $item) {
            FixSalarySource::create([
                'name' => $item
            ]);
        }
    }
}
