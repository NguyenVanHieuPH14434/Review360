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
        Schema::table('assessment_period_user', function (Blueprint $table) {
            $table->float('total_point_job_rank')->nullable();
            $table->string('rank_job_rank')->nullable();
            $table->float('total_point_performance')->nullable();
            $table->string('rank_performance')->nullable();
            $table->integer('status')->default('2');
            $table->dateTime('calendar_assess')->nullable();
            $table->dateTime('assessment_completion_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
