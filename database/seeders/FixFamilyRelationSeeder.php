<?php

namespace Database\Seeders;

use App\Models\FixFamilyRelation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixFamilyRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            'Ayah',
            'Ibu',
            'Anak',
            'Saudara',
            'Paman/Bibi',
            'Keponakan',
            'Sepupu',
            'Kakek/Nenek',
            'Cucu',
            'Keluarga Angkat',
            'Lainnya',
        ];

        foreach ($items as $item) {
            FixFamilyRelation::create([
                'name' => $item
            ]);
        }
    }
}
