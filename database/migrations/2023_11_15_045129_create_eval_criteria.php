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
        Schema::create('eval_criteria', function (Blueprint $table) {
            $table->id();
            $table->string('criteria_code','10');
            $table->string('title','255');
            $table->integer('cat_criteria');
            $table->text('description')->nullable();
            $table->integer('criterion_level');
            $table->integer('status');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eval_criteria');
    }
};
