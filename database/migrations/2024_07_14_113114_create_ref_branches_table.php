<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Null_;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ref_branches', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('num_code', 2);
            $table->string('alpha_code', 3);
            $table->text('address');
            $table->foreignId('wil_province_id')->constrained();
            $table->foreignId('wil_city_id')->constrained();
            $table->foreignId('wil_district_id')->constrained();
            $table->foreignId('wil_subdistrict_id')->constrained();
            $table->string('phone');
            $table->string('email');
            $table->boolean('is_active');
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
        Schema::dropIfExists('ref_branches');
    }
};
