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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description');
            $table->longText('problem_analysis')->nullable();
            $table->longText('system_requirements')->nullable();
            $table->text('tech_stack')->nullable();
            $table->string('diagram_usecase')->nullable();
            $table->string('diagram_flowchart')->nullable();
            $table->string('diagram_erd')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('github_url')->nullable();
            $table->boolean('is_final_project')->default(false);
            $table->string('progress_status')->nullable();      
            $table->boolean('is_published')->default(true);      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
