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
        Schema::create('job_title', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('job_title_code', 10)->comment('auto generate start JT0001');
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('status')->default(1)->comment('2-inactive, 1-active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_title');
    }
};
