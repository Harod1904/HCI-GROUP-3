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
        Schema::create('milestoness', function (Blueprint $table) {
             $table->id('milestone_id');
    $table->string('title');
    $table->date('due_date');
    $table->boolean('is_completed')->default(false);
    $table->foreignId('project_id')->constrained('projects', 'project_id')->onDelete('cascade');
    // Assigned User from the User table
    $table->foreignId('assigned_to_user_id')->constrained('users', 'user_id');
    $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestoness');
    }
};
