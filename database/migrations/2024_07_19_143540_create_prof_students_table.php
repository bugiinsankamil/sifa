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
        Schema::create('prof_students', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('ref_branch_id')->constrained();
            $table->foreignUlid('ref_school_id')->constrained();
            $table->foreignUlid('ref_school_origin_id')->nullable()->constrained();
            $table->foreignUlid('prof_family_id')->nullable()->constrained();
            $table->string('nis');
            $table->string('nik');
            $table->string('no_kk');
            $table->string('nisn')->nullable();
            $table->string('no_ujian')->nullable();
            $table->string('no_kip')->nullable();
            $table->string('no_va_1')->nullable();
            $table->string('no_va_2')->nullable();
            $table->string('no_va_3')->nullable();
            $table->string('fullname');
            $table->string('nickname');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->string('gender');
            $table->foreignUlid('fix_religion_id')->constrained();
            $table->foreignUlid('fix_stifin_id')->constrained();
            $table->string('nationality');
            $table->date('entry_date')->nullable();
            $table->foreignUlid('fix_entry_status_id')->nullable();
            $table->date('exit_date')->nullable();
            $table->foreignUlid('fix_exit_status_id')->nullable();
            $table->boolean('is_special_needs')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prof_students');
    }
};
