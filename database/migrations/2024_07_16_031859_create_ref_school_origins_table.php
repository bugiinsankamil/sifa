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
        Schema::create('ref_school_origins', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('fix_education_level_id')->constrained();
            $table->string('name');
            $table->foreignId('wil_province_id')->constrained();
            $table->foreignId('wil_city_id')->constrained();
            $table->foreignId('wil_district_id')->constrained();
            $table->foreignId('wil_subdistrict_id')->nullable()->constrained();
            $table->string('contact_person')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_school_origins');
    }
};
