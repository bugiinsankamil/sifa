<?php

namespace Database\Seeders;

use App\Models\FixProfession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'PNS',
            'TNI/Polri',
            'Guru/Dosen',
            'Karyawan BUMN',
            'Karyawan Swasta',
            'Petani/Peternak/Nelayan',
            'Pedagang',
            'Wirausaha',
            'Jasa Profesional',
            'Pensiunan',
            'Ibu Rumah Tangga',
            'Lainnya',
            'Tidak Bekerja',
        ];

        foreach ($items as $item) {
            FixProfession::create([
                'name' => $item
            ]);
        }
    }
}
