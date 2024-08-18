<?php

namespace Database\Seeders;

use App\Models\FixClassGrade;
use App\Models\FixEducationLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FixClassGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $fix_class_grades = [
            [
                'fix_education_level' => 'KB',
                'name' => 'KB',
                'alias' => 'PG',
                'order' => 1,
            ],
            [
                'fix_education_level' => 'TK',
                'name' => 'TK A',
                'alias' => 'TK A',
                'order' => 2,
            ],
            [
                'fix_education_level' => 'TK',
                'name' => 'TK B',
                'alias' => 'TK B',
                'order' => 3,
            ],
            [
                'fix_education_level' => 'SD',
                'name' => '1',
                'alias' => 'I',
                'order' => 4,
            ],
            [
                'fix_education_level' => 'SD',
                'name' => '2',
                'alias' => 'II',
                'order' => 5,
            ],
            [
                'fix_education_level' => 'SD',
                'name' => '3',
                'alias' => 'III',
                'order' => 6,
            ],
            [
                'fix_education_level' => 'SD',
                'name' => '4',
                'alias' => 'IV',
                'order' => 7,
            ],
            [
                'fix_education_level' => 'SD',
                'name' => '5',
                'alias' => 'V',
                'order' => 8,
            ],
            [
                'fix_education_level' => 'SD',
                'name' => '6',
                'alias' => 'VI',
                'order' => 9,
            ],
            [
                'fix_education_level' => 'SMP',
                'name' => '7',
                'alias' => 'VII',
                'order' => 10,
            ],
            [
                'fix_education_level' => 'SMP',
                'name' => '8',
                'alias' => 'VIII',
                'order' => 11,
            ],
            [
                'fix_education_level' => 'SMP',
                'name' => '9',
                'alias' => 'IX',
                'order' => 12,
            ],
            [
                'fix_education_level' => 'SMA',
                'name' => '10',
                'alias' => 'X',
                'order' => 13,
            ],
            [
                'fix_education_level' => 'SMA',
                'name' => '11',
                'alias' => 'XI',
                'order' => 14,
            ],
            [
                'fix_education_level' => 'SMA',
                'name' => '12',
                'alias' => '13',
                'order' => 15,
            ],
        ];

        foreach ($fix_class_grades as $key => $fix_class_grade) {
            FixClassGrade::create([
                'fix_education_level_id' => FixEducationLevel::where('name', $fix_class_grade['fix_education_level'])->first()->id,
                'name' => $fix_class_grade['name'],
                'alias' => $fix_class_grade['alias'],
                'order' => $fix_class_grade['order'],
            ]);
        }
    }
}
