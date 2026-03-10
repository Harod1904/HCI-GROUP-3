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
        Schema::create('milestone', function (Blueprint $table) {
            $table->id('milestone_id');
    $table->string('title');
    $table->date('due_date')->nullable();
    $table->boolean('is_completed')->default(false);
    $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
    $table->foreignId('assigned_to_user_id')->constrained('users')->onDelete('set null');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestone');
    }
};
