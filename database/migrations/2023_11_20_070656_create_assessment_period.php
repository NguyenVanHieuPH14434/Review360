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
        Schema::create('assessment_period', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('type_eval')->comment('1-jobRank, 2-Performance,3-Tháng,4-Quý,5-Năm');
            $table->integer('setting_eval')->comment('1- Công khai điểm, 2 - Không công khai');
            $table->text('description')->nullable();
            $table->integer('eval_form_id');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_period');
    }
};
