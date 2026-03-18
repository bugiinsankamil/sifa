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
        Schema::create('core_branches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('location')->unique()->nullable();
            $table->string('name')->unique()->nullable();
            $table->string('alphabet_code')->unique()->nullable();
            $table->string('numeric_code')->unique()->nullable();
            $table->string('street_address')->nullable();
            $table->foreignId('loc_district_id')->nullable()->constrained();
            $table->foreignId('loc_village_id')->nullable()->constrained();
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_branches');
    }
};
