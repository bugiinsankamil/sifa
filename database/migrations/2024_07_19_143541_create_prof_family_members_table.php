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
        Schema::create('prof_family_members', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('prof_family_id')->constrained();
            $table->string('name');
            $table->foreignUlid('fix_family_relation_id')->constrained();
            $table->foreignUlid('fix_family_status_id')->constrained();
            $table->foreignUlid('prof_student_id')->nullable()->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prof_family_members');
    }
};
