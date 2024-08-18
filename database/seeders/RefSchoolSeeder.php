<?php

namespace Database\Seeders;

use App\Models\FixEducationLevel;
use App\Models\RefBranch;
use App\Models\RefSchool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefSchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'ref_branch' => 'Baturaja',
                'fix_education_level' => 'TK',
                'name' => 'TK Tahfizh Fathona Baturaja',
                'num_code' => '0101',
                'npsn' => null,
                'same_address_as_branch' => true,
                'is_active' => true,
                'info' => null,
            ]
        ];

        foreach ($items as $item) {
            $ref_branch = RefBranch::where('name', $item['ref_branch'])->first();
            $fix_education_level = FixEducationLevel::where('name', $item['fix_education_level'])->first();

            RefSchool::create([
                'ref_branch_id' => $ref_branch['id'],
                'fix_education_level_id' => $fix_education_level['id'],
                'name' => $item['name'],
                'num_code' => $item['num_code'],
                'npsn' => $item['npsn'],
                'same_address_as_branch' => $item['same_address_as_branch'],
                'address' => $ref_branch['address'],
                'wil_province_id' => $ref_branch['wil_province_id'],
                'wil_city_id' => $ref_branch['wil_city_id'],
                'wil_district_id' => $ref_branch['wil_district_id'],
                'wil_subdistrict_id' => $ref_branch['wil_subdistrict_id'],
                'phone' => $ref_branch['phone'],
                'email' => $ref_branch['email'],
                'is_active' => $item['is_active'],
                'info' => $item['info'],
            ]);
        }
    }
}
