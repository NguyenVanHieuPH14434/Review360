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
        Schema::create('eval_form', function (Blueprint $table) {
            $table->id();
            $table->integer('object_id')->comment('Đối tượng: Chức danh, phòng ban, nhân viên');
            $table->integer('type_object')->comment('1- Chức danh, 2- Phòng ban, 3- Nhân viên');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eval_form');
    }
};
