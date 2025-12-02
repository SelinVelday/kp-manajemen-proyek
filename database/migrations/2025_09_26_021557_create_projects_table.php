<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('id', 20)->primary(); // Ganti ID jadi String (Primary Key)
            $table->foreignId('team_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            
            // Status & Due Date Baru
            $table->enum('status', ['planning', 'active', 'completed', 'on_hold'])->default('planning');
            $table->date('due_date')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};