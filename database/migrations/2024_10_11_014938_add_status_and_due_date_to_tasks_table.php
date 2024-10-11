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
        Schema::table('tasks', function (Blueprint $table) {
            // Adding 'status' and 'due_date' columns to the 'tasks' table
            $table->string('status')->default('Pending');  // Task status (Pending or Completed)
            $table->date('due_date')->nullable();          // Task due date, optional
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // Dropping 'status' and 'due_date' columns when rolling back
            $table->dropColumn('status');
            $table->dropColumn('due_date');
        });
    }
};
