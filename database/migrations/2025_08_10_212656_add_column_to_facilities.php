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
        Schema::table('facilities', function (Blueprint $table) {

            // Add column
            $table->foreignId('scheme_category_id')
                ->nullable() // for safety if old data exists
                ->constrained('sliders')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('department_id')
                ->nullable() // for safety if old data exists
                ->constrained('albums')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('service_id')
                ->nullable() // for safety if old data exists
                ->constrained('videos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facilities', function (Blueprint $table) {
            $table->dropForeign(['scheme_category_id']);
            $table->dropColumn('scheme_category_id');

            $table->dropForeign(['department_id']);
            $table->dropColumn('department_id');

            $table->dropForeign(['service_id']);
            $table->dropColumn('service_id');
        });
    }
};
