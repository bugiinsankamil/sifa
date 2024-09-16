<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $this->call(ShieldSeeder::class);

        // $super_admin = User::factory()->create([
        //     'name' => 'Sysadmin',
        //     'email' => 'sysadmin@fathona.sch.id',
        // ]);

        // $super_admin->assignRole('super_admin');

        // $panel_user = User::factory()->create([
        //     'name' => 'Panel User',
        //     'email' => 'paneluser@fathona.sch.id'
        // ]);

        DB::unprepared(file_get_contents('database/dump/data2.sql'));

        $this->call([
            // WilProvinceSeeder::class,
            // WilCitySeeder::class,
            // WilDistrictSeeder::class,
            // WilSubdistrictSeeder::class,
            // FixEducationLevelSeeder::class,
            // FixClassGradeSeeder::class,
            // FixEmploymentStatusSeeder::class,
            // FixEmploymentTypeSeeder::class,
            // FixEntryStatusSeeder::class,
            // FixExitStatusSeeder::class,
            // FixFamilyRelationSeeder::class,
            // FixFamilyStatusSeeder::class,
            // FixInstitutionSeeder::class,
            // FixMaritalStatusSeeder::class,
            // FixPeriodTypeSeeder::class,
            // FixProfessionSeeder::class,
            // FixReligionSeeder::class,
            // FixSalarySourceSeeder::class,
            // FixStifinSeeder::class,
            // FixUserTypeSeeder::class,
            // RefBranchSeeder::class,
            // RefSchoolSeeder::class,
        ]);
    }
}
