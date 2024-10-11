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
            $table->id();
            $table->string('title');                      // Task title
            $table->text('description')->nullable();      // Task description, optional
            $table->string('status')->default('Pending'); // Task status (Pending or Completed)
            $table->date('due_date')->nullable();         // Task due date, optional
            $table->timestamps();                        // Created at & updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
