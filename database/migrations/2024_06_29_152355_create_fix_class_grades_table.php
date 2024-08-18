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
        Schema::create('fix_class_grades', function (Blueprint $table) {
            $table->ulid('id');
            $table->foreignUlid('fix_education_level_id')->constrained();
            $table->string('name');
            $table->string('alias');
            $table->unsignedSmallInteger('order');
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
        Schema::dropIfExists('fix_class_grades');
    }
};
