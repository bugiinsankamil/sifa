<?php

namespace Database\Seeders;

use App\Models\RefBranch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = [
            [
                'name' => 'Baturaja',
                'num_code' => '01',
                'alpha_code' => 'BTA',
                'address' => 'Jl. Nawawi Al-Hajj, Jembatan Ogan IV',
                'wil_province_id' => 16,
                'wil_city_id' => 1601,
                'wil_district_id' => 160114,
                'wil_subdistrict_id' => 1601142008,
                'phone' => '000000000000',
                'email' => 'sitfathonabta@gmail.com',
                'is_active' => true,
                'info' => null,
            ],
            [
                'name' => 'Maskarebet',
                'num_code' => '02',
                'alpha_code' => 'MSK',
                'address' => 'Jl. Jepang RT. 36 RW. 11',
                'wil_province_id' => 16,
                'wil_city_id' => 1671,
                'wil_district_id' => 167115,
                'wil_subdistrict_id' => 1671151004,
                'phone' => '000000000000',
                'email' => 'sitfathonaplg@gmail.com',
                'is_active' => true,
                'info' => null,
            ],
            [
                'name' => 'Prabumulih',
                'num_code' => '03',
                'alpha_code' => 'PBM',
                'address' => 'Jl. Sumatera, Lr. Mangga RT. 08 RW. 04',
                'wil_province_id' => 16,
                'wil_city_id' => 1674,
                'wil_district_id' => 167402,
                'wil_subdistrict_id' => 1674021007,
                'phone' => '000000000000',
                'email' => 'sitfathonaprabumulih@gmail.com',
                'is_active' => true,
                'info' => null,
            ],
            [
                'name' => 'Lemabang',
                'num_code' => '04',
                'alpha_code' => 'LMB',
                'address' => 'Jl. Ratu Sianum, Ruko Blok A1',
                'wil_province_id' => 16,
                'wil_city_id' => 1671,
                'wil_district_id' => 167106,
                'wil_subdistrict_id' => 1671061006,
                'phone' => '000000000000',
                'email' => 'sitfathonalmb@gmail.com',
                'is_active' => true,
                'info' => null,
            ],
            [
                'name' => 'Pakjo',
                'num_code' => '05',
                'alpha_code' => 'PKJ',
                'address' => 'Jl. Inspektur Marzuki No. 124',
                'wil_province_id' => 16,
                'wil_city_id' => 1671,
                'wil_district_id' => 167104,
                'wil_subdistrict_id' => 1671041004,
                'phone' => '000000000000',
                'email' => 'sitfathonapkj@gmail.com',
                'is_active' => true,
                'info' => null,
            ],
            [
                'name' => 'Lubuklinggau',
                'num_code' => '06',
                'alpha_code' => 'LLG',
                'address' => 'Jl. Yos Sudarso No. 8 AB',
                'wil_province_id' => 16,
                'wil_city_id' => 1673,
                'wil_district_id' => 167301,
                'wil_subdistrict_id' => 1673011007,
                'phone' => '000000000000',
                'email' => 'sitfathonallg@gmail.com',
                'is_active' => true,
                'info' => null,
            ],
            [
                'name' => 'Depok',
                'num_code' => '07',
                'alpha_code' => 'DPK',
                'address' => 'Jl. Putri Tunggal No. 72',
                'wil_province_id' => 32,
                'wil_city_id' => 3276,
                'wil_district_id' => 327602,
                'wil_subdistrict_id' => 3276021007,
                'phone' => '000000000000',
                'email' => 'sitfathonadpk@gmail.com',
                'is_active' => true,
                'info' => null,
            ],
            [
                'name' => 'Muara Enim',
                'num_code' => '08',
                'alpha_code' => 'MEN',
                'address' => 'Jl. Kol. H. Burlian',
                'wil_province_id' => 16,
                'wil_city_id' => 1603,
                'wil_district_id' => 160302,
                'wil_subdistrict_id' => 1603021008,
                'phone' => '000000000000',
                'email' => 'sitfathonamuaraenim@gmail.com',
                'is_active' => true,
                'info' => null,
            ],
            [
                'name' => 'KM 14',
                'num_code' => '09',
                'alpha_code' => 'K14',
                'address' => 'Jl. Raya Palembang - Betung KM 14',
                'wil_province_id' => 16,
                'wil_city_id' => 1607,
                'wil_district_id' => 160710,
                'wil_subdistrict_id' => 1607101024,
                'phone' => '000000000000',
                'email' => 'sitfathonakm14@gmail.com',
                'is_active' => true,
                'info' => null,
            ],
        ];

        foreach ($items as $item) {
            RefBranch::create($item);
        }
    }
}
