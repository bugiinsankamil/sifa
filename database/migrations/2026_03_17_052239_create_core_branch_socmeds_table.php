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
        Schema::create('core_branch_socmeds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('core_branch_id')->nullable()->constrained();
            $table->foreignId('ref_socmed_account_type_id')->nullable()->constrained();
            $table->string('account_name_number')->nullable();
            $table->string('account_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_branch_socmeds');
    }
};
