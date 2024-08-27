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
        Schema::create('ref_schools', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('ref_branch_id')->constrained();
            $table->foreignUlid('fix_education_level_id')->constrained();
            $table->string('name');
            $table->string('num_code', 4);
            $table->string('npsn', 10)->nullable();
            $table->boolean('same_address_as_branch')->default(true);
            $table->text('address');
            $table->foreignId('wil_province_id')->constrained();
            $table->foreignId('wil_city_id')->constrained();
            $table->foreignId('wil_district_id')->constrained();
            $table->foreignId('wil_subdistrict_id')->constrained();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_schools');
    }
};
