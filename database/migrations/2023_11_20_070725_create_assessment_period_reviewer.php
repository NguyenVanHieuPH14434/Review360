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
        Schema::create('assessment_period_reviewer', function (Blueprint $table) {
            $table->id();
            $table->integer('assessment_period_user_id');
            $table->integer('user_id');
            $table->integer('peg_person');
            $table->integer('principal_reviewer')->comment('1- người đánh giá chính')->default('0');
            $table->integer('weighting');
            $table->text('result')->nullable();
            $table->float('total_score')->nullable();
            $table->integer('status')->comment('1- Đã đánh giá, 2- Chưa đánh giá, 3- Đã chốt');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_period_reviewer');
    }
};
