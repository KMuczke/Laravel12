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
            $table->string('task', 100);
            $table->date('begindate');
            $table->date('enddate');
            $table->foreignId('user_id')->nullable()->constrained()->noActionOnDelete()->noActionOnUpdate();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('activity_id')->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->timestamps();
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
