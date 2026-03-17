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
        Schema::create('ref_stifins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->text('essential_resume')->nullable();
            $table->text('active_brain_part')->nullable();
            $table->text('equivalent_intelligence')->nullable();
            $table->text('role')->nullable();
            $table->text('advantage')->nullable();
            $table->text('goal')->nullable();
            $table->text('hope')->nullable();
            $table->text('brand_direction')->nullable();
            $table->text('attitude_to_money')->nullable();
            $table->text('physical_shape')->nullable();
            $table->text('physical_strength')->nullable();
            $table->text('physical_function')->nullable();
            $table->text('psychometrics')->nullable();
            $table->text('four_keywords')->nullable();
            $table->text('learning_style')->nullable();
            $table->text('learn_motivation')->nullable();
            $table->text('self_clue')->nullable();
            $table->text('chemistry')->nullable();
            $table->text('field_of_study')->nullable();
            $table->text('field_of_career')->nullable();
            $table->text('positive_and_negative')->nullable();
            $table->text('deep_explanation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_stifins');
    }
};
