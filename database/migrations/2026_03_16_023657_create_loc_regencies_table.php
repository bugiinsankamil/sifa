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
        Schema::create('loc_regencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('loc_province_id')->nullable()->constrained();
            $table->string('complete_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loc_regencies');
    }
};
