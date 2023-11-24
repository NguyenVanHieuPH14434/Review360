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
        Schema::table('eval_form', function (Blueprint $table) {
            $table->dropColumn('object_id');
            $table->dropColumn('type_object');
            $table->integer('department_id')->nullable()->after('id');
            $table->integer('job_title_id')->nullable()->after('department_id');
            $table->integer('level_id')->nullable()->after('job_title_id');
            $table->integer('user_id')->nullable()->after('level_id');
            $table->integer('status')->after('user_id');
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
