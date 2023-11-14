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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('role_id')->comment('1-Admin, 2-Division manager, 3-Manager, 4-Employee');
            $table->bigIncrements('job_title_id');
            $table->bigIncrements('department_id');
            $table->string('code', 10)->comment('auto generate start NV0001');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('direct_management', 100);
            $table->date('work_start_date')->nullable();
            $table->text('avatar')->nullable();
            $table->integer('status')->default(1)->comment('0-inactive, 1-active');
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
            $table->index(['role_id']);
            $table->index(['job_title_id']);
            $table->index(['department_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
