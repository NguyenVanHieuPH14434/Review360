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
            $table->text('departments')->nullable()->after('setting_point_eval');
            $table->text('jobTitles')->nullable()->after('departments');
            $table->text('levels')->nullable()->after('jobTitles');
            $table->text('users')->nullable()->after('levels');
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
