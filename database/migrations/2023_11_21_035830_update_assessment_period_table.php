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
        Schema::table('assessment_period', function (Blueprint $table) {
            $table->dropColumn('setting_eval');
            $table->dropColumn('eval_form_id');
            $table->integer('setting_point_eval')->nullable()->after('type_eval');
            $table->integer('setting_result_eval')->nullable()->after('type_eval');
            $table->integer('eval_copy_id')->nullable()->after('type_eval');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessment_period', function($table) {
            $table->dropColumn('setting_point_eval');
            $table->dropColumn('setting_result_eval');
            $table->dropColumn('eval_copy_id');
        });
    }
};
