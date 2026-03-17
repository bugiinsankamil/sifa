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
        Schema::create('ref_class_grades', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->foreignId('ref_education_level_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_class_grades');
    }
};
