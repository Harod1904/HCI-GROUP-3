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
        Schema::create('project', function (Blueprint $table) {
            $table->id('project_id');
    $table->string('title');
    $table->text('description')->nullable();
    $table->date('start_date')->nullable();
    $table->date('due_date')->nullable();
    $table->string('status'); // You could also use ->enum()
    $table->decimal('budget', 10, 2)->nullable();
    $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
