<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prof_families', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('nokk', 16)->unique();
            $table->string('father_name');
            $table->string('father_nik');
            $table->string('father_birthplace');
            $table->string('father_birthdate');
            $table->foreignUlid('father_education_level_id')->constrained(table: 'fix_education_levels');
            $table->foreignUlid('father_profession_id')->constrained(table: 'fix_professions');
            $table->string('father_profession_detail')->nullable();
            $table->unsignedInteger('father_income')->nullable();
            $table->string('mother_name');
            $table->string('mother_nik');
            $table->string('mother_birthplace');
            $table->string('mother_birthdate');
            $table->foreignUlid('mother_education_level_id')->constrained(table: 'fix_education_levels');
            $table->foreignUlid('mother_profession_id')->constrained(table: 'fix_professions');
            $table->string('mother_profession_detail')->nullable();
            $table->unsignedInteger('mother_income')->nullable();
            $table->unsignedSmallInteger('number_of_children')->nullable();
            $table->string('address');
            $table->foreignId('wil_province_id')->nullable()->constrained();
            $table->foreignId('wil_city_id')->nullable()->constrained();
            $table->foreignId('wil_district_id')->nullable()->constrained();
            $table->foreignId('wil_subdistrict_id')->nullable()->constrained();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prof_families');
    }
};
