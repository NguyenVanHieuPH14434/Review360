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
        Schema::create('eval_form_criteria', function (Blueprint $table) {
            $table->id();
            $table->integer('eval_form_id');
            $table->integer('criteria_id');
            $table->integer('position');
            $table->integer('weighting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eval_form_criteria');
    }
};
