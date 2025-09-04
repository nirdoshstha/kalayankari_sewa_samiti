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
        Schema::create('organization_structure_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('organization_structures');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->string('designation')->nullable();
            $table->string('image')->nullable();
            $table->integer('rank')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->mediumText('description')->nullable();
            $table->boolean('status')->default(0);
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_structure_posts');
    }
};
