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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
    $table->string('title');
    $table->text('description');
    $table->date('due_date');
    $table->string('status');
    $table->string('priority');
    $table->foreignId('project_id')->constrained('projects', 'project_id')->onDelete('cascade');
    // Self-relation for subtasks (Optional but in your ERD)
    $table->foreignId('parent_task_id')->nullable()->constrained('tasks', 'task_id');
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
