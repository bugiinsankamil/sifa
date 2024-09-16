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
        Schema::create('prof_employees', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('ref_branch_id')->constrained();
            $table->string('nokk')->nullable();
            $table->string('nik');
            $table->string('niy')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('front_title')->nullable();
            $table->string('full_name');
            $table->string('back_title')->nullable();
            $table->string('nickname')->nullable();
            $table->string('birthplace');
            $table->date('birthdate');
            $table->string('gender');
            $table->foreignUlid('fix_religion_id')->constrained();
            $table->foreignUlid('fix_stifin_id')->constrained();
            $table->string('nationality');
            $table->text('address');
            $table->foreignId('wil_province_id')->nullable()->constrained();
            $table->foreignId('wil_city_id')->nullable()->constrained();
            $table->foreignId('wil_district_id')->nullable()->constrained();
            $table->foreignId('wil_subdistrict_id')->nullable()->constrained();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('work_start_date')->nullable();
            $table->date('work_end_date')->nullable();
            $table->foreignUlid('fix_employment_type_id')->constrained();
            $table->foreignUlid('fix_employment_status_id')->constrained();
            $table->string('profile_picture')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prof_employees');
    }
};
